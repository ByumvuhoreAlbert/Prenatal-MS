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
    
    <div class="card-body">
      <div class="table-responsive">
    <form method="post" action="">
      <div class="modal-body">

      <div class="row">
        <div class="form-group col">
        <label for="urinaryTreatment"><b>1. Follow Up Place:</b></label><br>
        <div class="form-check form-check-inline">
          <label class="form-check-label">At Health Post</label> 
          <input class="form-check-input" type="checkbox" id="health" name="health" value="health">
        </div>
        <div class="form-check form-check-inline">
          <label class="form-check-label">At Health Center</label> 
          <input class="form-check-input" type="checkbox" id="health" name="health" value="health">
        </div>
        <div class="form-check form-check-inline">
          <label class="form-check-label">At Hospital</label> 
          <input class="form-check-input" type="checkbox" id="health" name="health" value="health">
        </div>
          <div class="form-check form-check-inline">
          <label class="form-check-label">Reason</label> 
          <input type="text" class="form-control" id="reason" name="reason" required>
        </div>

      </div>
    </div>

    <div class="row">
        <div class="form-group col">
        <label for="urinaryTreatment"><b>2. Place Of Birth:</b></label><br>
        <div class="form-check form-check-inline">
          <label class="form-check-label">At Health Post</label> 
          <input class="form-check-input" type="checkbox" id="health2" name="health2" value="health2">
        </div>
        <div class="form-check form-check-inline">
          <label class="form-check-label">At Health Center</label> 
          <input class="form-check-input" type="checkbox" id="health2" name="health2" value="health2">
        </div>
        <div class="form-check form-check-inline">
          <label class="form-check-label">At Hospital</label> 
          <input class="form-check-input" type="checkbox" id="health2" name="health2" value="health2">
          </div>
          <div class="form-check form-check-inline">
          <label class="form-check-label">Reason</label> 
          <input type="text" class="form-control" id="reason2" name="reason2" required>
        </div>

      </div>
    </div>

    <div class="row">
        <div class="form-group col">
        <label for="urinaryTreatment">PPFP Counselling</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="counsel" name="counsel" value="Yes">
          <label class="form-check-label" for="inlineCheckbox1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="counsel" name="counsel" value="No">
          <label class="form-check-label" for="inlineCheckbox2">No</label>
        </div>

        <div class="form-check form-check-inline">
          <label class="form-check-label">If yes write method selected by client</label> 
          <input type="text" class="form-control" id="method" name="method">
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
    $health = $_POST["health"];
    $reason = $_POST["reason"];
    $health2 = $_POST["health2"];
    $reason2 = $_POST["reason2"];
    $counsel = $_POST["counsel"];
    $method = $_POST["method"];

$query = mysqli_query($conn, "INSERT INTO conclusion (health, reason, health2, reason2, counsel, method) VALUES ('$health', '$reason', '$health2', '$reason2', '$counsel', '$method')");

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

</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <?php
  include_once "includes/connection.php";
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    // code...
  }
   ?>
   </div>