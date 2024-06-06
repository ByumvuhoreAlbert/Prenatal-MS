<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prenatal_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submitPage1'])) {
        $pid = $_POST['pid'];
        $contact = $_POST['contact'];
        $cervical = $_POST['cervical'];
        $temperature = $_POST['temperature'];
        $heart_rate = $_POST['heart_rate'];
        $respiratory = $_POST['respiratory'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $bmi = $_POST['bmi'];
        $muac = $_POST['muac'];
        $blood_pressure = $_POST['blood_pressure'];

        $checkStmt = $conn->prepare("SELECT regNo FROM pregnant WHERE regNo = ?");
        $checkStmt->bind_param("i", $pid);
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows > 0) {
          while($row= $checkStmt->fetch_assoc()){
            $ro = $row['regNo'];
          }
          if($ro == $pid){
            $stmt = $conn->prepare("INSERT INTO patientconsultation (PatientID, Contacts, Cervical_Screening, Temperature, Heart_Bit_Rate, Respiratory_Rate, Height, Weight_kg, BMI, MUAC, Blood_Pressure) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("iisssssssss", $pid, $contact, $cervical, $temperature, $heart_rate, $respiratory, $height, $weight, $bmi, $muac, $blood_pressure);

            if ($stmt->execute()) {
                $response = ['status' => 'success', 'message' => 'Data saved successfully'];
            } else {
                $response['message'] = 'Execute error: ';
            }
            $stmt->close();
        }
      } else {
            $response['status'] = 'patient_not_found';
            $response['message'] = 'Patient ID provided not found';
        }

        $checkStmt->close();
    }
}

$conn->close();
echo json_encode($response);
?>
