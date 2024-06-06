
    <?php
    include('includes/connection.php');

    $tData1=$tData2=$tData3=$tData4=$tData5=$tData6=$tData7=$tData8=$tData9=$tData10=$tData11=$tData12=$tData13=
    $tData14=$tData15=$tData16=$tData17=$tData18=$tData19=$tData20=$tData21=$tData22=$tData23=$tData24=$tData25=$tData26=
    $tData27=$tData28=$tData29=$tData30=$tData31="";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['searchFor'])) {
        $search_query = $_POST["search"];
        $table1 = "SELECT * FROM pregnant WHERE regNo LIKE '%$search_query%'";
        $result1 = $conn->query($table1);

        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                $tData1 = $row['regNo'];       $tData6 = $row['dob'];      $tData7 = $row['age'];
                $tData2 = $row['hospital'];    $tData8 = $row['MaritalStatus'];  $tData9 = $row['partnerName'];
                $tData3 = $row['healthCenter']; $tData10 = $row['partnerAge'];   $tData11= $row['employment'];
                $tData4 = $row['healthPost'];   $tData12= $row['PhoneNumber'];   $tData13= $row['education'];
                $tData5 = $row['name'];        $tData14= $row['ubudehe'];        $tData15= $row['religion'];
                $tData16= $row['province'];   $tData17= $row['district'];        $tData18= $row['sector'];
                $tData19= $row['cell'];        $tData20= $row['village'];       $tData21= $row['ContactNumber'];
                $tData22= $row['accompany']; $tData23= $row['gravida'];       $tData24= $row['termDelivery'];
                $tData25= $row['prematureDelivery']; $tData26= $row['numAbortions'];     $tData27= $row['parity'];
                $tData28= $row['AgeLastBorn'];   $tData29= $row['AliveChildren'];  $tData30= $row['lmpd'];
                $tData31= $row['edd'];
            }
        }
        $conn->close();
    }
    ?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PMS || Client File</title>
        <link rel="stylesheet" href="/css/initial-styles.css">
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="print.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <style>
        td{
            text-align: left;
            font-weight: bold;
            padding: 5px;
        }
        span{
          font-weight: normal;
          display: inline-block;

          /*padding: 5px;*/
        }
        .vertical-text {
        writing-mode: vertical-lr; /* Set text orientation to vertical, reading from left to right */
        transform: rotate(180deg); /* Flip the text vertically */
        /*transform-origin: bottom;  Set rotation origin to bottom */
        /*margin: auto;  Center the text */
    }

    </style>
    </head>
    <body>

        <div class="container">
          <div class="table-responsive bg-gray-100">
                <table style="padding: 30px 20px 30px 40px;" width="100%" class="table table-borderless">
                <tr>
                  <th class="text float-left">
                            REPUBLIC OF RWANDA <br>
                            <img src="img/minisante.png" alt="" height="100px" width="100px">
                          </th>
                        <th  class="text  float-end">
                            <img src="img/rbc.jpeg" alt="" height="100px" width="200px">
                          </th>
                       </tr>
                       <tr>
                        <th colspan="2" class="text-xl float-end text-warning">
                              FILE NUMBER: <?php echo $tData1; ?>
                          </th>
                          </tr>
                          <tr>
                            <th colspan="2" style="text-align: center; font-size: large;" class="text-xxl font-weight-bold text-success">PRENATAL MONITORING SYSTEM CARE FILE</th>
                          </tr>
                        </table>
                        </div>

                <div class="card-body bg-gray-100">
                <div class="row">
                    <div class="col text-success">
                        <h5>HOSPITAL:<span style="border-bottom: 2px dotted black; width: 260px;">  <?php echo $tData2; ?><span> </h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-success">
                        <h5>HEALTH CENTER:<span style="border-bottom: 2px dotted black; width: 200px;">  <?php echo $tData3; ?><span> </h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-success">
                        <h5>HEALTH POST: <span style="border-bottom: 2px dotted black; width: 220px;">  <?php echo $tData4; ?><span></h5>
                    </div>
                </div>
                <h3 class="text-xxl text-success text-decoration-underline" style="text-align:center;">CLIENT IDENTIFICATION</h3>

                <div class="table-responsive">
                    <table class="table table-borderless text-success" id="fileTable" width="100%" cellspacing="0">
                  <tr>
                    <td colspan="3">NAMES:<span class="text-xl text-success font-weight-bolder">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <?php echo $tData5; ?><span> </td>
                  </tr>
                  <tr>
                    <td colspan="3">DATA OF BIRTH:<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tData6; ?></span>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</spa>AGE:
                        <span style="width: 80px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tData7; ?><span></td>
                  </tr>
                  <tr>
                    <td>MARITAL STATUS: <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tData8; ?><span></td>
                    <td colspan="">PARTNER'S NAME: <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tData9; ?><span></td>
                    <td>AGE: <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tData10; ?><span></td>
                  </tr>
                  <tr>
                    <td>EMPLOYMENT: <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tData11; ?><span></td>
                    <td colspan="">BLOOD GROUP AND RHESUS: <span><?php //echo $blood; ?><span></td>
                    <td>PROVINCE: <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tData16; ?><span></td>
                  </tr>
                  <tr>
                    <td>DISTRICT: <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tData17; ?><span></td>
                    <td>SECTOR:<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tData18; ?><span></td>
                    <td>CELL: <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tData19; ?><span></td>
                  </tr>
                  <tr>
                    <td>VILLAGE: <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tData20; ?><span></td>
                  <td colspan="">PHONE NUMBER: <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tData12; ?><span></td>
                    <td>EDUCATION: <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tData13; ?><span></td>
                  </tr>
                  <tr>
                    <td>UBUDEHE CATEGORY: <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tData14; ?><span></td>
                    <td>RELIGION: <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tData15; ?><span></td>
                    <td colspan="">CONTACT NUMBER: <span>&nbsp;<?php echo $tData21; ?><span></td>
                  </tr>
                  <tr>
                  <td colspan="3">ACCOMPANIED BY HER PARTNER: <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tData22; ?><span></td>
                  </tr>
                  <tr>
                    <td colspan="3" style="height:30px;"></td>
                  </tr>
                  <tr>
                    <td>Gravida(G): <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tData23; ?><span></td>
                    <td>Term deliveries: <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tData24; ?><span></td>
                    <td>Premature deliveries: <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tData25; ?><span></td>

                  </tr>
                  <tr>
                  <td>Number of abortions: <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tData26; ?><span></td>
                  <td>Parity with alive births: <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tData27; ?><span></td>
                    <td>Age of last born:<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tData28; ?>Years,      Months<span></td>
                  </tr>
                  <tr>
                    <td> Alive children:<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tData29; ?><span></td>
                    <td>LMP: <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tData30; ?><span></td>
                    <td colspan="">EDD: <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tData31; ?><span></td>
                  </tr>
                </table>
            </div>
          </div><br>

    <table class='table table-bordered'>
    <?php
    include('includes/connection.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['searchFor'])) {
        $search_query = $_POST["search"];
          $table = "SELECT information_type, results FROM general_infor WHERE regNo LIKE '%$search_query%'";
          $result = $conn->query($table);
    if ($result->num_rows > 0) {
    echo "<h3>A. GENERAL INFORMATION OF PREGNANT WOMAN</h3>";
      echo"<thead class='table table-warning'>
      <tr>
          <th width='40%'>Consideration</th>
          <th>Yes</th>
          <th>No</th>
      </tr>
    </thead>
    <tbody>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["information_type"] . "</td>";
            if ($row["results"] == "Yes") {
                echo "<td>&#10003;</td>";
                echo "<td></td>";
            } elseif ($row["results"] == "No") {
                echo "<td></td>";
                echo "<td>&#10007;</td>";
            } elseif ($row["results"] !== "No" || $row["results"] !== "Yes") {
              echo "<td colspan='2'> These Are: " . $row["results"] . "</td>";
                echo "</tr>";
            }

        }
    }
    }
    $conn->close();
    ?>
    </table>
    <br>

    <table class='table  table-bordered'>
    <?php
    include('includes/connection.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['searchFor'])) {
        $search_query = $_POST["search"];
    $sql = "SELECT numbers, information_type, results, comments FROM clinical_history WHERE regNo LIKE '%$search_query%'";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      echo"<h3>B. CLINICAL CONSIDERATION OF PREGNANT WOMAN IN CONSULTATION</h3>";
      echo "<thead class='table table-warning'>
          <tr>
          <th width='5%'>NO</th>
              <th width='45%'>Consideration</th>
              <th width='10%'style='text-align:center;'>Yes</th>
              <th width='10%'>No</th>
              <th>Comments</th>
          </tr>
      </thead>
      <tbody>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['numbers'] . "</td>";
            echo "<td>" . $row["information_type"] . "</td>";
            if ($row["results"] == "Yes") {
                echo "<td>&#10003;</td>";
                echo "<td></td>"; // Leave No column empty
            } elseif ($row["results"] == "No") {
                echo "<td></td>"; // Leave Yes column empty
                echo "<td>&#10007;</td>";
            } else {
                echo "<td colspan='2'>". $row['results']." </td>";
            }
            echo "<td>" . $row["comments"] . "</td>";
            echo "</tr>";
        }
    }
    }
    $conn->close();
    ?>
    </table>
    <br>

    <h2>ANTENATAL CONSULTATION </h2>
    <table border="1" class="table table-bordered">
      <thead class="table table-warning table-striped" style="height:80px;">
      <tr>
        <th rowspan="2" class="vertical-text"> No of Contact</th>
        <th rowspan="2" class="vertical-text">Tested Date</th>
        <th rowspan="2" class="vertical-text">Cervical cancer screening</th>
        <th colspan="2">Gestational age (Weeks)</th>
        <th rowspan="2" class="vertical-text">Temperature</th>
        <th rowspan="2" class="vertical-text">Heart Rate</th>
        <th rowspan="2" class="vertical-text">Respiratory Rate</th>
        <th rowspan="2" class="vertical-text">Height (cm)</th>
        <th rowspan="2" class="vertical-text">Weight (kg)</th>
        <th rowspan="2" class="vertical-text">BMI</th>
        <th rowspan="2" class="vertical-text">MUA (cm)</th>
        <th rowspan="2" class="vertical-text">Blood Pressure (mm. Hg)</th>
        <th rowspan="2" class="vertical-text">Fundal Height (cm)</th>
        <th rowspan="2" class="vertical-text"> Fetal Heart Beat(b/min)</th>
        <th rowspan="2" class="vertical-text">Fetal movement Y/N</th>
        <th colspan="5" style="height:-20px;"> Ultrasound Results</th>
        <th rowspan="2" class="vertical-text" style="width:160px;">Reasons of transfer</th>
      </tr>

      <tr>
        <th class="vertical-text" style="width:30px;">LMP</th>
        <th class="vertical-text" style="width:30px;">Ultrasound</th>
        <th class="vertical-text">Fetal Heart Rate</th>
        <th class="vertical-text"> Fetal Presentation</th>
        <th class="vertical-text">EFW</th>
        <th class="vertical-text">AFI</th>
        <th class="vertical-text">Number of fetus</th>
      </tr>
      </thead>
      <tbody>
        <?php
        include('includes/connection.php');
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['searchFor'])) {
            $search_query = $_POST["search"];
        $sql = "SELECT * FROM patientconsoltation WHERE PatientID LIKE '%$search_query%'";
        $sql1 = "SELECT * FROM pregnant WHERE regNo LIKE '%$search_query%' OR PhoneNumber LIKE '%$search_query%'";
        $sql2 = "SELECT * FROM UltrasoundTable WHERE PatientID LIKE '%$search_query%'";
        $result = $conn->query($sql);
        $result1 = $conn->query($sql1);
        $result2 = $conn->query($sql2);
        if ($result->num_rows > 0) {
          if($result1->num_rows > 0){
            if($result2->num_rows > 0){
            while ($row = $result->fetch_assoc()) {
              while ($row1 = $result1->fetch_assoc()) {
                while ($row2 = $result2->fetch_assoc()){
                echo"<tr><td>". $row['Contacts']. "</td>".
                "<td>".$row['test_Date']. "</td>".
                "<td>".$row['Cervical_Screening']. "</td>".
                "<td>".$row1['lmpd']. "</td>".
                "<td>".$row['Ultrasound_weeks']. "</td>".
                "<td>".$row['Temperature']. "</td>".
                "<td>".$row['Heart_Bit_Rate']. "</td>".
                "<td>".$row['Respiratory_Rate']. "</td>".
                "<td>".$row['Height']. "</td>".
                "<td>".$row['Weight_kg']. "</td>".
                "<td>".$row['BMI']. "</td>".
                "<td>".$row['MUAC']. "</td>".
                "<td>".$row3['blood_pressure']. "</td>".
                "<td>".$row2['Fundal_Height']. "</td>".
                "<td>".$row2['Fetal_Heart_Beat']. "</td>".
                "<td>".$row2['Fetal_movement']. "</td>".
                "<td>".$row2['Fetal_Heart_Rate']. "</td>".
                "<td>".$row2['Fetal_Presentation']. "</td>".
                "<td>".$row2['E_Fetal_Weight']. "</td>".
                "<td>".$row2['Amniotic_F_Index']. "</td>".
                "<td>".$row2['Number_Fetus']. "</td>".
                "<td>1. ".$row['MaternalComments']."<br>2. ".$row2['MaternalComments']. "</td>".
                "</tr>";
                  }
              }
            }
          }
        }
      }
    }


    ?>
    </tbody>
    </table>
    <p>EFW-Estimated fetal weight, AFI-Amniotic Fluid Index, Fetal presentation: 1. cephalic 2. Breech 3. Transverse 4. Unknown</p>
    </div>

    <br>
    <div class="container">
    <h2>LABORATORY EXAMS </h2>
    <div class="table-responsive">
    <table border="1" class="table table-bordered">
      <thead class="table table-info table-striped" style="height:80px;">
      <tr>
        <th rowspan="3" class="vertical-text"> No of Contact</th>
        <th rowspan="3">Tested Date</th>
        <th colspan="8">Urinary Test</th>
        <th colspan="13">Blood Analysis</th>
        <th rowspan="3">Additional Information</th>
        </tr>
        <tr>
          <th rowspan="2" class="vertical-text">Glucosuria</th>
          <th rowspan="2" class="vertical-text">Proteinuria</th>
          <th colspan="6">Urinalysis (ECBU)</th>
          <th colspan="4">Full Blood Count</th>
          <th rowspan="2" class="vertical-text">Blood Type and Rhesus</th>
          <th rowspan="2">RPR N/P</th>
          <th colspan="2">HIV N/P</th>
          <th rowspan="2" class="vertical-text">Malaria N/P</th>
          <th rowspan="2" class="vertical-text">Hepatite B N/P</th>
          <th rowspan="2" class="vertical-text">Hepatite C N/P</th>
          <th rowspan="2" class="vertical-text">Glycemia</th>
        </tr>
        <tr>
          <th class="vertical-text">Appearance</th>
          <th class="vertical-text">pH</th>
          <th class="vertical-text">Protein</th>
          <th class="vertical-text">Glucose</th>
          <th class="vertical-text">Ketones</th>
          <th class="vertical-text">Leukocytes</th>
          <th class="vertical-text">WBC</th>
          <th class="vertical-text">RBC</th>
          <th class="vertical-text">Hb</th>
          <th class="vertical-text">Plt</th>
          <th >N</th>
          <th>P</th>
        </tr>
        </thead>
        <tbody>
          <?php
          include('includes/connection.php');
          if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['searchFor'])) {
              $search_query = $_POST["search"];
          $sql = "SELECT * FROM urinaryexams WHERE PatientID LIKE '%$search_query%'";
          $sql1 = "SELECT * FROM laboratoryExams WHERE PatientID LIKE '%$search_query%'";
          $result = $conn->query($sql);
          $result1 = $conn->query($sql1);
          if ($result->num_rows > 0) {
            if ($result1->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              while ($row1 = $result1->fetch_assoc()) {
                echo "<tr><td>". $row['Contact']. "</td><td>".
                $row['testDate'] . "</td><td>".
                $row['Glucosuria']. "</td><td>".
                $row['Proteinuria'] . "</td><td>".
                //$row['Urinanalysis_ECBU']. "</td><td>" .

                $row['Appearance']. "</td><td>" .
                $row['pH']  . "</td><td>" .
                $row['Protein'] . "</td><td>" .
                $row['Glucose']  . "</td><td>" .
                $row['Ketones'] . "</td><td>".
                $row['Leukocytes'] . "</td>".
                $row1['WBC'] . "</td><td>".
                $row1['RBC'] . "</td><td>".
                $row1['Hb'] . "</td><td>".
                $row1['Plt'] . "</td><td>".
                "<td></td>". "<td>".$row1['RPR_NP']."</td>";



              if ($row1['HIV_NP'] == "Negative") {
                echo "<td>N</td>";
                echo "<td></td>";
            }
            else{
              echo "<td></td>";
              echo "<td>P</td>";
            }

            if ($row1['Malaria_NP'] == "Negative") {
              echo "<td>N</td>";

          }
          else{

            echo "<td>P</td>";
          }

          if ($row1['Hepatite_B_NP'] == "Negative") {
            echo "<td>N</td>";
        }
        else{
          echo "<td>P</td>";
        }

        if ($row1['Hepatite_C_NP'] == "Negative") {
          echo "<td>N</td>";
      }
      else{
        echo "<td>P</td>";
      }

      echo "<td>". $row1['Glycemia'] . "</td><td>".
              $row1['AdditionalComments'] . "</td>";
}
            }
            }
            }

          }
          ?>
        </tbody>
        </table>
        <p>Urinalysis (ECBU): .<br>WBC: White Blood Cells, RBC: Red Blood Cells, Hb: Hemoglobin, Plt: Platelets, </p>
        </div>

        <h4>PREVENTIVE MEASURES </h4>
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
              <th class="vertical-text">RDV</th>
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
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['searchFor'])) {
            $search_query = $_POST["search"];
    $sql = "SELECT numContacts, patientID, provision_iron_folic, provision_metoclopramide, tetanus_diptheria, calcium, mosquito_net, urinary_treatment, rdv, health_provider, health_worker FROM preventivecare WHERE patientID LIKE '%$search_query%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
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
}
    $conn->close();
    ?>

          </tbody>
        </table>
    </div>
    <script>
    document.getElementById('print-icon').addEventListener('click', function() {
    window.print(document.body);
    });

    document.getElementById('download-icon').addEventListener('click', function() {
    // Convert the page to PDF and download
    html2pdf(document.body);
    });
    </script>
    <script src="print.min.js"></script>

  </body>
</html>
