<?php
include 'includes/DBController.php';
$conn = new DBController();
$sql = "SELECT patientID, fullNames, telephone, doctorNames, appointDate, reason, status FROM appointments";
$result = $conn->query($sql);
if (isset($_POST["export"])) {
    $filename = "Export_excel.xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    $isPrintHeader = false;
    if (! empty($result)) {
        foreach ($result as $row) {
            if (! $isPrintHeader) {
                echo implode("\t", array_keys($row)) . "\n";
                $isPrintHeader = true;
            }
            echo implode("\t", array_values($row)) . "\n";
        }
    }
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style media="screen">
    .vertical-text {
    writing-mode: vertical-lr;
    transform: rotate(180deg);
}
td, th {
  width:30px;
}
    </style>
  </head>
  <body class="body bg-info">
      <div class="container mt-5 mb-3">
        <button class="btn btn-primary" onclick="goBack()">Go Back</button>
        <form action="" method="post" class="form float-right">

            <button type="submit" id="btnExport" name='export'
                value="Export to Excel" class="btn btn-success ">
                <i class="fas fa-download fa-fw"></i> Download excel File</button>
        </form>
      </div>
      <script>
    function goBack() {
      window.history.back();
    }
    </script>
    <div class="container">
      <table id='example' class="table" width="100%">
        <thead>
          <th>PatientID</th>
          <th>Names</th>
          <th>Phone</th>
          <th>Doctor Names</th>
          <th>Appointment Date</th>
          <th>Reason</th>
          <th>Status</th>
        </thead>
        <?php
        include('includes/connection.php');
        $query = "SELECT patientID, fullNames, telephone, doctorNames, appointDate, reason, status FROM appointments";
        $result = $conn->query($query);
        if (! empty($result))  {
          echo "<tbody>";

          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $value) {
              echo "<td>" . $value . "</td>";
            }
            echo "</tr>";
          }
          echo "</tbody>";
        } else {
          echo "<tr><td colspan='5'>No records found.</td></tr>";
        }
        // Close database connection
        $conn->close();
        ?>
      </table>
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

<script>
  new DataTable('#example');
  </script>

</body>
</html>
