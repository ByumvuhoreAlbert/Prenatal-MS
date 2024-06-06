<?php 
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Mother Dashboard</h1>
  </div>
  
  <div class="row">

   <!-- Historical Test Results -->
<div class="col-6 col-md-8 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xxl font-weight-bold text-primary text-uppercase mb-1">Current & Previous Test Results</div>
                      <table class="table">
                    <tr>
                        <th>No</th>
                    <th>Date</th>
                    <th>Test Type</th>
                    <th>Test Results</th>
                    <th>Description / Comments</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Date</td>
                    <td>Test Type</td>
                    <td>Test Results</td>
                    <td>Description / Comments</td>
                </tr>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- pregnant calendar -->
<div class="col-4 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
        <div class="">
    <div class="header">
      <button id="prevMonth">&#10094;</button>
      <h2 id="monthYear"></h2>
      <button id="nextMonth">&#10095;</button>
    </div>
    <div class="days"></div>
  </div>
  <script src="js/calendar.js"></script>
        </div>
      </div>
    </div>
  </div>
</div>

  </div>
</div>