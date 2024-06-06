<?php

$conn = new mysqli('localhost', 'root', '','prenatal_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$error="";
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addData'])){

  $data = $_POST['user'];
  $id = $data['id'];
  $name = $data['name'];
  $inputs = $_POST['b'];
  $type= $_POST['type'];
  $checkboxes =$_POST['result'];
  $com=$_POST['com'];

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
  foreach ($type as $inputKey => $inputValue) {
   $checkboxValue = isset($checkboxes[$inputKey]) ? $checkboxes[$inputKey] : '';
   $inputsValue = isset($inputs[$inputKey]) ? $inputs[$inputKey] : '';
   $comValue = isset($com[$inputKey]) ? $com[$inputKey] : '';
   $sql = "INSERT INTO clinical_history (regNo, names, numbers, information_type, results,comments,created) VALUES (?, ?, ?, ?, ?, ?,NOW())";
   $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssss", $ids, $names, $inputsValue, $inputValue, $checkboxValue, $comValue);
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
