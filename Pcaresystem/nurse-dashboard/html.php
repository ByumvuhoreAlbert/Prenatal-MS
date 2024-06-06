<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration Form</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h2>Patient Registration Form</h2>
    <form action="" method="post">
        <label for="fullname">Full Name:</label><br>
        <input type="text" id="fullname" name="fullname" required><br><br>

        <label for="dob">Date of Birth:</label><br>
        <input type="date" id="dob" name="dob" required><br><br>

        <label for="gender">Gender:</label><br>
        <input type="radio" id="male" name="gender" value="male" required>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female" required>
        <label for="female">Female</label><br><br>

        <label for="address">Address:</label><br>
        <textarea id="address" name="address" required></textarea><br><br>

        <input type="submit" value="Submit" name="patient">
    </form>

    <canvas id="patientsChart" width="100" height="80"></canvas>
        <script>
            fetch('html1.php')
                .then(response => response.json())
                .then(data => {
                    const patientNames = data.map(patient => patient.patient_name);
                    const patientIds = data.map(patient => patient.patient_id);

                    var ctx = document.getElementById('patientsChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: patientNames,
                            datasets: [{
                                label: 'Patient IDs',
                                data: patientIds,
                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                });
        </script>


    <h2>Urinary Test Form</h2>
    <form action="" method="post">
        <label for="urine_color">Urine Color:</label><br>
        <input type="text" id="urine_color" name="urine_color" required><br><br>

        <label for="urine_ph">pH Level:</label><br>
        <input type="number" id="urine_ph" name="urine_ph" step="0.1" required><br><br>

        <label for="urine_specific_gravity">Specific Gravity:</label><br>
        <input type="number" id="urine_specific_gravity" name="urine_specific_gravity" step="0.001" required><br><br>

        <input type="submit" value="Submit" name="urinary">
    </form>

    <h2>Blood Test Analysis Form</h2>
    <form action="" method="post">
        <label for="blood_pressure">Blood Pressure:</label><br>
        <input type="text" id="blood_pressure" name="blood_pressure" required><br><br>

        <label for="blood_sugar">Blood Sugar Level:</label><br>
        <input type="number" id="blood_sugar" name="blood_sugar" step="0.1" required><br><br>

        <label for="cholesterol">Cholesterol Level:</label><br>
        <input type="number" id="cholesterol" name="cholesterol" step="0.01" required><br><br>

        <input type="submit" value="Submit" name="blood">
    </form>
</body>
<?php
// Database connection parameters

$servername = "localhost";
$username = "root";
$password = "";
$database = "prenatal_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['patient'])){
// Prepare data
$fullname = $_POST['fullname'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$address = $_POST['address'];

// Prepare SQL statement
$sql = "INSERT INTO patient (fullname, dob, gender, address) VALUES (?, ?, ?, ?)";

// Prepare and bind parameters
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $fullname, $dob, $gender, $address);

// Execute the statement
if ($stmt->execute()) {
    echo "New record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close statement and connection
$stmt->close();
}
$conn->close();
?>



<?php
// Start the session
session_start();

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "prenatal_db";

// Function to establish database connection
function connectToDatabase() {
    global $servername, $username, $password, $database;
    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

// Function to get patient ID from session
function getPatientIdFromSession() {
    if (isset($_SESSION['patient_id'])) {
        return $_SESSION['patient_id'];
    } else {
        // Handle the case where patient ID is not set in session
        die("Patient ID is not set in session");
    }
}

// Get patient ID from session
$patient_id = getPatientIdFromSession();

// Function to get patient name from session
function getPatientNameFromSession() {
    if (isset($_SESSION['fullname'])) {
        return $_SESSION['fullname'];
    } else {
        // Handle the case where patient name is not set in session
        die("Patient name is not set in session");
    }
}

// Get patient name from session
$fullname = getPatientNameFromSession();

// Function to insert urinary test data
function insertUrinaryTestData($conn, $patient_id, $urine_color, $urine_ph, $urine_specific_gravity) {
    $sql = "INSERT INTO urinary_test (patient_id, urine_color, urine_ph, urine_specific_gravity) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isdd", $patient_id, $urine_color, $urine_ph, $urine_specific_gravity);
    if ($stmt->execute()) {
        echo "Urinary test data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $stmt->close();
}


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['urinary'])) {
    // Establish database connection
    $conn = connectToDatabase();

    // Insert urinary test data if the form for urinary test is submitted
    if (isset($_POST['urinary_test_submit'])) {
        insertUrinaryTestData($conn, $patient_id, $_POST['urine_color'], $_POST['urine_ph'], $_POST['urine_specific_gravity']);
    }

    // Close database connection
    $conn->close();
}

// Function to insert blood test data
function insertBloodTestData($conn, $patient_id, $blood_pressure, $blood_sugar, $cholesterol) {
    $sql = "INSERT INTO blood_test (patient_id, blood_pressure, blood_sugar, cholesterol) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isdd", $patient_id, $blood_pressure, $blood_sugar, $cholesterol);
    if ($stmt->execute()) {
        echo "Blood test data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $stmt->close();
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['blood'])) {
    // Establish database connection
    $conn = connectToDatabase();

    // Insert blood test data if the form for blood test is submitted
    if (isset($_POST['blood_test_submit'])) {
        insertBloodTestData($conn, $patient_id, $_POST['blood_pressure'], $_POST['blood_sugar'], $_POST['cholesterol']);
    }

    // Close database connection
    $conn->close();
}
?>
