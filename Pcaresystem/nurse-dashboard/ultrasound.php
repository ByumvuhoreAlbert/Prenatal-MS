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


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitPage2'])) {

  $patientID = $_POST['patientID'];
  $contact = $_POST['contact'];
  $gestationWeek = $_POST['gestationWeek'];
  $fundalHeight = $_POST['fundalHeight'];
  $fetalHeartBeat = $_POST['fetalHeartBeat'];
  $fetalMovement = $_POST['fetalMovement'];
  $fetalHeartRate = $_POST['fetalHeartRate'];
  $fetalPresentation = $_POST['fetalPresentation'];
  $efw = $_POST['efw'];
  $amnioticIndex = $_POST['amnioticIndex'];
  $numberFetus = $_POST['numberFetus'];
  $maternalComments = $_POST['maternalComments'];

        $checkStmt = $conn->prepare("SELECT regNo FROM pregnant WHERE regNo = ?");
        $checkStmt->bind_param("i", $patientID);
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows > 0) {

          $stmt = $conn->prepare("INSERT INTO ultrasoundtable (Test_Date, PatientID, Contact, Gestation_Week, Fundal_Height, Fetal_Heart_Beat, Fetal_movement, Fetal_Heart_Rate, Fetal_Presentation, E_Fetal_Weight, Amniotic_F_Index, Number_Fetus, MaternalComments) VALUES (NOW(), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
          $stmt->bind_param("iisddsdsdiis", $patientID, $contact, $gestationWeek, $fundalHeight, $fetalHeartBeat, $fetalMovement, $fetalHeartRate, $fetalPresentation, $efw, $amnioticIndex, $numberFetus, $maternalComments);

            if ($stmt->execute()) {
                echo "<script>alert('Data saved successfully');</script>";
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

  <div class="container" style="margin-top:100px;">
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-primary"><center>ANTENATAL CARE/ ULTRASOUND EXAM</center></h4>
          </div>
          <form action="" method="POST" id="ultra">
    <div class="modal-body">
        <div class="row">
            <div class="col">
                <label for="patientID">Patient ID</label>
                <input type="text" class="form-control form-control-sm" name="patientID" id="patientID" required>
            </div>
            <div class="col">
                <label for="contact">Contact</label>
                <input type="text" class="form-control form-control-sm" name="contact" id="contact" required>
            </div>

                <div class="col">
                    <label for="gestationWeek" style="color:red;">Gestation (Weeks)</label>
                    <input type="text" class="form-control form-control-sm" name="gestationWeek" id="gestationWeek" required>
                </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="fundalHeight">Fundal Height (cm)</label>
                <input type="text" class="form-control form-control-sm" name="fundalHeight" id="fundalHeight" required>
            </div>
            <div class="col">
                <label for="fetalHeartBeat">Fetal Heart Beat (b/min)</label>
                <input type="text" class="form-control form-control-sm" name="fetalHeartBeat" id="fetalHeartBeat" required>
            </div>
            <div class="col">
                <label for="fetalMovement">Fetal Movement (Y/N)</label>
                <select class="form-select form-select-sm" name="fetalMovement" id="fetalMovement" required>
                    <option value="">Choose</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col">
                <label for="fetalHeartRate">Fetal Heart Rate</label>
                <input type="text" class="form-control form-control-sm" name="fetalHeartRate" id="fetalHeartRate" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="fetalPresentation">Fetal Presentation</label>
                <select name="fetalPresentation" id="fetalPresentation" required class="form-select form-select-sm">
                    <option value="">Select Presentation</option>
                    <option value="cephalic">Cephalic</option>
                    <option value="breech">Breech</option>
                    <option value="transverse">Transverse</option>
                    <option value="unknown">Unknown</option>
                </select>
            </div>
            <div class="col">
                <label for="efw">EFW (Estimated Fetal Weight)</label>
                <input type="text" class="form-control form-control-sm" name="efw" id="efw" required>
            </div>
            <div class="col">
                <label for="amnioticIndex">Amniotic Fluid Index</label>
                <input type="text" class="form-control form-control-sm" step="1" name="amnioticIndex" id="amnioticIndex" required>
            </div>
            <div class="col">
                <label for="numberFetus">Number of Fetus</label>
                <input type="text" class="form-control form-control-sm" name="numberFetus" id="numberFetus" min="1" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="maternalComments" class="label text-warning" style="font-size:14px;"><i style="color:red;">Maternal Comments</i></label>
                <textarea name="maternalComments" id="maternalComments" rows="3" cols="5" class="form-control form-control-sm"></textarea>
            </div>
        </div>
    </div>
    <div class="card-footer d-flex justify-content-end">
    <button type="button" class="btn btn-warning" id="backToPage1">Clear</button>&nbsp;&nbsp;
    <button type="submit" name="submitPage2" class="btn btn-success">Save</button>
</div>

</form>

    </div>
</div>
</div>
</body>
</html>
