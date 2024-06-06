<?php
// Include database connection code here
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
// Fetch data from the patient table
$query = "SELECT * FROM patient";
$result = mysqli_query($conn, $query);

$patients = array();
while ($row = mysqli_fetch_assoc($result)) {
    $patients[] = $row;
}

// Set response headers
header('Content-Type: application/json');

// Return the data as JSON
echo json_encode($patients);
?>
