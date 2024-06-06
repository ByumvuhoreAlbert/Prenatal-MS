<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data from the POST request
    $patientID = $_POST['patientID'];
    $contact = $_POST['contact'];
    $testDate = $_POST['testDate'];
    $glucosuria = $_POST['glucosuria'];
    $proteinuria = $_POST['proteinuria'];
    $appearance = $_POST['appearance'];
    $ph = $_POST['ph'];
    $protein = $_POST['protein'];
    $glucose = $_POST['glucose'];
    $ketones = $_POST['ketones'];
    $leukocytes = $_POST['leukocytes'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prenatal_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }


    // Check if patientID exists in pregnant table
    $checkStmt = $conn->prepare("SELECT regNo FROM pregnant WHERE regNo = ?");
    $checkStmt->bind_param("i", $patientID);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
      
        $stmt = $conn->prepare("INSERT INTO urinaryExams (patientID, contact, testDate, glucosuria, proteinuria, appearance, ph, protein, glucose, ketones, leukocytes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iissssdssss", $patientID, $contact, $testDate, $glucosuria, $proteinuria, $appearance, $ph, $protein, $glucose, $ketones, $leukocytes);

        if ($stmt->execute()) {
            echo 'success';
        } else {
            echo 'error';
        }

        $stmt->close();
    } else {
        // PatientID does not exist, return error
        echo 'patient_not_found';
    }

    $checkStmt->close();
    $conn->close();
}
?>
