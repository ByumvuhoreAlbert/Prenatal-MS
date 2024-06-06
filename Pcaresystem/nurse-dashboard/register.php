<?php
include('includes/header.php');
include('includes/navbar.php');
include('registerScripts.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .button-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }
        .button-container button {
            margin-left: 10px;
        }
        .error {
            border: 2px solid red;
        }
    </style>
</head>
<body>
 <div class="container-fluid">
   <div class="card shadow mb-4">
     <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary" style="text-align:center;">CLIENT IDENTIFICATIONS INFORMATION FORM</h6>
       </div>
     </div>

     <form action="" method="POST" class="" onsubmit="return validateForm()">
       <div id="page1" class="page">
   <div class="card shadow mb-4">
     <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary"><center>PERSONAL INFORMATION</center></h6>
     </div>
       <div class="card-body">
          <fieldset>
            <div class="row">
              <div class="col">
                <label for="">HOSPITAL<span>*</span></label>
                <input type="text" class="form-control form-control-sm" name="hospital" id="hospital" required>
              </div>
              <div class="col">
                <label for="">HEALTH CENTER<span>*</span></label>
                <input type="text" class="form-control form-control-sm" name="health-center" id="health-center" required>
              </div>
              <div class="col">
                <label for="">HEALTH POST<span>*</span></label>
                <input type="text" class="form-control form-control-sm" name="health-post" id="health-post" required>
              </div>
            </div>
            <div class="row">
    <div class="col">
      <label>NAMES<span>*</span></label>
      <input type="text" class="form-control form-control-sm" placeholder="" name="name" id="name" required>
    </div>
    <div class="col">
  <label>DATE OF BIRTH AND AGE<span>*</span></label>
  <div class="input-group mb-3">
    <input type="date" class="form-control form-control-sm" name="dob" id="dob" required>
    <input type="number" class="form-control form-control-sm" placeholder="age" name="age" id="age" required readonly>
  </div>
</div>
<div class="col">
          <label>MARITUAL STATUS<span>*</span></label>
          <select class="form-select form-select-sm" name="maritalStatus" id="maritalStatus" required>
            <option selected>Choose maritual status</option>
            <option value="Single">Single</option>
            <option value="Married">Married</option>
            <option value="Devorced">Devorced</option>
            <option value="Others">Others</option>
          </select>
        </div>
      </div>

   <div class="row">
     <div class="col">
       <label for="">PARTNER'S NAMES<span>*</span></label>
       <input type="text" name="partnerName"  id="partnerName" class="form-control form-control-sm" required>
     </div>
     <div class="col">
       <label for="">AGE<span>*</span></label>
   <input type="number" class="form-control form-control-sm" name="partnerAge" id="partnerAge" required>
     </div>
     <div class="col">
       <label for="">EMPLOYMENT<span>*</span></label>
       <select name="employment" id="employment"  class="form-select form-select-sm" required>
         <option value="">Choose Here</option>
         <option value="Yes">Yes</option>
         <option value="No">No</option>
         <option value="Other">Other</option>
         <select>
     </div>
     <div class="col">
       <label for="">BLOOD GROUP<span>*</span></label>
       <select name="bloodGroup" id="bloodGroup" class="form-select form-select-sm" required>
         <option value="A">A</option>
         <option value="B">B</option>
         <option value="AB">AB</option>
         <option value="O">O</option>
       </select>
     </div>
   </div>
 </fieldset>
<hr class="divider">
<div class="button-container float-end">
  <button type="button" class="btn btn-primary" onclick="nextPage(1, 2)">Next</button>
</div>
</div>
</div>
</div>


<div id="page2" class="page" style="display:none;">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"><center>ADDRESS AND CONTACT INFORMATION</center></h6>
    </div>
  <div class="card-body">
 <fieldset>
   <legend style="color:#5B6E5E; text-decoration:underline;">CONTACT AND ADDRESS</legend>
   <div class="row">
     <div class="col">
       <label for="">PHONE NUMBER<span>*</span></label>
       <input type="tel" name="phoneNumber" id="phoneNumber"  class="form-control form-control-sm" required>
     </div>
     <div class="col">
       <label for="">CONTACT NO<span>*</span></label>
       <input type="tel" name="contactNumber" id="contactNumber"  class="form-control form-control-sm" required>
     </div>
     <div class="col">
       <label for="">EDUCATION<span>*</span></label>
       <input type="text" name="education" id="education" value="" class="form-control form-control-sm" required>
     </div>
     <div class="col">
     <label for="">UBUDEHE<span>*</span></label>
     <select class="form-select form-select-sm" name="ubudehe" id="ubudehe" required>
<option selected>CATEGORY</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
</select>
</div>
 <div class="col">
   <label for="">RELIGION<span>*</span></label>
   <input type="text" name="religion" id="religion" class="form-control form-control-sm" required>
 </div>
 <div class="col">
   <label for="">ACCOMPANIED BY<span>*</span></label>
   <select class="form-select form-select-sm" name="accompaniedBy" id="accompaniedBy" required>
   <option selected>HER PARTNER</option>
   <option value="Yes">YES</option>
   <option value="No">NO</option>
   <option value="Other">OTHER</option>
 </select>
 </div>
   </div>
   <div class="row">
     <div class="col">
     <label>PROVINCE<span>*</span></label>
     <select name="province" class="form-select form-control-sm" id="provinceSelect" onchange="populateDistricts()"  required>
      <option value="">Province</option>
     </select>
   </div>
 <div class="col">
   <label for="">DISTRICT<span>*</span></label>
   <select class="form-select form-control-sm" name="district" id="districtSelect" onchange="populateSectors()" required>
    <option value="">District</option>
   </select>
 </div>
  <div class="col">
   <label for="">SECTOR<span>*</span></label>
   <select class="form-select form-control-sm" name="sector" id="sectorSelect" onchange="populateCells()" required>
    <option value="">Sector</option>
   </select>
  </div>
 <div class="col">
   <label for="">CELL<span>*</span></label>
   <select class="form-select form-control-sm" name="cell" id="cellSelect" onchange="populateVillages()" required>
       <option value="">Cell</option>
     </select>
  <!-- <input type="text" class="form-control form-control-xl" name="cell" id="cell" placeholder="Cell"> -->
 </div>
 <div class="col">
   <label for="">VILLAGE<span>*</span></label>
   <select id="villageSelect" class="form-select form-select-sm" name="village" required>
     <option value="">Village</option>
   </select>
 </div>
</div>
 </fieldset>
<hr class="divider">
<div class="button-container float-end">
  <button type="button" class="btn btn-secondary" onclick="prevPage(2, 1)">Previous</button>
    <button type="button" class="btn btn-primary" onclick="nextPage(2, 3)">Next</button>
    </div>
  </div>
</div>
</div>

<!-- Page 3 -->
  <div id="page3" class="page" style="display:none;">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><center>HISTORICAL PREGNANCY CONSIDERATION INFORMATION</center></h6>
      </div>
    <div class="card-body">
 <fieldset>
   <div class="row">
     <div class="col">
  <label for="gravida">Gravida(G):<span>*</span></label>
  <select name="gravida" id="gravida" class="form-select form-select-sm" required>
    <option value=""></option>
    <option value="G1">G1</option>
    <option value="G2">G2</option>
    <option value="G3">G3</option>
    <option value="G4">G4</option>
    <option value="G5">G5</option>
    <option value="G6">G6</option>
    <option value="G7">G7</option>
    <option value="G8">G8</option>
    <option value="G9">G9</option>
    <option value="G10">G10</option>
  </select>
</div>
<div class="col to-hide">
  <label for="termDeliveries">Term Deliveries<span>*</span></label>
  <select name="termDeliveries" id="termDeliveries" class="form-select form-select-sm" required>
    <option value="">Select</option>
    <option value="Early Term">Early Term (37-38 +6 days)</option>
    <option value="Full Term">Full Term (39-40 wks +6 days)</option>
    <option value="Late Term">Late Term (41 wks +6 days)</option>
    <option value="Post Term">Post Term (42 wks)</option>
  </select>
</div>
<div class="col to-hide">
  <label for="prematureDeliveries">Premature Deliveries<span>*</span></label>
  <select name="prematureDeliveries" id="prematureDeliveries" class="form-select form-select-sm" required>
    <option value="">Choose Here</option>
    <option value="Yes">Yes</option>
    <option value="No">No</option>
  </select>
</div>
<div class="col to-hide">
  <label for="numAbortions">Number of Abortions<span>*</span></label>
  <select name="numAbortions" id="numAbortions" class="form-select form-select-sm" required>
    <option value="">No</option>
    <option value="Para1">Para1</option>
    <option value="Para2">Para2</option>
    <option value="Para3">Para3</option>
    <option value="Para4">Para4</option>
    <option value="Para5">Para5</option>
    <option value="Para6">Para6</option>
  </select>
</div>
</div>
<div class="row">
  <div class="col to-hide">
    <label for="parity">Parity with alive births<span>*</span></label>
    <input type="number" name="parity" id="parity" class="form-control form-control-sm" required>
  </div>
<div class="col to-hide">
  <label for="ageLastBorn">Age of last born<span>*</span></label>
  <input type="number" name="ageLastBorn" id="ageLastBorn" class="form-control form-control-sm" required>
</div>
<div class="col to-hide">
  <label for="aliveChildren">Alive Children<span>*</span></label>
  <input type="text" name="aliveChildren" id="aliveChildren" class="form-control form-control-sm" required>
</div>

     <div class="col">
       <label for="">LMP<span>*</span></label>
   <input type="date" name="lmpd" id="lmpd" class="form-control form-control-sm" required>
     </div>
     <div class="col">
       <label for="">EDD<span>*</span></label>
   <input type="date" name="edd" id="edd" class="form-control form-control-sm" required onclick="calculateEDD()">

     </div>
   </div>
</fieldset>
<hr class="divider">
<div class="button-container float-end">
  <button type="button" class="btn btn-secondary" onclick="prevPage(3, 2)">Previous</button>
    <button type="submit" class="btn btn-success" name="send">Register</button>
    </div>
</div>
 </div>
</div>
      </form>
      <script src="js/address.js"></script>
    </div>
    </div>

      <script>
        function nextPage(currentPage, nextPage) {
            if (validatePage(currentPage)) {
                document.getElementById('page' + currentPage).style.display = 'none';
                document.getElementById('page' + nextPage).style.display = 'block';
            }
        }
        function prevPage(currentPage, prevPage) {
            document.getElementById('page' + currentPage).style.display = 'none';
            document.getElementById('page' + prevPage).style.display = 'block';
        }

        function validateForm() {
            return validatePage(1) && validatePage(2) && validatePage(3);
        }
        function validatePage(pageNumber) {
            let isValid = true;
            const page = document.getElementById('page' + pageNumber);
            const inputs = page.querySelectorAll('input, select');

            inputs.forEach(input => {
                if (!input.checkValidity()) {
                    input.classList.add('error');
                    isValid = false;
                } else {
                    input.classList.remove('error');
                }
            });

            return isValid;
        }


        document.querySelectorAll('input[type="text"]').forEach(input => {
            input.addEventListener('input', () => {
                input.value = input.value.replace(/[0-9]/g, '');
            });
        });
document.querySelectorAll('input[type="tel"]').forEach(input => {
  input.value = '+250';
    input.addEventListener('input', () => {
        let sanitizedValue = input.value.replace(/\D/g, '');
        sanitizedValue = sanitizedValue.slice(0, 12);
        if (!sanitizedValue.startsWith('250')) {
            sanitizedValue = '250' + sanitizedValue;
        }
        input.value = '+' + sanitizedValue;
        if (sanitizedValue.length !== 12) {
            input.classList.add('error');
        } else {
            input.classList.remove('error');
        }
    });
});
    </script>

    <script>
      function calculateEDD() {
        var lmpDateInput = document.getElementById('lmpd');
    var lmpDateValue = lmpDateInput.value;
    var lmpDate = new Date(lmpDateValue);
    var eddTime = lmpDate.getTime() + (280 * 24 * 60 * 60 * 1000);
    var eddDate = new Date(eddTime);
    var formattedEDD = eddDate.toISOString().slice(0, 10);
    var eddInput = document.getElementById('edd');
    eddInput.value = formattedEDD;
      }


    document.addEventListener('DOMContentLoaded', function () {
      const gravidaSelect = document.getElementById('gravida');
      const fieldsToHide = document.querySelectorAll('.to-hide');

      gravidaSelect.addEventListener('change', function () {
        if (this.value === 'G1') {
          fieldsToHide.forEach(field => {
            field.style.display = 'none';
            field.querySelectorAll('input, select').forEach(input => {
              input.disabled = true;
            });
          });
        } else {
          fieldsToHide.forEach(field => {
            field.style.display = '';
            field.querySelectorAll('input, select').forEach(input => {
              input.disabled = false;
            });
          });
        }
      });

      // Trigger change event on page load to handle default state
      gravidaSelect.dispatchEvent(new Event('change'));
    });

    document.addEventListener('DOMContentLoaded', function () {
  const dobInput = document.getElementById('dob');
  const ageInput = document.getElementById('age');

  dobInput.addEventListener('change', function () {
    const dob = new Date(this.value);
    if (!isNaN(dob)) {
      const age = calculateAge(dob);
      ageInput.value = age;
    } else {
      ageInput.value = '';
    }
  });

  function calculateAge(dob) {
    const today = new Date();
    let age = today.getFullYear() - dob.getFullYear();
    const monthDiff = today.getMonth() - dob.getMonth();
    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
      age--;
    }
    return age;
  }
});
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>


</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
