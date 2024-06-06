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
    <h2 class="mt-4">Health Education
      <button type="button" class="btn btn-success float-end" data-toggle="modal" data-target="#preventiveModal">
        Add Health Education
      </button></h2>
    </div>
    <div class="card-body">
      <div class="table-responsive">
    <table class="table table-bordered table-striped" width="100%" cellspacing="0">
      <thead class="thead bg-info" style="height:20px;">
        <tr>
          <th class="vertical-text">Number of Contacts</th>
          <th class="vertical-text">Family Planning</th>
          <th class="vertical-text">Family Planning</br>Post Partum</th>
          <th class="vertical-text">Malaria Prevention</th>
          <th class="vertical-text">HIV Prevention </th>
          <th class="vertical-text">Nutrition</th>
          <th class="vertical-text">Hygiene</th>
          <th class="vertical-text">Cafeine Prevention</th>
          <th class="vertical-text">provider<br>prescribed by<br>medicine not <br>Alcohol and<br>To avoid tobacco,</th>
          <th class="vertical-text">violence<br>Avoid domestic</th>
          <th class="vertical-text">Mental Health</th>
          <th class="vertical-text">Danger signs</th>
          <th class="vertical-text">Complications<br>Pregnancy</th>
          <th class="vertical-text">ANC Calendar</th>
          <th class="vertical-text">Preparedness<br>Birth</th>
        </tr>
      </thead>
      <tbody>
      </tbody>

    </table>
  </div>
</div>
</div>
  
  <form>
                              <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-4">

                                       <input class="btn btn-primary" type="submit" value="Print" name="" onclick="window.print()">

                                   </div>
                               </div>
                              </form>
                              

  <div class="modal fade" id="preventiveModal" tabindex="-1" aria-labelledby="preventiveModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="preventiveModalLabel">Health Education</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
    <form method="post" action="">
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
        <label for="provisionIron">Family Planning</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="Planning" name="Planning" value="Yes">
          <label class="form-check-label" for="inlineCheckbox1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="Planning" name="Planning" value="No">
          <label class="form-check-label" for="inlineCheckbox2">No</label>
        </div>
      </div>
      <div class="form-group col">
        <label for="provisionMetoclopramide">Family Planning Post Partum</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="Family" name="Family" value="Yes">
          <label class="form-check-label" for="inlineCheckbox1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="Family" name="Family" value="No">
          <label class="form-check-label" for="inlineCheckbox2">No</label>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="form-group col">
        <label for="tetanus">Malaria Prevention</label> <br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="Malaria" name="Malaria" value="Yes">
          <label class="form-check-label" for="inlineCheckbox1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="Malaria" name="Malaria" value="No">
          <label class="form-check-label" for="inlineCheckbox2">No</label>
        </div>
      </div>
      <div class="form-group col">
        <label for="calcium">HIV Prevention</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="HIV" name="HIV" value="Yes">
          <label class="form-check-label" for="inlineCheckbox1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="HIV" name="HIV" value="No">
          <label class="form-check-label" for="inlineCheckbox2">No</label>
        </div>
      </div>
      <div class="form-group col">
        <label for="mosquitoNet">Nutrition</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="Nutrition" name="Nutrition" value="Yes">
          <label class="form-check-label" for="inlineCheckbox1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="Nutrition" name="Nutrition" value="No">
          <label class="form-check-label" for="inlineCheckbox2">No</label>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="form-group col">
        <label for="urinaryTreatment">Hygiene</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="Hygiene" name="Hygiene" value="Yes">
          <label class="form-check-label" for="inlineCheckbox1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="Hygiene" name="Hygiene" value="No">
          <label class="form-check-label" for="inlineCheckbox2">No</label>
        </div>
      </div>
      <div class="form-group col">
        <label for="urinaryTreatment">Cafeine Prevention</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="Cafeine" name="Cafeine" value="Yes">
          <label class="form-check-label" for="inlineCheckbox1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="Cafeine" name="Cafeine" value="No">
          <label class="form-check-label" for="inlineCheckbox2">No</label>
        </div>
      </div>
      <div class="form-group col">
        <label for="urinaryTreatment">To avoid tobacco, Alcohol and medicine not prescribed by provider</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="Avoid" name="Avoid" value="Yes">
          <label class="form-check-label" for="inlineCheckbox1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="Avoid" name="Avoid" value="No">
          <label class="form-check-label" for="inlineCheckbox2">No</label>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="form-group col">
        <label for="urinaryTreatment">Avoid Domestic Violence</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="Violence" name="Violence" value="Yes">
          <label class="form-check-label" for="inlineCheckbox1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="Violence" name="Violence" value="No">
          <label class="form-check-label" for="inlineCheckbox2">No</label>
        </div>
      </div>
      <div class="form-group col">
        <label for="urinaryTreatment">Mental Health</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="Mental" name="Mental" value="Yes">
          <label class="form-check-label" for="inlineCheckbox1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="Mental" name="Mental" value="No">
          <label class="form-check-label" for="inlineCheckbox2">No</label>
        </div>
      </div>
       <div class="form-group col">
        <label for="urinaryTreatment">Danger Signs</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="Danger" name="Danger" value="Yes">
          <label class="form-check-label" for="inlineCheckbox1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="Danger" name="Danger" value="No">
          <label class="form-check-label" for="inlineCheckbox2">No</label>
        </div>
      </div>
      </div>  

    <div class="row">
        <div class="form-group col">
        <label for="urinaryTreatment">Pregnancy Complications</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="Pregnancy" name="Pregnancy" value="Yes">
          <label class="form-check-label" for="inlineCheckbox1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="Pregnancy" name="Pregnancy" value="No">
          <label class="form-check-label" for="inlineCheckbox2">No</label>
        </div>
      </div>
       <div class="form-group col">
        <label for="urinaryTreatment">ANC Calendar</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="ANC" name="ANC" value="Yes">
          <label class="form-check-label" for="inlineCheckbox1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="ANC" name="ANC" value="No">
          <label class="form-check-label" for="inlineCheckbox2">No</label>
        </div>
      </div>

      <div class="form-group col">
        <label for="urinaryTreatment">Birth Preparedness</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="Birth" name="Birth" value="Yes">
          <label class="form-check-label" for="inlineCheckbox1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="Birth" name="Birth" value="No">
          <label class="form-check-label" for="inlineCheckbox2">No</label>
        </div>
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
    $numContacts = $_POST["numContacts"];
    $Planning = $_POST["Planning"];
    $Family = $_POST["Family"];
    $Malaria = $_POST["Malaria"];
    $HIV = $_POST["HIV"];
    $Nutrition = $_POST["Nutrition"];
    $Hygiene = $_POST["Hygiene"];
    $Cafeine = $_POST["Cafeine"];
    $Avoid = $_POST["Avoid"];
    $Violence = $_POST["Violence"];
    $Mental = $_POST["Mental"];
    $Danger = $_POST["Danger"];
    $Pregnancy = $_POST["Pregnancy"];
    $ANC = $_POST["ANC"];
    $Birth = $_POST["Birth"];

$query = mysqli_query($conn, "INSERT INTO healthcare (numContacts, Planning, Family, Malaria, HIV, Nutrition, Hygiene, Cafeine, Avoid, Violence, Mental, Danger, Pregnancy, ANC, Birth) VALUES ('$numContacts', '$Planning', '$Family', '$Malaria', '$HIV', '$Nutrition', '$Hygiene', '$Cafeine', '$Avoid', '$Violence', '$Mental', '$Danger', '$Pregnancy', '$ANC','$Birth')");

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
   </div>

