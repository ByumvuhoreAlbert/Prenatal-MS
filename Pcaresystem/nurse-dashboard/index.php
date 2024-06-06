<?php
include('includes/footer.php');
include('includes/header.php');
include('includes/navbar.php');

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .card {
      border: none;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .card-body {
      display: flex;
      align-items: center;
      justify-content: flex-start; /* Align content to the left */
    }
    .card-text {
      margin-bottom: 0;
      margin-left: -10px;
      margin-right: 0px; /* Add some spacing between text and icon */
    }
    .icon {
      font-size: 24px;
    }
  </style>
  </head>
  <body>


<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="row" style="height:80px; margin-bottom:60px;">
    <div class="col-md-12 mb-4">
      <div class="card border-left-success shadow h-100 py-2 bg-primary">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                  <h1 class="h3 mb-0 text-white" style="padding:20px;"> Welcome To Prenatal Health Care</h1>
                  <button type="button" class="btn btn-info shadow-sm" style="padding:10px; margin-right:30px;">
                  <?php echo date('d-M-Y'); ?> <i class="fa fa-calendar" aria-hidden="true"></i> </button>
                </div>
      </div>
    </div>
  </div>
  <div class="row">
  <div class="col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2" style="background-image:url('img/bg2.jpeg'); background-size:100% 100%; background-repeat:no-repeat;">
      <div class="text">

      </div>
    </div>
  </div>

  <div class="col-md-6 mb-4 card border-left-warning shadow" >
    <div class="row">
      <h2 class="text-center mb-4">Status</h2>
      <div class="col-md-4 col-lg-3 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-text">
              <?php
              include('includes/connection.php');
      // SQL query to get the count of records from the "pregnant" table
      $sql = "SELECT COUNT(*) AS total_records FROM doctortable";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $total_records = $row["total_records"];
          echo $total_records;
      } else {
          echo "0";
      }

      // Close database connection
      $conn->close();
      ?> All Doctors </div>
            <span class="icon"><i class="fa fa-solid fa-user-doctor text-info"></i></span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-text">
              <?php
              include('includes/connection.php');
      // SQL query to get the count of records from the "pregnant" table
      $sql = "SELECT COUNT(*) AS total_records FROM pregnant";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $total_records = $row["total_records"];
          echo "<span style='color:black;'>". $total_records. "</span>";
      } else {
          echo "0";
      }

      // Close database connection
      $conn->close();
      ?>
      All Patients</div>
            <span class="icon"><i class="fa fa-solid fa-hospital-user text-primary"></i></span>
          </div>
        </div>
      </div>
      <div class="col-md-8 col-lg-3 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-text">
              <?php
                include('includes/connection.php');
        // SQL query to get the count of records from the "pregnant" table
        $sql = "SELECT COUNT(*) AS records FROM appointments WHERE status='Pending'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $total_records = $row["records"];
            echo $total_records;
        } else {
            echo "0";
        }
        $conn->close();
        ?> All Pending</div>
            <span class="icon"><i class="fa fa-solid fa-clock"></i></span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-text">
              <?php
                include('includes/connection.php');
                $date =date('Y-m-d');
        $sql = "SELECT COUNT(*) AS total_records FROM appointments WHERE appointDate='$date'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $total_records = $row["total_records"];
            echo $total_records;
        } else {
            echo "0";
        }
        $conn->close();
        ?> Today Sessions</div>
            <span class="icon">&#x1F4C5;</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</div>
    </div>

<div class="container-fluid">
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary text-align-center">Scheduled Appointment</h6>
    </div>
    <div class="card-body">
        <table id="example" class="table text-dark" width="100%">
          <thead class="th table-striped">
            <tr>
              <th>No</th>
              <th> Patient ID </th>
              <th> Full Names </th>
              <th>Telephone </th>
              <th>Doctor Names</th>
              <th>Appoint Dates & Time</th>
              <th>Reason for Appoints</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include('includes/connection.php');
$query = "SELECT appointID, patientID, fullNames, telephone, doctorNames, appointDate, reason, status FROM appointments WHERE status = 'Pending'";

$result = $conn->query($query);
if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          ?>
                  <tr>
                    <?php
                    if($row['status']=='Pending'){
                    ?>
                  <td><input type="hidden" class="" value="<?php echo $row['appointID']; ?>"><?php echo $row['appointID']; ?><i class="fa text-success fa-regular fa-circle " aria-hidden="true"></i></td>
                  <?php
                }else{
                  ?>
                  <td><input type="hidden" class="" value="<?php echo $row['appointID']; ?>"><?php echo $row['appointID']; ?><i class="fa text-success fa-regular fa-circle " aria-hidden="true"></i></td>
                  <?php
                }
                ?>
                  <td><input type="hidden" class="fetalMovementInput" value="<?php echo $row['patientID']; ?>"><?php echo $row['patientID']; ?></td>
                  <td><input type="hidden" class="numberOfFetusesInput" value="<?php $row['fullNames']; ?>"><?php echo $row['fullNames']; ?></td>
                  <td><input type="hidden" class="contactsInput" value="<?php echo $row['telephone']; ?>"><?php echo $row['telephone']; ?></td>
                  <td><input type="hidden" class="patientIDInput" value="<?php echo $row['doctorNames']; ?>"><?php echo $row['doctorNames']; ?></td>
                  <td><input type="hidden" class="namesInput" value="<?php echo $row['appointDate']; ?>"><?php echo $row['appointDate']; ?></td>
                  <td><input type="hidden" class="fundalHeightInput" value="<?php echo $row['reason']; ?>"><?php echo $row['reason']; ?></td>

                  </tr>

                <?php
        }
    }
    $result->free();
} else {
    echo "Error: " . $mysqli->error;
}
$conn->close();
?>


<script>
    function confirmUpdate() {
        var result = confirm("Are you sure you want to approve the appointment status?");
        if (result) {
            document.getElementById("approveForm").submit();
        }
    }
</script>
</tbody>
</table>
</div>
<a href="viewAllAppoints.php" style="margin:10px 0px 20px 400px;">
<button type="submit" class="btn bg-primary text-white">View All Appointment</button></a>

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
  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>
</body>
</html>
