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

// Query to fetch data from the complications table
$sql = "SELECT patientID, name, phone, date, exam_type, complication, additional_info FROM complications";
$result = $conn->query($sql);

// Store the data in an array
$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td> $row['patientID']</td>
            <td> $row[name]</td>
            <td> $row['phone']</td>
            <td> $row[date']</td>
            <td> $row['exam_type']</td>
            <td> $row['complication']</td>
            <td> $row['additional_info']</td>
            </tr>";
    }
}


$conn->close();
?>
