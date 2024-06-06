<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data from the POST request (Page 2)
    $patientID = $_POST['patientID'];
    $contact = $_POST['contact'];
    $wbc = $_POST['wbc'];
    $rbc = $_POST['rbc'];
    $hb = $_POST['hb'];
    $plt = $_POST['plt'];
    $rpr = $_POST['rpr'];
    $hiv = $_POST['hiv'];
    $malaria = $_POST['malaria'];
    $hepatiteB = $_POST['hepatiteB'];
    $hepatiteC = $_POST['hepatiteC'];
    $glycemia = $_POST['glycemia'];
    $additionalComments = $_POST['additionalComments'];

    // Database connection (replace with your own connection parameters)
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
        $stmt = $conn->prepare("INSERT INTO laboratoryExams (Test_Date,patientID, Contact, WBC, RBC, Hb, Plt, RPR_NP, HIV_NP, Malaria_NP, Hepatite_B_NP, Hepatite_C_NP, Glycemia, AdditionalComments) VALUES (NOW(),?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iisssssssssss", $patientID, $contact, $wbc, $rbc, $hb, $plt, $rpr, $hiv, $malaria, $hepatiteB, $hepatiteC, $glycemia, $additionalComments);

        if ($stmt->execute()) {
            // Redirect to allLaboratory.php upon success
            header("Location: allLaboratory.php");
            exit();
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
