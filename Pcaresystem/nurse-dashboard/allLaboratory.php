<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>
    <div class="container-fluid">

      <div style='margin-bottom:40px;' class="container bg-secondary text-white">
      <a href="index.php"><button type="button" name="button" class="btn text-white" style="border:none; outline:none"><< Go Back</button></a>  
    <?php
// Database connection details
$host = "localhost";
$dbname = "prenatal_db";
$username = "root";
$password = "";

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT patientID, contact, testDate, glucosuria, proteinuria, appearance, ph, protein, glucose, ketones, leukocytes FROM urinaryExams";

   // Prepare the statement
   $stmt = $pdo->prepare($sql);

    // Execute the statement
    $stmt->execute();

    // Fetch the results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Display the results
    if (count($results) > 0) {
        echo "<table id='example' width='100%' border='1'>";
        echo "<thead><tr><th colspan='11' style='text-align:center; border:2px solid skyblue;'>URINALYSIS (ECBU) RESULTS</th></tr>";
        echo "<tr><th>PatientID</th><th>Contact</th><th>Test Date</th><th>Glucosuria</th><th>Proteinuria</th><th>Appearance</th><th>pH</th><th>Protein</th><th>Glucose</th><th>Ketones</th><th>Leukocytes</th></tr></thead>";
        echo "<tbody border='1'>";
        foreach ($results as $row) {
            echo "<tr>";
            echo "<td>" . $row['patientID'] . "</td>";
            echo "<td>" . $row['contact'] . "</td>";
            echo "<td>" . $row['testDate'] . "</td>";
            echo "<td>" . $row['glucosuria'] . "</td>";
            echo "<td>" . $row['proteinuria'] . "</td>";
            echo "<td>" . $row['appearance'] . "</td>";
            echo "<td>" . $row['ph'] . "</td>";
            echo "<td>" . $row['protein'] . "</td>";
            echo "<td>" . $row['glucose'] . "</td>";
            echo "<td>" . $row['ketones'] . "</td>";
            echo "<td>" . $row['leukocytes'] . "</td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "No records found.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
</div>
<div style='margin-bottom:40px;' class="container bg-dark text-white">
<?php
// Database connection details
$host = "localhost";
$dbname = "prenatal_db";
$username = "root";
$password = "";

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT patientID, contact, WBC, RBC, Hb, Plt, RPR_NP, HIV_NP, Malaria_NP, Hepatite_B_NP, Hepatite_C_NP, Glycemia, AdditionalComments FROM laboratoryExams";

   // Prepare the statement
   $stmt = $pdo->prepare($sql);

    // Execute the statement
    $stmt->execute();

    // Fetch the results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Display the results
    if (count($results) > 0) {
        echo "<table id='example1' width='100%' border='1' >";
        echo "<thead><tr><th colspan='13' style='text-align:center; border:2px solid skyblue;'>LABORATORY EXAMS RESULTS</th></tr>";
        echo "<tr><th>ID</th><th>Contact</th><th>WBC</th><th>RBC</th><th>Hb</th><th>Plt</th><th>RPR</th><th>HIV</th><th>Malaria</th><th>Hepatite</th><th>Hepatite C</th><th>Glycemia</th><th>Comments</th></tr></thead>";
        echo "<tbody>";
        foreach ($results as $row) {
            echo "<tr>";
            echo "<td>" . $row['patientID'] . "</td>";
            echo "<td>" . $row['contact'] . "</td>";
            echo "<td>" . $row['WBC'] . "</td>";
            echo "<td>" . $row['RBC'] . "</td>";
            echo "<td>" . $row['Hb'] . "</td>";
            echo "<td>" . $row['Plt'] . "</td>";
            echo "<td>" . $row['RPR_NP'] . "</td>";
            echo "<td>" . $row['HIV_NP'] . "</td>";
            echo "<td>" . $row['Malaria_NP'] . "</td>";
            echo "<td>" . $row['Hepatite_B_NP'] . "</td>";
            echo "<td>" . $row['Hepatite_C_NP'] . "</td>";
            echo "<td>" . $row['Glycemia'] . "</td>";
            echo "<td>" . $row['AdditionalComments'] . "</td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "No records found.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
</div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- jsPDF -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>
  <!-- DataTables Buttons PDF HTML5 Export -->
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
  <!-- DataTables Buttons JSZip -->
  <script type="text/javascript">
    new DataTable('#example');
    new DataTable('#example1');
  </script>
</div>
  </body>
</html>
