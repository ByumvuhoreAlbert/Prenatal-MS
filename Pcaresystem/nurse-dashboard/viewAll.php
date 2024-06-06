<?php
include 'includes/DBController.php';
$conn = new DBController();
$sql = "SELECT * FROM pregnant";
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
    <div class="table-responsive" style="margin-left: 20px; margin-right: 30px;">
      <div class="container mt-5 mb-3">
        <button class="btn btn-primary" onclick="goBack()">Go Back</button>
        <form action="" method="post" style="float: right;">
            <button type="submit" id="btnExport" name='export'
                value="Export to Excel" class="btn btn-info">Export to
                excel</button>
        </form>
      </div>
      <script>
    function goBack() {
      window.history.back();
    }
    </script>
      <table id='example' class="table table-striped table-borderless">
        <?php
        include('includes/connection.php');
        // SQL query to select all records from the "pregnant" table
        $query = "SELECT * FROM pregnant";
        $result = $conn->query($query);
        if (! empty($result))  {
          echo "<thead class='table table-dark'><tr>"; // Use thead-dark for the table head
          while ($field = $result->fetch_field()) {
            echo "<th>" . $field->name . "</th>";
          }
          echo "</tr></thead><tbody>"; // Close the table header row and start table body
          // Print table data
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
    $(document).ready(function() {
      var table = $('#example').DataTable({
        dom: 'Bfrtip',
        buttons: [{
          extend: 'pdfHtml5',
          text: 'Download as PDF',
          className: 'btn btn-primary',
          filename: 'table_pdf',
          exportOptions: {
            modifier: {
              page: 'all'
            }
          }
        }]
      });

      $('#downloadBtn').on('click', function() {
        table.buttons().trigger();
      });
    });
  </script>

</body>
</html>
