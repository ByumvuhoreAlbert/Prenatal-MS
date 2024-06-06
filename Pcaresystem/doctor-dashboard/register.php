<?php
include('includes/header.php');
include('includes/navbar.php');
?>

 <div class="container-fluid">
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="index.php" class="d-none d-sm-inline-block btn btn-xxl btn-warning shadow-sm"><i
        class="fas fa-home fa-sm text-white-50"></i> Go Back</a>
  </div>
 </div>
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="model-control" role="document">
    <div class="modal-content" style="background-image:url('img/images1.jpeg'); background-repeat:no-repeat; background-size:cover;">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel" style="color: #4e73df;">Registration Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">

        <div class="modal-body">
          <fieldset class="first-fieldset">
            <legend>Mother Information </legend>
            <div class="row">
    <div class="col">
      <label>First Name</label>
      <input type="text" class="form-control form-control-sm" placeholder="Enter email" name="fname">
    </div>
    <div class="col">
      <label>Last Name</label>
      <input type="text" class="form-control form-control-sm" placeholder="Enter password" name="lname">
    </div>
      <div class="col">
          <label>National Id</label>
          <input type="number" name="nationID" class="form-control form-control-sm" placeholder="Enter Mother's ID">
      </div>
      <div class="col">
          <label>Telephone</label>
          <input type="number" name="phone" class="form-control form-control-sm" placeholder="Enter Mother's ID">
      </div>
    </div>
 </fieldset>
 <hr>
 <fieldset class="first-fieldset">
   <legend>Guardian Information </legend>
   <div class="row">
<div class="col">
<label>First Name</label>
<input type="text" class="form-control form-control-sm" placeholder="Enter email" name="gfname">
</div>
<div class="col">
<label>Last Name</label>
<input type="text" class="form-control form-control-sm" placeholder="Enter password" name="glname">
</div>
<div class="col">
 <label>National Id</label>
 <input type="number" name="gnationID" class="form-control form-control-sm" placeholder="Enter Mother's ID">
</div>
<div class="col">
 <label>Telephone</label>
 <input type="tel" name="phone" class="form-control form-control-sm" placeholder="Enter Mother's ID">
</div>
<div class="col">
 <label>Sex</label>
 <select class="form-control form-control-sm" name="sex">
   <option value="">Select Sex</option>
   <option value="Male">Male</option>
   <option value="Female">Female</option>
 </select>
</div>
</div>
</fieldset>
<hr>
 <fieldset class="second-fieldset">
   <legend>Address</legend>
   <div class="row">
     <div class="col">
     <label>Province</label>
     <select name="province" class="form-select form-control-sm" id="firstSelect" onchange="populateSecondSelect()">
      <option value="">Province</option>  
     <option value="Eastern">Eastern</option>
       <option value="Kigali">Kigali</option>
       <option value="Northern">Northern</option>
       <option value="Southern">Southern</option>
       <option value="Western">Western</option>
       <option value=""></option>
     </select>
   </div>
 <div class="col">
   <label for="">District</label>
   <select class="form-select form-control-sm" name="district" id="secondSelect" onchange="populateThirdSelect()">
    <option value="">District</option>
   </select>
 </div>
  <div class="col">
   <label for="">Sector </label>
   <select class="form-select form-control-sm" name="sector" id="thirdSelect">
    <option value="">sector</option>
   </select>
  </div>
 <div class="col">
   <label for="">Cell</label>
   <input type="text" class="form-control form-control-xl" name="cell" placeholder="Cell">
 </div>
 <div class="col">
   <label for="">Village</label>
   <input type="text" class="form-control form-control-m" name="village" placeholder="Village">
 </div>
 <div class="col">
   <label for="">HealthCare Center</label>
   <input type="text" class="form-control form-control-m" name="healthcare" placeholder="Near HealthCare Center">
 </div>
</div>
 </fieldset>
 </div>
        <div class="modal-footer">
            <button type="submit" name="registerbtn" class="btn btn-primary" data-target="#snext">Save & Next</button>
           <button type="button" class="btn btn-secondary" data-clear="modal">Clear</button>
        </div>
        
      </form>
</div>
    </div>
  </div>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Pregnant Infor
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Register New Pregnant
            </button>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Username </th>
            <th>Email </th>
            <th>Password</th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>

          <tr>
            <td> 1 </td>
            <td> Funda of WEb IT</td>
            <td> funda@example.com</td>
            <td> *** </td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="edit_id" value="">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="" method="post">
                  <input type="hidden" name="delete_id" value="">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
          </tr>

        </tbody>
      </table>

    </div>
  </div>
</div>
<!--  js for address locations  -->
<script type="text/javascript" src="js/address.js"></script>
</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
