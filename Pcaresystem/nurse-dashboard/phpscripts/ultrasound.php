<?php
include('../includes/connection.php');
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])){
$pID      = $_POST['pID'];
$fHeight = $_POST['fHeight'];
$presentation = $_POST['presentation'];
$heartBeat  = $_POST['heartBeat'];
$fMovement  = $_POST['fMovement'];
$heartRate  = $_POST['heartRate'];
$fPresentation = $_POST['fHeight'];
$fWeight   = $_POST['fWeight'];
$amniotic  = $_POST['amniotic'];
$fetus     = $_POST['fetus'];
$referred  = $_POST['referred'];
$comment   = $_POST['comment'];

$sql = "INSERT INTO ultrasound (, , ) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

// Bind parameters
$stmt->bind_param("sss", $patient_name, $date, $result);

// Execute the statement
if ($stmt->execute()) {
    echo "Record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


}
 ?>
