<?php

$conn = new mysqli('localhost', 'root', '','prenatal_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$error="";
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['button'])){

  $data = $_POST['user'];
  $id = $data['id'];
  $name = $data['name'];
  $inputs = $_POST['infor'];
  $checkboxes =$_POST['result'];

  $quer = "SELECT regNo, name FROM pregnant WHERE regNo =? AND name=?";
  $stmt1 = $conn->prepare($quer);
$stmt1->bind_param("ss", $id, $name);
$stmt1->execute();
$result = $stmt1->get_result();

if ($result->num_rows > 0) {
    // Fetch data
    $row = $result->fetch_assoc();
    // Assign data to variables
    $ids = $row['regNo'];
    $names = $row['name'];
   if($name !== $names && $id !== $ids){
     $error ="Please client names or client Id Provided not exist";
   }
   else{
  foreach ($inputs as $inputKey => $inputValue) {
   $checkboxValue = isset($checkboxes[$inputKey]) ? $checkboxes[$inputKey] : '';
   $sql = "INSERT INTO general_infor (regNo, names, information_type, results,created) VALUES (?, ?, ?, ?,NOW())";
   $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $ids, $names, $inputValue, $checkboxValue);
            //$stmt->bind_param("ss", $inputValue, $checkboxes[$inputKey]);
            $stmt->execute();
            $stmt->close();

            if($stmt == TRUE){
            $error=  "Data inserted successfully!";
            }
            else{
              $error = "Form not submitted or submit button not pressed";
            }
        }

      }
      }
    }
$conn->close();
 ?>
