<?php
include('includes/footer.php');
include('includes/header.php');
include('includes/navbar.php');

?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
        class="fas fa-plus fa-sm text-white-50"></i> Generate Reports</a>
  </div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
    <h2 class="mt-4">Preventive Measures
      <button type="button" class="btn btn-success float-end" data-toggle="modal" data-target="#preventiveModal">
        Add Preventive
      </button></h2>
    </div>
    <div class="card-body">
      <div class="table-responsive">
    <table class="table table-bordered table-striped" width="100%" cellspacing="0">
      <thead class="thead bg-info" style="height:20px;">
        <tr>
          <th class="vertical-text">No Contacts</th>
          <th class="vertical-text">Patient ID</th>
          <th class="vertical-text">(Iron+ Folic Acid)</br>Provision of </th>
          <th class="vertical-text">Metoclopramide<br>Provision of </th>
          <th class="vertical-text">vaccines<br>Tetanus and diptheria</th>
          <th class="vertical-text">Calcium</th>
          <th class="vertical-text">mosquito net<br>Provision of</th>
          <th class="vertical-text"> urinary infection<br>Treatment of</th>
          <th>RDV</th>
          <th class="vertical-text">health provider<br>Names of </th>
          <th class="vertical-text">Health Worker<br>Names of </th>
        </tr>
      </thead>
      <tbody>
        <?php
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prenatal_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

$sql = "SELECT numContacts, patientID, provision_iron_folic, provision_metoclopramide, tetanus_diptheria, calcium, mosquito_net, urinary_treatment,rdv, health_provider, health_worker FROM preventivecare ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>" . htmlspecialchars($value) . "</td>";
        }
        echo "</tr>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>

      </tbody>
    </table>
  </div>
</div>
</div>


  <div class="modal fade" id="preventiveModal" tabindex="-1" aria-labelledby="preventiveModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="preventiveModalLabel">Preventive Measures</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="">
      <div class="modal-body">
          <div class="row">
              <!-- Number of Contacts -->
              <div class="form-group col">
                  <label for="numContacts">Number of Contacts</label>
                  <select class="form-select" name="numContacts" id="contact">
                      <option value=""></option>
                      <?php for ($i = 1; $i <= 10; $i++) echo "<option value='$i'>$i</option>"; ?>
                  </select>
              </div>

              <!-- Patient ID -->
              <div class="form-group col">
                  <label for="patientID">Patient ID#</label>
                  <input type="number" class="form-control" id="patientID" name="patientID" placeholder="230001" required>
              </div>

              <!-- Provision of Iron + Folic Acid -->
              <div class="form-group col">
                  <label for="provisionIron">Provision of (Iron+ Folic Acid)</label>
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" id="ironFolicYes" name="ironFolic" value="Yes">
                      <label class="form-check-label" for="ironFolicYes">Yes</label>
                  </div>
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" id="ironFolicNo" name="ironFolic" value="No">
                      <label class="form-check-label" for="ironFolicNo">No</label>
                  </div>
              </div>

              <!-- Provision of Metoclopramide -->
              <div class="form-group col">
                  <label for="provisionMetoclopramide">Provision of Metoclopramide</label>
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" id="metoclopramideYes" name="metoclopramide" value="Yes">
                      <label class="form-check-label" for="metoclopramideYes">Yes</label>
                  </div>
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" id="metoclopramideNo" name="metoclopramide" value="No">
                      <label class="form-check-label" for="metoclopramideNo">No</label>
                  </div>
              </div>
          </div>

          <div class="row">
              <!-- Tetanus and Diptheria Vaccines -->
              <div class="form-group col">
                  <label for="tetanus">Tetanus and Diptheria vaccines</label>
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" id="tetanusYes" name="tetanus" value="Yes">
                      <label class="form-check-label" for="tetanusYes">Yes</label>
                  </div>
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" id="tetanusNo" name="tetanus" value="No">
                      <label class="form-check-label" for="tetanusNo">No</label>
                  </div>
              </div>

              <!-- Calcium -->
              <div class="form-group col">
                  <label for="calcium">Calcium Y/N</label><br>
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" id="calciumYes" name="calcium" value="Yes">
                      <label class="form-check-label" for="calciumYes">Yes</label>
                  </div>
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" id="calciumNo" name="calcium" value="No">
                      <label class="form-check-label" for="calciumNo">No</label>
                  </div>
              </div>

              <!-- Provision of Mosquito Net -->
              <div class="form-group col">
                  <label for="mosquitoNet">Provision of mosquitonet</label>
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" id="mosquitoNetYes" name="mosquitoNet" value="Yes">
                      <label class="form-check-label" for="mosquitoNetYes">Yes</label>
                  </div>
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" id="mosquitoNetNo" name="mosquitoNet" value="No">
                      <label class="form-check-label" for="mosquitoNetNo">No</label>
                  </div>
              </div>

              <!-- Treatment of Urinary Infection -->
              <div class="form-group col">
                  <label for="urinaryTreatment">Treatment of urinary infection</label>
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" id="urinaryTreatmentYes" name="urinaryTreatment" value="Yes">
                      <label class="form-check-label" for="urinaryTreatmentYes">Yes</label>
                  </div>
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" id="urinaryTreatmentNo" name="urinaryTreatment" value="No">
                      <label class="form-check-label" for="urinaryTreatmentNo">No</label>
                  </div>
              </div>
          </div>

          <div class="row">
              <!-- Health Provider -->
              <div class="form-group col">
                  <label for="healthProvider">Names of health provider</label>
                  <input type="text" class="form-control" id="healthProvider" name="healthProvider">
              </div>

              <!-- Health Worker -->
              <div class="form-group col">
                  <label for="signature">Names of Health Worker</label>
                  <input type="text" class="form-control" id="signature" name="signature" required>
              </div>
          </div>
      </div>

      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </div>
  </form>

</div>
</div>
</div>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
  // Database connection
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "prenatal_db";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  // Retrieve form data
  $numContacts = $_POST['numContacts'];
  $patientID = $_POST['patientID'];
  $provision_iron_folic = $_POST['ironFolic'];
  $provision_metoclopramide = $_POST['metoclopramide'];
  $tetanus_diptheria = $_POST['tetanus'];
  $calcium = $_POST['calcium'];
  $mosquito_net = $_POST['mosquitoNet'];
  $urinary_treatment = $_POST['urinaryTreatment'];
  $health_provider = $_POST['healthProvider'];
  $health_worker = $_POST['signature'];

  // Validate patientID against pregnant table
  $stmt = $conn->prepare("SELECT regNo, EDD FROM pregnant WHERE regNo = ?");
  $stmt->bind_param("i", $patientID);
  $stmt->execute();
  $stmt->bind_result($regNo, $rdv);
  $stmt->store_result();

  if ($stmt->num_rows > 0) {
      $stmt->fetch();

      $stmt->close();

      $stmt = $conn->prepare("INSERT INTO preventivecare (numContacts, patientID, provision_iron_folic, provision_metoclopramide, tetanus_diptheria, calcium, mosquito_net, urinary_treatment, rdv, health_provider, health_worker) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("iisssssssss", $numContacts, $patientID, $provision_iron_folic, $provision_metoclopramide, $tetanus_diptheria, $calcium, $mosquito_net, $urinary_treatment, $rdv, $health_provider, $health_worker);

      if ($stmt->execute()) {
          echo "<script>alert('New record created successfully');</script>";
      } else {
          echo "<script>alert('Error: " . $stmt->error . "');</script>";
      }
  } else {
      echo "<script>alert('Invalid patient ID.');</script>";
  }

  $stmt->close();
  $conn->close();
}
?>


   </div>
