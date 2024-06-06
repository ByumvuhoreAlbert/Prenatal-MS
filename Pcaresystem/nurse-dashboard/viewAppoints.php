<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PMS || All Appointment</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>
  <body>

<div class="container fluid">
  <div class="container mt-5" style="margin-bottom:20px;">
    <button class="btn btn-primary" onclick="goBack()">Go Back</button>
  </div>
  <script>
    function goBack() {
      window.history.back();
    }
    </script>
<div class="container">
  <table id="example" class="table table-striped" width="80%">
    <thead class="table table-striped bg-warning">
      <tr>
      <th>AppointID</th>
      <th>PatientID</th>
      <th> Full Names </th>
      <th style="width:80px;">Telephone </th>
      <th>Doctor Names</th>
      <th>Appointment Date</th>
      <th>Reason for Appointment</th>
      <th>Status</th>
    </tr>
    <tbody>
      <?php
      include('includes/connection.php');
$query = "SELECT appointID, patientID, fullNames, telephone,  doctorNames, appointDate, reason, status FROM appointments ";

$result = $conn->query($query);
if ($result) {
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    ?>
            <tr>
            <td><?php echo $row['appointID']; ?></td>
            <td><?php echo $row['patientID']; ?></td>
            <td><?php echo $row['fullNames']; ?></td>
            <td><?php echo $row['telephone']; ?></td>
            <td><?php echo $row['doctorNames']; ?></td>
            <td><?php echo $row['appointDate']; ?></td>
            <td><?php echo $row['reason']; ?></td>
            <?php
            if($row['status']=='Pending'){
            ?>
          <td><i class="fa text-success fa-regular fa-circle " aria-hidden="true"></i></td>
          <?php
        }else{
          ?>
          <td class="table text-warning">&#10003;</i></td>
          <?php
        }
        ?>
            </tr>

          <?php
      "</td></tr>";
  }
} else {
  echo "No appointments found.";
}

// Free result set
$result->free();
} else {
echo "Error: " . $mysqli->error;
}
$conn->close();
?>
<i class="fa text-success fa-regular fa-circle " aria-hidden="true"></i> Pending
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<i class="text text-warning">&#10003;</i> Approved

    </tbody>
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
<script>
  new DataTable('#example');
</script>
</body>
</html>
