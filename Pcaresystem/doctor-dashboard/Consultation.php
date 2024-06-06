<?php

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


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitPage1'])) {
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

            $stmt = $conn->prepare("INSERT INTO patientconsoltation (PatientID, Contacts, Cervical_Screening, Temperature, Heart_Bit_Rate, Respiratory_Rate, Height, Weight_kg, BMI, MUAC, Blood_Pressure) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("iisssssssss", $pid, $contact, $cervical, $temperature, $heart_rate, $respiratory, $height, $weight, $bmi, $muac, $blood_pressure);

            if ($stmt->execute()) {
                echo "<script>alert('Data saved successfully');</script>";
                header("Location: ultrasound.php");
            } else {
                echo "<script>alert('Data not saved successfully');</script>";
            }
            $stmt->close();

      } else {
          echo "<script>alert('Patient ID provided not found');</script>";
        }

        $checkStmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>ANTENATAL CARE CONSULTATION</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<style>
        .error {
            border: 1px solid red;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary"><center>ANTENATAL CARE/GENERAL CONSULTATION</center></h4>
        </div>
        <form action="" method="POST" id="consult">
            <div id="page1" class="page1">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <label for="pid">PATIENT ID#</label>
                            <input type="text" class="form-control form-control-sm" name="pid" id="pid" required>
                        </div>
                        <div class="col">
                            <label for="contact">NO OF CONTACTS</label>
                            <select class="form-select form-select-sm" name="contact" id="contact" required>
                                <option value=""></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="cervical">Cervical Cancer-Screening</label>
                            <select class="form-select form-select-sm" name="cervical" id="cervical" required>
                                <option value=""></option>
                                <option value="Normal">Normal</option>
                                <option value="Abnormal">Abnormal</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="temperature">Temperature</label>
                            <input type="text" class="form-control form-control-sm" name="temperature" id="temperature" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="heart_rate">Heart Bit Rate</label>
                            <input type="text" class="form-control form-control-sm" name="heart_rate" id="heart_rate" required>
                        </div>
                        <div class="col">
                            <label for="respiratory">Respiratory Rate</label>
                            <input type="text" class="form-control form-control-sm" name="respiratory" id="respiratory" required>
                        </div>
                        <div class="col">
                            <label for="height">Height(cm)</label>
                            <input type="text" class="form-control form-control-sm" name="height" id="height" required>
                        </div>
                        <div class="col">
                            <label for="weight">Weight(kg)</label>
                            <input type="text" class="form-control form-control-sm" name="weight" id="weight" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="bmi">BMI</label>
                            <input type="text" class="form-control form-control-sm" name="bmi" id="bmi" required>
                        </div>
                        <div class="col">
                            <label for="muac">MUAC (cm)</label>
                            <input type="text" class="form-control form-control-sm" name="muac" id="muac" required>
                        </div>
                        <div class="col">
                            <label for="blood_pressure">Blood Pressure(mm. Hg)</label>
                            <input type="text" class="form-control form-control-sm" name="blood_pressure" id="blood_pressure" required>
                        </div>
                    </div>
                    <p>BMI: Body Mass Index, MUAC: Mid Upper Arm Circumference</p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" id="clearPage1">Clear</button>
                        <button type="submit" name="submitPage1" id="sendNext" class="btn btn-success">Save and Continue</button>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      <body>
        </html>
