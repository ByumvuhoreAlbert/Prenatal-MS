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

$patientID = $_POST['PatientID'];

// Prepare and execute SQL query for patientconsoltation table
$stmt1 = $conn->prepare("SELECT PatientID, Contacts, Cervical_Screening, Temperature, Heart_Bit_Rate, Respiratory_Rate, Height, Weight_kg, BMI, MUAC, Blood_Pressure FROM patientconsoltation WHERE PatientID = ?");
$stmt1->bind_param("s", $patientID);
$stmt1->execute();
$result1 = $stmt1->get_result();
$patientData = $result1->fetch_assoc();

// Prepare and execute SQL query for ultrasoundtable
$stmt2 = $conn->prepare("SELECT PatientID, Contact, Gestation_Week, Fundal_Height, Fetal_Heart_Beat, Fetal_movement, Fetal_Heart_Rate, Fetal_Presentation, E_Fetal_Weight, Amniotic_F_Index, Number_Fetus, MaternalComments FROM ultrasoundtable WHERE PatientID = ?");
$stmt2->bind_param("s", $patientID);
$stmt2->execute();
$result2 = $stmt2->get_result();
$ultrasoundData = $result2->fetch_assoc();

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
      <h2>Edit Ultrasound Record</h2>
<form action="update.php" method="POST">
<input type="hidden" name="PatientID" value="<?php echo htmlspecialchars($ultrasoundData['PatientID']); ?>">
<div class="form-group">
    <label for="Contact">Contact</label>
    <input type="text" class="form-control" id="Contact" name="Contact" value="<?php echo htmlspecialchars($ultrasoundData['Contact']); ?>" required>
</div>

<button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
</body>
</html>

<?php
// Close statements and connection
$stmt1->close();
$stmt2->close();
$conn->close();
?>

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $patientID = $_POST['PatientID'];
    // Retrieve other form data for patient consultation and ultrasound records

    // Prepare and execute SQL query to update patient consultation record
    $stmt1 = $conn->prepare("UPDATE patientconsoltation SET Contacts = ?, Cervical_Screening = ?, Temperature = ?, Heart_Bit_Rate = ?, Respiratory_Rate = ?, Height = ?, Weight_kg = ?, BMI = ?, MUAC = ?, Blood_Pressure = ? WHERE PatientID = ?");
    $stmt1->bind_param("sssssssssss", $contacts, $cervicalScreening, $temperature, $heartBitRate, $respiratoryRate, $height, $weightKg, $bmi, $muac, $bloodPressure, $patientID);

    // Set parameters
    $contacts = $_POST['Contacts'];
    // Set other parameters for patient consultation data

    // Execute statement
    $stmt1->execute();

    // Prepare and execute SQL query to update ultrasound record
    $stmt2 = $conn->prepare("UPDATE ultrasoundtable SET Contact = ?, Gestation_Week = ?, Fundal_Height = ?, Fetal_Heart_Beat = ?, Fetal_movement = ?, Fetal_Heart_Rate = ?, Fetal_Presentation = ?, E_Fetal_Weight = ?, Amniotic_F_Index = ?, Number_Fetus = ?, MaternalComments = ? WHERE PatientID = ?");
    $stmt2->bind_param("ssssssssssss", $contact, $gestationWeek, $fundalHeight, $fetalHeartBeat, $fetalMovement, $fetalHeartRate, $fetalPresentation, $eFetalWeight, $amnioticFIndex, $numberFetus, $maternalComments, $patientID);

    // Set parameters
    $contact = $_POST['Contact'];
    // Set other parameters for ultrasound data

    // Execute statement
    $stmt2->execute();

    // Redirect to the main page or any other page after updating
    header("Location: index.php");
    exit();
}

// Close connection
$conn->close();
?>
