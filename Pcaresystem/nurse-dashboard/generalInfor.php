<?php
include('includes/header.php');
include('includes/navbar.php');

 ?>
<?php include('phpscripts/generalInforScripts.php'); ?>
 <div class="container-fluid">

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
   <div class="card-header py-3">
     <h6 class="m-0 font-weight-bold text-primary"><center>A. GENERAL INFORMATION OF PREGNANT WOMAN</center></h6>
   </div>

   <div class="card-body">
     <div class="table-responsive">
       <form class="" action="" method="post">
         <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
           <thead>
           <tr>
             <td colspan="2">
           <label for=""><i>Client Names</i></label>
           <input type="text" name="user[name]" value="" style="background-color: white; color:black; border:none; outline:none; border-bottom: 2px dashed black;">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <label for=""><i>Client ID#</i></label>
           <input type="text" name="user[id]" value="" style="background-color: white; color:black; border:none; outline:none; border-bottom: 2px dashed black;">

     </td>
   </tr>
   <tr>
      <th> Information Type </th>
      <th> Result </th>
    </tr>
  </thead>
  <tbody>
           <tr>
             <td> <input type="text" name="infor[1]" id="infor1" readonly  value="Surgical history or cervical trauma or cerclage" style="background-color: white; color:black; width: 100%; border:none; outline:none;"> </td>
             <td>
               <div class="form-check form-check-inline">
                 <input class="form-check-input" type="checkbox" id="check1_yes" name="result[1]" value="Yes">Yes
                  </div>
                   <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="check1_no" name="result[1]" value="No">No
                   </div>
             </td>
           </tr>
           <tr>
             <td> <input type="text" name="infor[2]" id="infor2" readonly value="History of Diabetis"  style="background-color: white; color:black; width: 100%; border:none; outline:none;"> </td>
             <td>
               <div class="form-check form-check-inline">
                 <input class="form-check-input" type="checkbox" id="check2_yes" name="result[2]" value="Yes">Yes
                  </div>
                   <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="check2_no" name="result[2]" value="No">No
                   </div>
             </td>
           </tr>
           <tr>
             <td> <input type="text" name="infor[3]" id+"infor3" readonly value="History of Kidney problems"  style="background-color: white; color:black; width: 100%; border:none; outline:none;"> </td>
             <td>
               <div class="form-check form-check-inline">
                 <input class="form-check-input" type="checkbox" id="check3_yes" name="result[3]" value="Yes">Yes
                  </div>
                   <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="check3_no" name="result[3]" value="No">No
                   </div>
             </td>
           </tr>
           <tr>
             <td> <input type="text" name="infor[4]" id="infor4" readonly value="History of Heart Diseases"  style="background-color: white; color:black; width: 100%; border:none; outline:none;"> </td>
             <td>
               <div class="form-check form-check-inline">
                 <input class="form-check-input" type="checkbox" id="check4_yes" name="result[4]" value="Yes">Yes
                  </div>
                   <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="check4_no" name="result[4]" value="No">No
                   </div>
             </td>
           </tr>
           <tr>
             <td> <input type="text" name="infor[5]" id="infor5" readonly value="History of Gynecological problems"  style="background-color: white; color:black; width: 100%; border:none; outline:none;"> </td>
             <td>
               <div class="form-check form-check-inline">
                 <input class="form-check-input" type="checkbox" id="check5_yes" name="result[5]" value="Yes">Yes
                  </div>
                   <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="check5_no" name="result[5]" value="No">No
                   </div>
             </td>
           </tr>
           <tr>
             <td> <input type="text" name="infor[6]" id="infor6" readonly value="History of Tuberculosis"  style="background-color: white; color:black; width: 100%; border:none; outline:none;"> </td>
             <td>
               <div class="form-check form-check-inline">
                 <input class="form-check-input" type="checkbox" id="check6_yes" name="result[6]" value="Yes">Yes
                  </div>
                   <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="check6_no" name="result[6]" value="No">No
                   </div>
             </td>
           </tr>
           <tr>
             <td> <input type="text" name="infor[7]" id="infor7" readonly value="Is She current taking Medicines?"  style="background-color: white; color:black; width: 100%; border:none; outline:none;"> </td>
             <td>
               <div class="form-check form-check-inline">
                 <input class="form-check-input" type="checkbox" id="check7_yes" name="result[7]" value="Yes">Yes
                  </div>
                   <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="check7_no" name="result[7]" value="No">No
                   </div>
             </td>
           </tr>
           <tr>
             <td colspan="2">
               <div class="input-group mb-3">
                <input type="text" class="form-control"name="infor[8]" readonly id="infor8" value="If Yes, Mention them?" style="background-color: white; color:red; width: 0%; border:none; outline:none;">
                <input type="text" class="form-control" name="result[8]" id="result8" style="background-color: white; color:black; width: 50%; border:none; outline:none; border-bottom: 2px dashed black;">
               </div>
             </td>
           </tr>
           <tr>
             <td> <input type="text" name="infor[9]" id="infor9" readonly value="Any Medical Allergies?"  style="background-color: white; color:black; width: 100%; border:none; outline:none;"> </td>
             <td>
               <div class="form-check form-check-inline">
                 <input class="form-check-input" type="checkbox" id="check9_yes" name="result[9]" value="Yes">Yes
                  </div>
                   <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="check9_no" name="result[9]" value="No">No
                   </div>
             </td>
           </tr>
           <tr>
             <td>
               <div class="input-group mb-3">
                <input type="text" class="form-control"name="infor[10]" readonly id="infor10" value="If Yes, Mention them?" style="background-color: white; color:red; width: 0%; border:none; outline:none;">
                <input type="text" class="form-control" name="result[10]" id="result10"  style="background-color: white; color:black; width: 50%; border:none; outline:none; border-bottom: 2px dashed black;">
               </div>
             </td>
           </tr>
           <tr>
             <td> <input type="text" name="infor[11]"  readonly id="infor11" value="Does She taking Alcohol?" style="background-color: white; color:black; width: 100%; border:none; outline:none;"> </td>
             <td>
               <div class="form-check form-check-inline">
                 <input class="form-check-input" type="checkbox" id="check11_yes" name="result[11]" value="Yes">Yes
                  </div>
                   <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" readonly id="check11_no" name="result[11]" value="No">No
                   </div>
             </td>
           </tr>
           <tr>
             <td><input type="text" name="infor[12]" id="ifor12" readonly value="Does She taking Tobacco?"  style="background-color: white; color:black; width: 100%; border:none; outline:none;"> </td>
             <td>
               <div class="form-check form-check-inline">
                 <input class="form-check-input" type="checkbox" id="check12_yes" name="result[12]" value="Yes">Yes
                  </div>
                   <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="check12_no" name="result[12]" value="No">No
                   </div>
             </td>
           </tr>
           <tr>
             <td> <input type="text" name="infor[13]" id="infor13" readonly value="History of Psychological problems?"  style="background-color: white; color:black; width: 100%; border:none; outline:none;"> </td>
             <td>
               <div class="form-check form-check-inline">
                 <input class="form-check-input" type="checkbox" id="check13_yes" name="result[13]" value="Yes">Yes
                  </div>
                   <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="check13_no" name="result[13]" value="No">No
                   </div>
             </td>
           </tr>
           <tr>
          <tr>
           <td colspan="2"><center>
           <button type="submit" name="button" class="btn btn-success">
             <i class="fa fa-fw fa-plus"></i>
             Add Information</button>
        </center> </td>
        </tr>
         </tbody>
       </table>
       </form>
     </div>
   </div>

 </div>
