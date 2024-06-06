<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patient Appointment</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    label {
      color: #4CE46A;
    }
    input:focus,
   select:focus,
   textarea:focus {
     outline: none;
   }
  </style>
</head>
<body>
<div class="modal fade" id="appointmentModal" tabindex="-1" role="dialog" aria-labelledby="appointmentModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="appointmentModalLabel">Schedule Appointment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="appointmentForm">
        <div class="row">
          <div class="col">
            <div class="form-group">
                <label for="patientID">Patient ID</label>
                <input type="text" class="form-control" name="patientID" id="patientID" required>
              </div>
              </div>
              <div class="col">
                <div class="form-group">
              <label for="doctorName">Doctor Name</label>
              <input type="text" class="form-control" name="doctorName" id="doctorName" required>
            </div>
          </div>
            </div>
              <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="doctorType">Doctor Of</label>
                <select class="form-select" id="doctorType" name="doctorType" required>
                  <option value=""></option>
                  <option value="Obstetricians">Obstetricians</option>
                  <option value="Midwives">Midwives</option>
                  <option value="Maternal-fetal medicine specialists">Maternal-fetal medicine specialists</option>
                  <option value="Neonatologists">Neonatologists</option>
                  <option value="Labor and delivery nurses">Labor and delivery nurses</option>
                  <option value="Postpartum nurses">Postpartum nurses</option>
                  <!-- Add more options as needed -->
                </select>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="appointmentDate">Appointment Date</label>
                <input type="datetime-local" name="datetime" class="form-control form-control-datetime-local" id="appointmentDate" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                    <label for="reason">Reason for Appointment</label>
                    <textarea class="form-control" name="reason" id="reason" rows="3" required></textarea>
                  </div>
            </div>
          </div>
          <div class="clearfix">
          <button type="submit" class="btn btn-success float-right" style="margin:0px 30px 0px 30px;" name="scheduler">Schedule</button>
            <button type="button" class="btn btn-warning float-right" onclick="clearForm()">Clear</button>
          </div>
          </form>
          </div>
        </div>
      </div>
    </div>
    <?php
    $conn = new mysqli('localhost', 'root', '', 'prenatal_db');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['scheduler'])){
      $patientID = $_POST['patientID'];
      $doctorName = $_POST['doctorName'];
      $doctorType = $_POST['doctorType'];
      $datetime = $_POST['datetime'];
      $reason = $_POST['reason'];

      $sql = "SELECT * FROM pregnant WHERE regNo = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $patientID);
      $stmt->execute();
      $result = $stmt->get_result();

      if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
          $fname = $row['name'];
          $phone = $row['PhoneNumber'];
          $contact = $row['ContactNumber'];
        }

        $stmt->close();

        $sql = "INSERT INTO Appointments (PatientID,	FullNames,	Telephone,	Contact,	doctorNames,	Specialists,	AppointDateTime, ReasonForAppointment)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $query = $conn->prepare($sql);
        $query->bind_param("isssssss", $patientID, $fname, $phone, $contact, $doctorName, $doctorType, $datetime, $reason);

        if ($query->execute()) {
          echo "<script>alert('Appointment scheduled successfully!');</script>";
        } else {
          echo "<script>alert('Error: " . $query->error ."');</script>";
        }
        $query->close();
      } else {
        echo "<script>alert('Patient ID provided not found!');</script>";
      }
      $conn->close();
    }
    ?>


<!-- JavaScript to handle form submission -->
<script>
  function clearForm() {
    document.getElementById("appointmentForm").reset();
  }

        /*
          document.getElementById("appointmentForm").addEventListener("submit", function(event){
            event.preventDefault(); // Prevent default form submission
            // Here you can handle the form submission using JavaScript or send it to a server using AJAX
            alert("Appointment scheduled successfully!");
            $('#appointmentModal').modal('hide'); // Hide the modal after submission
          });

          function clearForm() {
            document.getElementById("appointmentForm").reset();
          }*/
</script>

</body>
</html>
