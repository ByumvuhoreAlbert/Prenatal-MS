<?php
// Database connection parameters
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
$patientData="";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
    $patientID = $_POST['PatientID'];
    $stmt1 = $conn->prepare("SELECT PatientID, Contacts, Cervical_Screening, Temperature, Heart_Bit_Rate, Respiratory_Rate, Height, Weight_kg, BMI, MUAC, Blood_Pressure FROM patientconsoltation WHERE PatientID = ?");
    $stmt1->bind_param("s", $patientID);
    $stmt1->execute();
    $result1 = $stmt1->get_result();
    $patientData = $result1->fetch_assoc();

  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Patient Consultation Record</h2>
        <form action="" method="POST">
            <input type="hidden" name="PatientID" value="<?php echo htmlspecialchars($patientData['PatientID']); ?>">
            <div class="form-group">
                <label for="Contacts">Contacts</label>
                <input type="text" class="form-control" id="Contacts" name="Contacts" value="<?php echo htmlspecialchars($patientData['Contacts']); ?>" required>
            </div>
            <div class="form-group">
                <label for="Cervical">Cervical Screening</label>
                <input type="text" class="form-control" id="Cervical" name="Cervical" value="<?php echo htmlspecialchars($patientData['Cervical_Screening']); ?>" required>
            </div>
            <div class="form-group">
                <label for="Temperature">Temperature</label>
                <input type="text" class="form-control" id="Temperature" name="Temperature" value="<?php echo htmlspecialchars($patientData['Temperature']); ?>" required>
            </div>
            <div class="form-group">
                <label for="Heart">Heart Bit Rate</label>
                <input type="text" class="form-control" id="Heart" name="Heart" value="<?php echo htmlspecialchars($patientData['Heart_Bit_Rate']); ?>" required>
            </div>
            <div class="form-group">
                <label for="Respiratory">Respiratory Rate</label>
                <input type="text" class="form-control" id="Respiratory" name="Respiratory" value="<?php echo htmlspecialchars($patientData['Respiratory_Rate']); ?>" required>
            </div>
            <div class="form-group">
                <label for="Height">Height</label>
                <input type="text" class="form-control" id="Height" name="Height" value="<?php echo htmlspecialchars($patientData['Height']); ?>" required>
            </div>
            <div class="form-group">
                <label for="Weight_kg">Weight (kg)</label>
                <input type="text" class="form-control" id="Weight_kg" name="Weight_kg" value="<?php echo htmlspecialchars($patientData['Weight_kg']); ?>" required>
            </div>
            <div class="form-group">
                <label for="BMI">BMI</label>
                <input type="text" class="form-control" id="BMI" name="BMI" value="<?php echo htmlspecialchars($patientData['BMI']); ?>" required>
            </div>
            <div class="form-group">
                <label for="MUAC">MUAC</label>
                <input type="text" class="form-control" id="MUAC" name="MUAC" value="<?php echo htmlspecialchars($patientData['MUAC']); ?>" required>
            </div>
            <div class="form-group">
                <label for="Blood_Pressure">Blood Pressure</label>
                <input type="text" class="form-control" id="Blood_Pressure" name="Blood_Pressure" value="<?php echo htmlspecialchars($patientData['Blood_Pressure']); ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>

<?php


// Database connection parameters
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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $patientID = $_POST['PatientID'];
    $contacts = $_POST['Contacts'];
    $cervicalScreening = $_POST['Cervical'];
    $temperature = $_POST['Temperature'];
    $heartBitRate = $_POST['Heart'];
    $respiratoryRate = $_POST['Respiratory'];
    $height = $_POST['Height'];
    $weightKg = $_POST['Weight_kg'];
    $bmi = $_POST['BMI'];
    $muac = $_POST['MUAC'];
    $bloodPressure = $_POST['Blood_Pressure'];

    $stmt1 = $conn->prepare("UPDATE patientconsoltation SET Contacts = ?, Cervical_Screening = ?, Temperature = ?, Heart_Bit_Rate = ?, Respiratory_Rate = ?, Height = ?, Weight_kg = ?, BMI = ?, MUAC = ?, Blood_Pressure = ? WHERE PatientID = ?");
    $stmt1->bind_param("sssssssssss", $contacts, $cervicalScreening, $temperature, $heartBitRate, $respiratoryRate, $height, $weightKg, $bmi, $muac, $bloodPressure, $patientID);

    if ($stmt1->execute()) {
        echo "<script>alert('Update successful');</script>";
    } else {
        echo "<script>alert('Update failed');</script>";
    }

    $stmt1->close();
    $conn->close();
}
?>
