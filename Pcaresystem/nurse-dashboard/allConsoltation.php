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

// Prepare and execute SQL query for patientconsoltation table
$stmt1 = $conn->prepare("SELECT PatientID, Contacts, Cervical_Screening, Temperature, Heart_Bit_Rate, Respiratory_Rate, Height, Weight_kg, BMI, MUAC, Blood_Pressure FROM patientconsoltation");
$stmt1->execute();
$result1 = $stmt1->get_result();

// Prepare and execute SQL query for ultrasoundtable
$stmt2 = $conn->prepare("SELECT PatientID, Contact, Gestation_Week, Fundal_Height, Fetal_Heart_Beat, Fetal_movement, Fetal_Heart_Rate, Fetal_Presentation, E_Fetal_Weight, Amniotic_F_Index, Number_Fetus, MaternalComments FROM ultrasoundtable");
$stmt2->execute();
$result2 = $stmt2->get_result();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient and Ultrasound Records</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Patient Consultation Records</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>PatientID</th>
                    <th>Contacts</th>
                    <th>Cervical Screening</th>
                    <th>Temperature</th>
                    <th>Heart Bit Rate</th>
                    <th>Respiratory Rate</th>
                    <th>Height</th>
                    <th>Weight (kg)</th>
                    <th>BMI</th>
                    <th>MUAC</th>
                    <th>Blood Pressure</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row1 = $result1->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row1['PatientID']); ?></td>
                        <td><?php echo htmlspecialchars($row1['Contacts']); ?></td>
                        <td><?php echo htmlspecialchars($row1['Cervical_Screening']); ?></td>
                        <td><?php echo htmlspecialchars($row1['Temperature']); ?></td>
                        <td><?php echo htmlspecialchars($row1['Heart_Bit_Rate']); ?></td>
                        <td><?php echo htmlspecialchars($row1['Respiratory_Rate']); ?></td>
                        <td><?php echo htmlspecialchars($row1['Height']); ?></td>
                        <td><?php echo htmlspecialchars($row1['Weight_kg']); ?></td>
                        <td><?php echo htmlspecialchars($row1['BMI']); ?></td>
                        <td><?php echo htmlspecialchars($row1['MUAC']); ?></td>
                        <td><?php echo htmlspecialchars($row1['Blood_Pressure']); ?></td>
                        <td>
                            <form method="post" action="edit.php">
                                <input type="hidden" name="PatientID" value="<?php echo htmlspecialchars($row1['PatientID']); ?>">
                                <button type="submit" class="btn btn-info">Edit</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <h2>Ultrasound Records</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>PatientID</th>
                    <th>Contacts</th>
                    <th>Gestation Week</th>
                    <th>Fundal Height</th>
                    <th>Fetal Heart Beat</th>
                    <th>Fetal Movement</th>
                    <th>Fetal Heart Rate</th>
                    <th>Fetal Presentation</th>
                    <th>E Fetal Weight</th>
                    <th>Amniotic Fluid Index</th>
                    <th>Number of Fetus</th>
                    <th>Maternal Comments</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row2 = $result2->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row2['PatientID']); ?></td>
                        <td><?php echo htmlspecialchars($row2['Contact']); ?></td>
                        <td><?php echo htmlspecialchars($row2['Gestation_Week']); ?></td>
                        <td><?php echo htmlspecialchars($row2['Fundal_Height']); ?></td>
                        <td><?php echo htmlspecialchars($row2['Fetal_Heart_Beat']); ?></td>
                        <td><?php echo htmlspecialchars($row2['Fetal_movement']); ?></td>
                        <td><?php echo htmlspecialchars($row2['Fetal_Heart_Rate']); ?></td>
                        <td><?php echo htmlspecialchars($row2['Fetal_Presentation']); ?></td>
                        <td><?php echo htmlspecialchars($row2['E_Fetal_Weight']); ?></td>
                        <td><?php echo htmlspecialchars($row2['Amniotic_F_Index']); ?></td>
                        <td><?php echo htmlspecialchars($row2['Number_Fetus']); ?></td>
                        <td><?php echo htmlspecialchars($row2['MaternalComments']); ?></td>
                        <td>
                          <form method="post" action="edit.php">
                            <input type="hidden" name="PatientID" value="<?php echo htmlspecialchars($row1['PatientID']); ?>">
                            <button type="submit" name="edit" class="btn btn-info">Edit</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
// Close statements and connection
$stmt1->close();
$stmt2->close();
$conn->close();
?>
