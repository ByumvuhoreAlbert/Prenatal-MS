<?php
include "phpscripts/laboratoryScripts.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Medical Forms</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .container-fluid {
      margin-top: 50px;
    }
    .warning {
      color: red;
    }
    .invalid {
      border-color: #DC9180;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="container">
      <div class="form-group">
        <form class="form" action="index.html" method="post">
        <a href="index.php"><button type="button" name="button" class="btn text-info" style="border:none; outline:none">Go Back</button></a>
        <a href="allLaboratory.php">  <button type="button" name="button" class="btn float-end text-success" style="border:none; outline:none">View All</button></a>
        </form>
      </div>
    </div>
    <div class="card shadow mb-4">
      <div class="container">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary" style="text-align:center;">LABORATORY EXAMS</h6>
        </div>
        <form id="labForm" method="POST">
    <!-- Page 1 -->
    <div class="page" id="page1" style="display:block;">
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <label for="patientID" class="form-label">Patient ID#</label>
                    <input type="text" class="form-control form-control-sm" name="patientID" id="patientID" required>
                </div>
                <div class="col">
                    <label for="contact" class="form-label">Contact</label>
                    <select class="form-select form-select-sm" name="contact" id="contact" required>
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
                <div class="col">
                    <label for="testDate" class="form-label">Date</label>
                    <input type="date" class="form-control form-control-sm" name="testDate" id="testDate" required>
                </div>
                <div class="col">
                    <label for="glucosuria" class="form-label">Glucosuria (Ex: 180 mg/dL)</label>
                    <input type="text" class="form-control form-control-sm" name="glucosuria" id="glucosuria" required>
                </div>
                <div class="col">
                    <label for="proteinuria" class="form-label">Proteinuria</label>
                    <select class="form-select form-select-sm" name="proteinuria" id="proteinuria" required>
                        <option value=""></option>
                        <option value="Negative">Negative</option>
                        <option value="Positive">Positive</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <legend class="text text-align-center text-warning" style="padding:20px; text-align:center;">Urinalysis (ECBU)</legend>
                <div class="col">
                    <label for="appearance" class="form-label">Appearance (Color)</label>
                    <select class="form-select form-select-sm" name="appearance" id="appearance" required>
                        <option value=""></option>
                        <option value="Clear">Clear</option>
                        <option value="Pale Yellow to Amber">Pale Yellow to Amber</option>
                        <option value="Dark Yellow">Dark Yellow</option>
                        <option value="Amber">Amber</option>
                        <option value="Red or Pink">Red or Pink</option>
                        <option value="Brown">Brown</option>
                        <option value="Orange">Orange</option>
                        <option value="Cloudy or Turbid">Cloudy or Turbid</option>
                        <option value="Milky">Milky</option>
                        <option value="Foamy or Frothy">Foamy or Frothy</option>
                    </select>
                </div>
                <div class="col">
                    <label for="ph" class="form-label">pH (Ex: 6.0)</label>
                    <input type="text" class="form-control form-control-sm" name="ph" id="ph" required>
                </div>
                <div class="col">
                    <label for="protein" class="form-label">Protein</label>
                    <select class="form-select form-select-sm" name="protein" id="protein" required>
                        <option value=""></option>
                        <option value="Negative">Negative</option>
                        <option value="Positive">Positive</option>
                    </select>
                </div>
                <div class="col">
                    <label for="glucose" class="form-label">Glucose</label>
                    <select class="form-select form-select-sm" name="glucose" id="glucose" required>
                        <option value=""></option>
                        <option value="Negative">Negative</option>
                        <option value="Positive">Positive</option>
                    </select>
                </div>
                <div class="col">
                    <label for="ketones" class="form-label">Ketones</label>
                    <select class="form-select form-select-sm" name="ketones" id="ketones" required>
                        <option value=""></option>
                        <option value="Negative">Negative</option>
                        <option value="Positive">Positive</option>
                    </select>
                </div>
                <div class="col">
                    <label for="leukocytes" class="form-label">Leukocytes (10/µL)</label>
                    <input type="text" class="form-control form-control-sm" name="leukocytes" id="leukocytes" required>
                </div>
            </div>
            <div class="modal-footer" style="padding: 30px;">
                <button type="button" class="btn btn-success" id="sendNext">Continue</button>
            </div>
        </div>
    </div>

    <!-- Page 2 -->
    <div class="page" id="page2" style="display:none;">
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <label for="wbc" class="form-label">WBC (Ex: 8.2x10^9/L)</label>
                    <input type="text" class="form-control form-control-sm" name="wbc" id="wbc" required>
                </div>
                <div class="col">
                    <label for="rbc" class="form-label">RBC (Ex: 4.5x10^12/L)</label>
                    <input type="text" class="form-control form-control-sm" name="rbc" id="rbc" required>
                </div>
                <div class="col">
                    <label for="hb" class="form-label">Hb (Ex: 12.5g/dL)</label>
                    <input type="text" class="form-control form-control-sm" name="hb" id="hb" required>
                </div>
                <div class="col">
                    <label for="plt" class="form-label">Plt (Ex: 250x10^9/L)</label>
                    <input type="text" class="form-control form-control-sm" name="plt" id="plt" required>
                </div>
                <div class="col">
                    <label for="rpr" class="form-label">RPR N/P</label>
                    <select class="form-select form-select-sm" name="rpr" id="rpr" required>
                        <option value=""></option>
                        <option value="Non-Reactive (Negative)">Non-Reactive (Negative)</option>
                        <option value="Reactive (Positive)">Reactive (Positive)</option>
                        <option value="Weakly Reactive">Weakly Reactive</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="hiv" class="form-label">HIV N/P</label>
                    <select class="form-select form-select-sm" name="hiv" id="hiv" required>
                        <option value=""></option>
                        <option value="Positive">Positive</option>
                        <option value="Negative">Negative</option>
                    </select>
                </div>
                <div class="col">
                    <label for="malaria" class="form-label">Malaria N/P</label>
                    <select class="form-select form-select-sm" name="malaria" id="malaria" required>
                        <option value=""></option>
                        <option value="Positive">Positive</option>
                        <option value="Negative">Negative</option>
                    </select>
                </div>
                <div class="col">
                    <label for="hepatiteB" class="form-label">Hepatite B N/P</label>
                    <select class="form-select form-select-sm" name="hepatiteB" id="hepatiteB" required>
                        <option value=""></option>
                        <option value="Positive">Positive</option>
                        <option value="Negative">Negative</option>
                    </select>
                </div>
                <div class="col">
                    <label for="hepatiteC" class="form-label">Hepatite C N/P</label>
                    <select class="form-select form-select-sm" name="hepatiteC" id="hepatiteC" required>
                        <option value=""></option>
                        <option value="Positive">Positive</option>
                        <option value="Negative">Negative</option>
                    </select>
                </div>
                <div class="col">
                    <label for="glycemia" class="form-label">Glycemia (Ex: 90mg/dL)</label>
                    <input type="text" class="form-control form-control-sm" name="glycemia" id="glycemia" required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="additionalComments" class="form-label">Additional Comments</label>
                    <textarea class="form-control" name="additionalComments" id="additionalComments"></textarea>
                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end" style="padding: 30px;">
            <button type="button" class="btn btn-warning" id="previous">Previous</button>&nbsp;&nbsp;&nbsp;
            <button type="submit" class="btn btn-success" id="save" name="save">Save</button>
        </div>
    </div>
</form>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
document.getElementById('sendNext').addEventListener('click', function() {
  var page1Inputs = document.querySelectorAll('#page1 input, #page1 select');
  var valid = true;

  page1Inputs.forEach(function(input) {
    if (!input.checkValidity()) {
      input.classList.add('invalid');
      valid = false;
    } else {
      input.classList.remove('invalid');
    }
  });
  if (valid) {
    $(document).ready(function() {
        $('#sendNext').on('click', function(e) {
            e.preventDefault();
            var formData = $('#labForm').serialize();
            $.ajax({
                type: 'POST',
                url: 'save_urinary.php',  // Endpoint to handle saving urinaryExams data
                data: formData,
                success: function(response) {
                    if (response === 'success') {
                        alert('Page 1 data saved successfully');
                        $('#page1').hide();
                        $('#page2').show();
                    } else if (response === 'patient_not_found') {
                        alert('Patient ID not found in pregnant table');
                    } else {
                        alert('Error saving data');
                    }
                },
                error: function() {
                    alert('Failed to save data');
                }
            });
        });

        $('#previous').on('click', function() {
            $('#page2').hide();
            $('#page1').show();
        });
    });
  }
});
</script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('#submitPage2').on('click', function(e) {
            e.preventDefault();
            var formData = $('#labFormPage2').serialize();
            $.ajax({
                type: 'POST',
                url: 'phpscripts/laboratoryScripts.php',  // Endpoint to handle saving laboratoryExams data
                data: formData,
                success: function(response) {
                    if (response === 'patient_not_found') {
                        alert('Patient ID not found in pregnant table');
                    } else if (response === 'error') {
                        alert('Error saving data');
                    }
                    // Redirect to allLaboratory.php handled in PHP upon success
                },
                error: function() {
                    alert('Failed to save data');
                }
            });
        });
    });
</script>


</body>
</html>
