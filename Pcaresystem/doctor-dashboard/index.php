<?php
include('includes/header.php');
include('includes/navbar.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <style>
    </style>
    </head>
  <body>
    <!-- Begin Page Content -->
    <div class="container-fluid">
      <div class="row ">
        <div class="col-md-4 mb-4">
          <div class="card custom-card border-left-primary shadow">
            <div class="card-body">
              <h5 class="card-title">Action Menu  <?php echo date('d-M-Y');?></h5>

              <button type="button" name="button" class="btn bg-white custom-btn" data-toggle="modal" data-target="#addDoctorModal">Add Nurse</button>
                  <button type="button" name="button" class="btn bg-white custom-btn" data-toggle="modal" data-target="#viewModal">View Doctor</button>
              <a href="" style="
            color: rgb(60, 179, 113);
            padding: 14px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-weight: bold;
          ">Add Nurse</a>
            <a href="sendTest.php" style="
          color: rgb(60, 179, 113);
          padding: 14px 25px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-weight: bold;
        ">Send SMS</a>
            </div>
          </div>
        </div>

        <div class="col-md-6 mb-4">
          <div class="card custom-card border-left-info shadow">
            <div class="card-body">
              <h5 class="card-title text-info">Generate Reports</h5>
                <button type="button" name="button" class="btn bg-info custom-btn" data-toggle="modal" data-target="#oneMonthModal">Term 1</button>
                <button type="button" name="button" class="btn bg-info custom-btn" data-toggle="modal" data-target="#twoMonthModal">Term 2</button>
                <button type="button" name="button" class="btn bg-info custom-btn" data-toggle="modal" data-target="#threeMonthModal">Term 3</button>
                <button type="button" name="button" class="btn bg-info custom-btn" data-toggle="modal" data-target="#myModal">Complitated Pregnacy</button>
            </div>
          </div>
        </div>

    <div class="container-fluid">
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Scheduled Appointment
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#appointmentModal">
          Schedule Appointment
        </button>
      </h6>
    </div>
    <div class="card-body">
        <table id="example" class="" width="100%" style="margin-left:-15px;">
          <thead class="">
            <tr>
              <th>No</th>
              <th> Patient ID </th>
              <th> Full Names </th>
              <th>Telephone </th>
              <th>Doctor Names</th>
              <th>Appoint Dates & Time</th>
              <th>Reason for Appoints</th>
              <th colspan="">Events </th>
            </tr>
          </thead>
          <?php
            $conn = new mysqli('localhost', 'root', '', 'prenatal_db');
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
$query = "SELECT appointID, patientID, fullNames, telephone, doctorNames, appointDate, reason, status FROM appointments WHERE status='Pending'";

$result = $conn->query($query);
if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          ?>
                  <tbody><tr>
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
                  <td>
                    <form action='' method='POST' id="approveForm">
                  <input type='hidden' class="" name='search2' id="search2" value='<?php echo $row['patientID']; ?>'>
                  <input type='hidden' class="" name='search1' id="search1" value='<?php echo $row['appointID']; ?>'>
                  <button type="submit" name="approve" class="btn btn-warning" onclick="confirmUpdate()">
                  APPROVE
                  </button>
                  </form>
                  </td>
                  </tr>
                  </tbody>
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

</table>
<?php
$conn = new mysqli('localhost', 'root', '', 'prenatal_db');
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['approve'])) {
    $search1 = $_POST['search1'];
    $search2 = $_POST['search2'];
    $sql = "UPDATE appointments SET status = 'Approved' WHERE appointID  = '$search1' AND patientID  = '$search2' AND status = 'Pending'";
    $result = $conn->query($sql);
    if ($result == TRUE) {
        echo "<script>alert('Appointment status updated successfully!');</script>";
    } else {
        echo "<script>alert('Error updating appointment status: " . $conn->error . "');</script>";
    }
}
?>
<script>
    function confirmUpdate() {
        var result = confirm("Are you sure you want to approve the appointment status?");
        if (result) {
            document.getElementById("approveForm").submit();
        }
    }
</script>
<a href="viewAllAppoints.php">
<button type="submit" class="btn bg-primary text-white font-weight-bolder" style="margin-left:400px;">View All Appointment</button></a>
</div>
</div>
</div>


      <div class="modal fade" id="addDoctorModal">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Add Nurse</h4>
                      <button type="button" class="close" data-dismiss="modal">
                      <span aria-hidden="true" style="color:red; font-size:36px;">&times;</span>
                    </button>
                  </div>
                  <form action="" method="post" id="addDoctorForm">
    <div class="modal-body">
        <div class="row">
            <div class="col form-group">
                <label for="nurseName">Nurse Name:</label>
                <input type="text" class="form-control" id="nurseName" name="nurseName" required>
            </div>
            <div class="col form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
        </div>
        <div class="row">
            <div class="col form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="col form-group">
                <label for="hospital">Hospital:</label>
                <input type="text" class="form-control" id="hospital" name="hospital">
            </div>
        </div>
        <div class="row">
            <div class="col form-group">
                <label for="health">Health Center:</label>
                <input type="text" class="form-control" id="health" name="health">
            </div>
            <div class="col form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="addNurse">Submit</button>
    </div>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addNurse'])) {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prenatal_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve and validate form data
    $nurseName = trim($_POST['nurseName']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $hospital = trim($_POST['hospital']);
    $health = trim($_POST['health']);
    $password = trim($_POST['password']);

    // Basic validation
    if (empty($nurseName) || empty($email) || empty($phone) || empty($password)) {
        echo "<script>alert('Please fill in all required fields.');</script>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format.');</script>";
    } else {
        // Encrypt the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO nurse (name, email, phone, Hospital, HealtCare, password) VALUES (?, ?, ?, ?, ?, ?)");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param("ssssss", $nurseName, $email, $phone, $hospital, $health, $hashed_password);

        // Execute statement
        if ($stmt->execute()) {
            echo "<script>alert('New nurse record created successfully');</script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }

        // Close statement
        $stmt->close();
    }

    // Close connection
    $conn->close();
}
?>



              </div>
          </div>
      </div>


    <!-- View doctor modal -->
    <div class="modal fade" id="viewModal">
        <div class="modal-dialog">
            <div class="modal-content" style="width:1000px; margin-left:-140px;">
                <div class="modal-header">
                    <h4 class="modal-title">Available Doctors</h4>
                    <button type="button" class="close" data-dismiss="modal" >
                    <span aria-hidden="true" style="color:red; font-size:36px;">&times;</span>
                  </button>
                </div>
                <div class="table-responsive">
                  <table class="table table-border" id="example" width="100px;">
                    <thead class="table table-dark table-striped">
                      <tr>
                        <th>Doctor ID</th>
                        <th>Full Names</th>
                        <th>Emails</th>
                        <th>Phone</th>
                        <th>Hospital</th>
                        <th>Specialists</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $conn = new mysqli('localhost', 'root', '', 'prenatal_db');
                      if ($conn->connect_error) {
                      die("Connection failed: " . $conn->connect_error);
                      }

                      $date = date('Y-m-d');
                      $query = "SELECT * FROM DoctorTable";
                      $result = $conn->query($query);

            if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr><td>" . $row['AdminID'] . "</td><td>" .
              $row['FullNames'] . "</td><td>" .
              $row['Emails'] . "</td><td>" . $row['Phone'] . "</td><td>" .
              $row['Hospital'] . "</td><td>" .
              $row['Specialists'] . "</td><td>" .
              "<form method='post' action='' onsubmit='return confirmDelete();'>
              <input type='hidden' value='{$row['AdminID']}' name='patientId'>
              <input type='hidden' value='{$row['Emails']}' name='email'>
              <button type='submit' class='btn btn-success' name='delete' id='delete'>Delete</button>
              </form>" .
              "</td></tr>";
            }
          }
            ?>
          </tbody>
        </table>
        <?php
    // Establishing connection to the database
    $conn = new mysqli('localhost', 'root', '', 'prenatal_db');

    // Checking the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Checking if the request method is POST and if the 'delete' parameter is set
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
        // Sanitize and validate input
        $patientId = $_POST['patientId'];
        $email = $_POST['email'];

        // Prepared statement to prevent SQL injection
        $sql = "DELETE FROM DoctorTable WHERE AdminID = ? AND Emails = ?";
        $stmt = $conn->prepare($sql);

        // Bind parameters and execute the statement
        $stmt->bind_param("ss", $patientId, $email);
        if ($stmt->execute()) {
            echo "<script>alert('Record deleted successfully.');</script>";
        } else {
            echo "<script>alert('Error deleting record: " . $conn->error. "');</script>";
        }

        // Close the statement
        $stmt->close();
    }

    // Close the connection
    $conn->close();
    ?>
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this record?");
        }
    </script>
      </div>
    </div>
    </div>
    </div>
    <!-- first term for pregnancy -->
    <div class="modal fade" id="oneMonthModal" tabindex="-1" role="dialog" aria-labelledby="oneMonthModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content" style="width:1240px; margin-left:-40px;">
                <div class="modal-header">
                    <h5 class="modal-title text-success" id="oneMonthModalLabel">Pregnant Mothers - Term 1
                      </h5>
                      <form action="" method="post" class="form float-end">
            <button type="submit" id="btnExport" name='export'
                value="Export to Excel" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i>Download Report</button>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color:red; font-size:36px;">&times;</span>
                </button>
        </form>

                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                      <table class="table table-primary table-striped" id="exampleTerm" width="100%">
                        <thead>
                          <th>Reg Date</th>
                          <th>Patient ID</th>
                          <th>Patient Names</th>
                          <th>Health Center</th>
                          <th>Phone</th>
                          <th>Contact Phone</th>
                          <th>District</th>
                          <th>Sector</th>
                          <th>Cell</th>
                          <th>Village</th>
                          <th>LMP Date</th>
                          <th>ED Date</th>
                          <th>Days</th>
                        </thead>
                        <tbody>
                          <?php
  // Establishing connection to the database
  $conn = new mysqli('localhost', 'root', '', 'prenatal_db');

  // Checking the connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  // Assuming $hospital is defined somewhere in your code
  $sql = "SELECT registed_date,regNo,name,healthCenter,PhoneNumber,ContactNumber,district,sector,cell,village,lmpd,edd FROM pregnant ";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          $lmp_date = $row["lmpd"];
          $edd_date = $row["edd"];
          $today_date = date("Y-m-d");
          $pregnancy_term = round((strtotime($today_date) - strtotime($lmp_date)) / (60 * 60 * 24));
          if ($pregnancy_term <= 84) {
              echo "<tr>";
              echo "<td>" . $row['registed_date'] . "</td>";
              echo "<td>" . $row['regNo'] . "</td>";
              echo "<td>" . $row['name'] . "</td>";
              echo "<td>" . $row['healthCenter'] . "</td>";
              echo "<td>" . $row['PhoneNumber'] . "</td>";
              echo "<td>" . $row['ContactNumber'] . "</td>";
              echo "<td>" . $row['district'] . "</td>";
              echo "<td>" . $row['sector'] . "</td>";
              echo "<td>" . $row['cell'] . "</td>";
              echo "<td>" . $row['village'] . "</td>";
              echo "<td>" . $lmp_date . "</td>";
              echo "<td>" . $edd_date . "</td>";
              echo "<td>" . $pregnancy_term . "</td>";
              echo "</tr>";
          }
      }
  } else {
      echo "<tr><td colspan='13'>No data available</td></tr>";
  }

  $conn->close();
  ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>

    <!-- Second term for pregnacy -->
    <div class="modal fade" id="twoMonthModal" tabindex="-1" role="dialog" aria-labelledby="oneMonthModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width:1240px; margin-left:-360px;">
            <div class="modal-header">
                <h5 class="modal-title text-success" id="oneMonthModalLabel">Pregnant Mothers - Term 2</h5>
                <form action="" method="post" class="form float-end">
                    <button type="submit" id="btnExport" name='print' value="Export to Excel" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i>Download Report</button>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color:red; font-size:36px;">&times;</span>
                    </button>
                </form>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-primary table-striped" id="example2" width="100%">
                        <thead>
                            <tr>
                                <th>Registed Date</th>
                                <th>Patient ID</th>
                                <th>Patient Names</th>
                                <th>Health Center</th>
                                <th>Telephone</th>
                                <th>Contact Phone</th>
                                <th>District</th>
                                <th>Sector</th>
                                <th>Cell</th>
                                <th>Village</th>
                                <th>LMP Date</th>
                                <th>ED Date</th>
                                <th>Days</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Establishing connection to the database
                            $conn = new mysqli('localhost', 'root', '', 'prenatal_db');

                            // Checking the connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
                            $sql1 = "SELECT registed_date,regNo,name,healthCenter,PhoneNumber,ContactNumber,district,sector,cell,village,lmpd,edd FROM pregnant";

                            $result1 = $conn->query($sql1);
                            if ($result1->num_rows > 0) {
                                while ($row1 = $result1->fetch_assoc()) {
                                    $lmp_date = $row1["lmpd"];
                                    $edd_date = $row1["edd"];
                                    $today_date = date("Y-m-d");
                                    $pregnancy_term = round((strtotime($today_date) - strtotime($lmp_date)) / (60 * 60 * 24));
                                    if ($pregnancy_term > 84 && $pregnancy_term <= 182) {
                                        echo "<tr><td>" . $row1['registed_date'] . "</td><td>" . $row1['regNo'] . "</td><td>" . $row1['name'] . "</td><td>" . $row1['healthCenter'] . "</td><td>" .
                                            $row1['PhoneNumber'] . "</td><td>" . $row1['ContactNumber'] . "</td><td>" . $row1['district'] . "</td><td>" .
                                            $row1['sector'] . "</td><td>" . $row1['cell'] . "</td><td>" . $row1['village'] . "</td><td>" .
                                            $lmp_date . "</td><td>" . $edd_date ."</td><td>" . $pregnancy_term. "</td></tr>";
                                    }
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Third term for pregnacy -->
    <div class="modal fade" id="threeMonthModal" tabindex="-1" role="dialog" aria-labelledby="oneMonthModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width:1260px; margin-left:-360px;">
            <div class="modal-header">
                <h5 class="modal-title text-success" id="oneMonthModalLabel">Pregnant Mothers - Term 3</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color:red; font-size:36px;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-primary table-striped" id="example1" width="100%">
                        <thead>
                            <tr>
                                <th>Registed Date</th>
                                <th>Patient ID</th>
                                <th>Patient Names</th>
                                <th>Health Center</th>
                                <th>Telephone</th>
                                <th>Contact Phone</th>
                                <th>District</th>
                                <th>Sector</th>
                                <th>Cell</th>
                                <th>Village</th>
                                <th>LMP Date</th>
                                <th>ED Date</th>
                                <th>Days</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Establishing connection to the database
                            $conn = new mysqli('localhost', 'root', '', 'prenatal_db');

                            // Checking the connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
                            $sql2 = "SELECT registed_date, regNo, name, healthCenter, PhoneNumber, ContactNumber, district, sector, cell, village, lmpd, edd FROM pregnant";
                            $result2 = $conn->query($sql2);
                            if ($result2->num_rows > 0) {
                                while ($row2 = $result2->fetch_assoc()) {
                                    $lmp_date = $row2["lmpd"];
                                    $edd_date = $row2["edd"];
                                    $today_date = date("Y-m-d");
                                    $pregnancy_term = round((strtotime($today_date) - strtotime($lmp_date)) / (60 * 60 * 24));
                                    if ($pregnancy_term >= 183) {
                                        echo "<tr><td>" . $row2['registed_date'] . "</td><td>" . $row2['regNo'] . "</td><td>" . $row2['name'] . "</td><td>" . $row2['healthCenter'] . "</td><td>" .
                                            $row2['PhoneNumber'] . "</td><td>" . $row2['ContactNumber'] . "</td><td>" . $row2['district'] . "</td><td>" .
                                            $row2['sector'] . "</td><td>" . $row2['cell'] . "</td><td>" . $row2['village'] . "</td><td>" .
                                            $lmp_date . "</td><td>" . $edd_date . "</td><td>" .$pregnancy_term. "</td></tr>";
                                    }
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content" style="width:1000px;">
          <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">Complications Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <table class="table table-striped">
                  <thead>
                      <tr>
                          <th>Patient ID</th>
                          <th>Name</th>
                          <th>Phone</th>
                          <th>Date</th>
                          <th>Exam Type</th>
                          <th>Complication</th>
                          <th>Additional Info</th>
                      </tr>
                  </thead>
                  <tbody id="data-container">
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


                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr><td>". $row['patientID']."</td><td>".
                            $row['name'] . "</td><td>". $row['phone'] ."</td><td>".
                             $row['date'] . "</td><td>". $row['exam_type'] . "</td><td>". $row['complication'].
                             "</td><td>". $row['additional_info'] . "</td></tr>";
                        }
                    }


                    $conn->close();
                    ?>

                  </tbody>
              </table>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
  </div>

    <?php
    include('includes/scripts.php');
    ?>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
          <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
          <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
          <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
          <script>
            new DataTable('#example');
            new DataTable('#exampleTerm');
            new DataTable('#example2');
            new DataTable('#example1');
            new DataTable('#exampleSms');
          </script>
  </body>
</html>
