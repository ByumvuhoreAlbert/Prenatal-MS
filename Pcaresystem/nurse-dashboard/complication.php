<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prenatal_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['report'])){
$patientID = $_POST['patientID'];
$date = $_POST['date'];
$exam_type = $_POST['exam'];
$complication = $_POST['complication'];
$additional_info = $_POST['comment'];

// Check if patientID exists in the pregnant table
$stmt = $conn->prepare("SELECT name, PhoneNumber FROM pregnant WHERE regNo = ?");
$stmt->bind_param("i", $patientID);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($name, $phone);
    $stmt->fetch();

    // Insert data into the complications table
    $stmt = $conn->prepare("INSERT INTO complications (patientID, name, phone, date, exam_type, complication, additional_info) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssss", $patientID, $name, $phone, $date, $exam_type, $complication, $additional_info);

    if ($stmt->execute()) {
        echo "<script>alert('Data inserted successfully');</script>";
    } else {
        echo "<script>alert('Error inserting data: " . $stmt->error. "');</script>";
    }
} else {
    echo "<script>alert('Patient ID not found in the pregnant table');</script>";
}

$stmt->close();
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PMS || Report Complication</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  </head>
  <body>
    <div class="container-fluid">
      <div class="container">
        <div class="form-group">
          <form class="form" action="index.html" method="post">
          <a href="index.php"><button type="button" name="button" class="btn text-info" style="border:none; outline:none">Go Back</button></a>
          </form>
        </div>
      </div>
      <div class="card shadow mb-4">
        <div class="container">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" style="text-align:center;">REPORT COMPLICATION</h6>
          </div>
      <form class="form" name="reportForm" action="" method="post" onsubmit="return validateForm()">
        <div class="row">
          <div class="col">
            <label for=""class="form-label">PatientID</label>
            <input type="number" name="patientID" value="" class="form-control form-control-sm">
          </div>
          <div class="col">
            <label for=""class="form-label">Date</label>
            <input type="date" name="date" value="" class="form-control form-control-sm">
          </div>
          <div class="col">
            <label for=""class="form-label">Exam Type</label>
            <input type="text" name="exam" value="" class="form-control form-control-sm">
          </div>
          <div class="col">
            <label for=""class="form-label">Complication Exam</label>
            <input type="text" name="complication" value="" class="form-control form-control-sm">
          </div>

        </div>
        <div class="row">
          <div class="col">
            <label for=""class="form-label">Additional Information</label>
            <textarea name="comment" rows="5" value="" class="form-control form-control-sm"></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <button type="submit" class="btn float-right bg-info" name="report" style="
            padding:5px; margin:40px;">Report</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
        function validateForm() {
            var patientID = document.forms["reportForm"]["patientID"].value;
            var date = document.forms["reportForm"]["date"].value;
            var exam = document.forms["reportForm"]["exam"].value;
            var complication = document.forms["reportForm"]["complication"].value;

            if (patientID == "" || isNaN(patientID)) {
                alert("Please enter a valid Patient ID");
                return false;
            }
            if (date == "") {
                alert("Please select a date");
                return false;
            }
            if (exam == "") {
                alert("Please enter the exam type");
                return false;
            }
            if (complication == "") {
                alert("Please enter the complication");
                return false;
            }
        }
    </script>
  </body>
</html>
