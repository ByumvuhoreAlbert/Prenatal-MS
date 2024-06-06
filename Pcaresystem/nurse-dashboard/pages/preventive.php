<?php
include('includes/footer.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/connection.php');
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
          <th class="vertical-text">Date</th>
          <th class="vertical-text">Patient ID</th>
          <th class="vertical-text">Full Names</th>
          <th class="vertical-text">(Iron+ Folic Acid)</br>Provision of </th>
          <th class="vertical-text">Metoclopramide<br>Provision of </th>
          <th class="vertical-text">vaccines<br>Tetanus and diptheria</th>
          <th class="vertical-text">Calcium</th>
          <th class="vertical-text">mosquito net<br>Provision of</th>
          <th class="vertical-text"> urinary infection<br>Treatment of</th>
          <th class="vertical-text">RDV</th>
          <th class="vertical-text">health provider<br>Names of </th>
          <th class="vertical-text">Health Worker<br>Names of </th>
        </tr>
      </thead>
      <tbody>
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
    <form method="post" name="submit" autocomplete="off" action="">
      <div class="modal-body">
      <div class="row">
      <div class="form-group col">
        <label for="numContacts">Number of Contacts</label>
        <select class="form-select" name="numContacts" id="contact">
          <option value=""></option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
        </select>
      </div>
      <div class="form-group col">
        <label for="provisionIron">Patient ID#</label>
        <input type="number" class="form-control" id="patientID" name="patientID" placeholder="230001" required>
      </div>
      <div class="form-group col">
        <label for="provisionIron">Provision of (Iron+ Folic Acid)</label>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="ironFolic" name="ironFolic" value="Yes">
          <label class="form-check-label" for="inlineCheckbox1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="ironFolic" name="ironFolic" value="No">
          <label class="form-check-label" for="inlineCheckbox2">No</label>
        </div>
      </div>
      <div class="form-group col">
        <label for="provisionMetoclopramide">Provision of Metoclopramide</label>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="motoclopramide" name="motoclopramide" value="Yes">
          <label class="form-check-label" for="inlineCheckbox1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="motoclopramide" name="motoclopramide" value="No">
          <label class="form-check-label" for="inlineCheckbox2">No</label>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="form-group col">
        <label for="tetanus">Tetanus and diptheria vaccines</label>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="tetanus" name="tetanus" value="Yes">
          <label class="form-check-label" for="inlineCheckbox1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="tetanus" name="tetanus" value="No">
          <label class="form-check-label" for="inlineCheckbox2">No</label>
        </div>
      </div>
      <div class="form-group col">
        <label for="calcium">Calcium Y/N</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="calcium" name="calcium" value="Yes">
          <label class="form-check-label" for="inlineCheckbox1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="calcium" name="calcium" value="No">
          <label class="form-check-label" for="inlineCheckbox2">No</label>
        </div>
      </div>
      <div class="form-group col">
        <label for="mosquitoNet">Provision of mosquitonet</label>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="mosquitoNet" name="mosquitoNet" value="Yes">
          <label class="form-check-label" for="inlineCheckbox1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="mosquitoNet" name="mosquitoNet" value="No">
          <label class="form-check-label" for="inlineCheckbox2">No</label>
        </div>
      </div>
      <div class="form-group col">
        <label for="urinaryTreatment">Treatment of urinary infection</label>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="treatment" name="treatment" value="Yes">
          <label class="form-check-label" for="inlineCheckbox1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="treatment" name="treatment" value="No">
          <label class="form-check-label" for="inlineCheckbox2">No</label>
        </div>
      </div>
      </div>

      <div class="row">
        <div class="form-group col">
          <label for="healthProvider">Names of health provider</label>
          <input type="text" class="form-control" id="healthProvider" name="healthProvider">
        </div>
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

<?php
//error_reporting(0);
if(isset($_POST['submit']))
{
    $patientID = $_POST["patientID"];
    $numContacts = $_POST["numContacts"];
    $ironFolic = $_POST["ironFolic"];
    $motoclopramide = $_POST["motoclopramide"];
    $tetanus = $_POST["tetanus"];
    $calcium = $_POST["calcium"];
    $mosquitoNet = $_POST["mosquitoNet"];
    $treatment = $_POST["treatment"];
    $healthProvider = $_POST["healthProvider"];
    $signature = $_POST["signature"];

$query = mysqli_query($conn, "INSERT INTO preventivecare (patientID, numContacts, ironFolic, motoclopramide, tetanus, calcium, mosquitoNet, treatment, healthProvider, signature) VALUES ('$patientID', '$numContacts', '$ironFolic', '$motoclopramide', '$tetanus', '$calcium', '$mosquitoNet', '$treatment', '$healthProvider', '$signature')");

 if ($query) {
  // code...
echo "<script>alert('New record inserted successfully');</script>";
}
else
{
  echo "<script>alert('there in an error');</script>";
}
}
?>

</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

   </div>
