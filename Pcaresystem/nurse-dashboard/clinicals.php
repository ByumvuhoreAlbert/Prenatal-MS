<?php
include('includes/header.php');
include('includes/navbar.php');
include('phpscripts/clinicalScript.php');
?>
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><center>B. CLINICAL CONSIDERATION OF PREGNANT WOMAN</center></h6>
  </div>

  <div class="card-body">
    <div class="table-responsive-sm">
      <form class="" action="" method="post">
        <div class="m-3">
          <label for=""><i>Client Names</i></label>
          <input type="text" name="user[name]" value="" style="background-color: white; color:black; border:none; outline:none; border-bottom: 2px dashed black;">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <label for=""><i>Client ID#</i></label>
          <input type="text" name="user[id]" value="" style="background-color: white; color:black; border:none; outline:none; border-bottom: 2px dashed black;">
        </div>

        <table class="table table-borderless" id="dataTable" width="100%">
          <thead>
  <tr>
    <th>B.1.</th>
     <th style="width:50%;"> Information Type </th>
     <th> Result </th>
     <th>Comments</th>
   </tr>
 </thead>
 <tbody>
          <tr>
            <td><input type="text" name="b[1]" value="B.1.1." readonly style="background-color: white; color:black; border:none; outline:none; width:60px;"></td>
            <td> <input type="text" name="type[1]" value="Previous History of Pregnancy" readonly style="background-color: white; font-weight: bold;color:black; border:none; outline:none; width:100%;"> </td>
            <td>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="result[1]" value="Yes">Yes
                 </div>
                  <div class="form-check form-check-inline">
                   <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="result[1]" value="No">No
                  </div>
            </td>
            <td><input type="text" name="com[1]" value="" style="background-color: white; color:black; border:none; outline:none; border-bottom: 2px dashed black; width:100%;"></td>
          </tr>

          <tr>
            <td><input type="text" name="b[2]" value="1" readonly style="background-color: white; color:black; border:none; outline:none; width:60px;"></td>
            <td> <input type="text" name="type[2]" value="History of Premature Delivery" readonly style="background-color: white; color:black; border:none; outline:none; width:100%;"> </td>
            <td>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="result[2]" value="Yes">Yes
                 </div>
                  <div class="form-check form-check-inline">
                   <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="result[2]" value="No">No
                  </div>
            </td>
            <td><input type="text" name="com[2]" value="" style="background-color: white; color:black; border:none; outline:none; border-bottom: 2px dashed black; width:100%;"></td>
          </tr>

          <td><input type="text" name="b[3]" value="2" disabled style="background-color: white; color:black; border:none; outline:none; width:60px;"></td>
          <td> <input type="text" name="type[3]" value="History of birth disability" readonly style="background-color: white; color:black; border:none; outline:none; width:100%;"> </td>
          <td>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="result[3]" value="Yes">Yes
               </div>
                <div class="form-check form-check-inline">
                 <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="result[3]" value="No">No
                </div>
          </td>
          <td><input type="text" name="com[3]" value="" style="background-color: white; color:black; border:none; outline:none; border-bottom: 2px dashed black; width:100%;"></td>
        </tr>
     <tr>
        <td><input type="text" name="b[4]" value="3" readonly style="background-color: white; color:black; border:none; outline:none; width:60px;"></td>
        <td> <input type="text" name="type[4]" value="Previous Cesarean section (specify date):" readonly style="background-color: white; color:black; border:none; outline:none; width:100%;"> </td>
        <td>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="result[4]" value="Yes">Yes
             </div>
              <div class="form-check form-check-inline">
               <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="result[4]" value="No">No
              </div>
        </td>
        <td><input type="text" name="com[4]" value="" style="background-color: white; color:black; border:none; outline:none; border-bottom: 2px dashed black; width:100%;"></td>
      </tr>


      <tr>
         <td><input type="text" name="b[5]" value="4" readonly style="background-color: white; color:black; border:none; outline:none; width:60px;"></td>
         <td> <input type="text" name="type[5]" readonly value="History of stillbirth or neonatala death" style="background-color: white; color:black; border:none; outline:none; width:100%;"> </td>
         <td>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="result[5]" value="Yes">Yes
              </div>
               <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="result[5]" value="No">No
               </div>
         </td>
         <td><input type="text" name="com[5]" value="" style="background-color: white; color:black; border:none; outline:none; border-bottom: 2px dashed black; width:100%;"></td>
       </tr>

       <tr>
          <td><input type="text" name="b[6]" value="5" readonly style="background-color: white; color:black; border:none; outline:none; width:60px;"></td>
          <td> <input type="text" name="type[6]" value="Recurrent Abortion 3 times" readonly style="background-color: white; color:black; border:none; outline:none; width:100%;"> </td>
          <td>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="result[6]" value="Yes">Yes
               </div>
                <div class="form-check form-check-inline">
                 <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="result[6]" value="No">No
                </div>
          </td>
          <td><input type="text" name="com[6]" value="" style="background-color: white; color:black; border:none; outline:none; border-bottom: 2px dashed black; width:100%;"></td>
        </tr>

        <tr>
           <td><input type="text" name="b[7]" value="6" readonly style="background-color: white; color:black; border:none; outline:none; width:60px;"></td>
           <td> <input type="text" name="type[7]" value="History of delivery of Newborn with less than 2.5kg on term Pregnant" readonly style="background-color: white; font-size: 14px; color:black; border:none; outline:none; width:100%;"> </td>
           <td>
             <div class="form-check form-check-inline">
               <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="result[7]" value="Yes">Yes
                </div>
                 <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="result[7]" value="No">No
                 </div>
           </td>
           <td><input type="text" name="com[7]" value="" style="background-color: white; color:black; border:none; outline:none; border-bottom: 2px dashed black; width:100%;"></td>
         </tr>

         <tr>
            <td><input type="text" name="b[8]" value="7" readonly style="background-color: white; color:black; border:none; outline:none; width:60px;"></td>
            <td> <input type="text" name="type[8]" value="History of Macrosomia(Birth weight >=4kg)" readonly style="background-color: white; color:black; border:none; outline:none; width:100%;"> </td>
            <td>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="result[8]" value="Yes">Yes
                 </div>
                  <div class="form-check form-check-inline">
                   <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="result[8]" value="No">No
                  </div>
            </td>
            <td><input type="text" name="com[8]" value="" style="background-color: white; color:black; border:none; outline:none; border-bottom: 2px dashed black; width:100%;"></td>
          </tr>

          <tr>
             <td><input type="text" name="b[9]" value="8" readonly style="background-color: white; color:black; border:none; outline:none; width:60px;"></td>
             <td> <input type="text" name="type[9]" value="History of Hypertension Disorders" readonly style="background-color: white; color:black; border:none; outline:none; width:100%;"> </td>
             <td>
               <div class="form-check form-check-inline">
                 <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="result[9]" value="Yes">Yes
                  </div>
                   <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="result[9]" value="No">No
                   </div>
             </td>
             <td><input type="text" name="com[9]" value="" style="background-color: white; color:black; border:none; outline:none; border-bottom: 2px dashed black; width:100%;"></td>
           </tr>

           <tr>
              <td><input type="text" name="b[10]" value="9" readonly style="background-color: white; color:black; border:none; outline:none; width:60px;"></td>
              <td> <input type="text" name="type[10]" value="Any History of multiple Pregnancy?" readonly style="background-color: white; color:black; border:none; outline:none; width:100%;"> </td>
              <td>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="result[10]" value="Yes">Yes
                   </div>
                    <div class="form-check form-check-inline">
                     <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="result[10]" value="No">No
                    </div>
              </td>
              <td><input type="text" name="com[10]" value="" style="background-color: white; color:black; border:none; outline:none; border-bottom: 2px dashed black; width:100%;"></td>
            </tr>

            <tr>
               <td><input type="text" name="b[11]" value="10" readonly style="background-color: white; color:black; border:none; outline:none; width:60px;"></td>
               <td> <input type="text" name="type[11]" value="History of Vaginal bleeding during Pregnancy or Post partum hemorrhage?" readonly style="background-color: white; font-size: 13.6px; color:black; border:none; outline:none; width:100%;"> </td>
               <td>
                 <div class="form-check form-check-inline">
                   <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="result[11]" value="Yes">Yes
                    </div>
                     <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="result[11]" value="No">No
                     </div>
               </td>
               <td><input type="text" name="com[11]" value="" style="background-color: white; color:black; border:none; outline:none; border-bottom: 2px dashed black; width:100%;"></td>
             </tr>


             <tr>
                <td><input type="text" name="b[12]" value="11" readonly style="background-color: white; color:black; border:none; outline:none; width:60px;"></td>
                <td> <input type="text" name="type[12]" readonly value="Use of Family Planning before this Pregnancy?"  style="background-color: white; color:black; border:none; outline:none; width:100%;"> </td>
                <td>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="result[12]" value="Yes">Yes
                     </div>
                      <div class="form-check form-check-inline">
                       <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="result[12]" value="No">No
                      </div>
                </td>
                <td><input type="text" name="com[12]" value="" style="background-color: white; color:black; border:none; outline:none; border-bottom: 2px dashed black; width:100%;"></td>
              </tr>

          <tr>
            <td><input type="text" name="b[13]" value="12" readonly style="background-color: white; color:black; border:none; outline:none; width:60px;"></td>
            <td colspan="3">
              <div class="input-group mb-3">
               <input type="text" class="form-control" name="type[13]" readonly value="If Yes, Specify FP method used?" style="background-color: white; color:red; border:none; outline:none; width:140px;">
               <input type="text" class="form-control" name="type[13]" style="background-color: white; color:black; border:none; outline:none; border-bottom: 2px dashed black; ">
               <input type="text" class="form-control" name="result[13]" readonly value="And period in year and months" style="background-color: white; color:red; border:none; outline:none; width:140px;">
               <input type="date" class="form-control" name="result[13]"  style="background-color: white; color:black; border:none; outline:none; border-bottom: 2px dashed black; width:30px;">
              </div>
            </td>
          </tr>

          <tr>
             <td><input type="text" name="b[14]" value="B.1.2" readonly style="background-color: white; font-weight: bold; color:black; border:none; outline:none; width:60px;"></td>
             <td> <input type="text" name="type[14]" value="Information on current Pregnancy" readonly style="font-weight: bold; background-color: white; color:black; border:none; outline:none; width:100%;"> </td>
             <td>
               <div class="form-check form-check-inline">
                 <input class="form-check-input" type="checkbox" id="" name="result[14]" value="Yes">Yes
                  </div>
                   <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="result[14]" value="No">No
                   </div>
             </td>
             <td><input type="text" name="com[14]" value="" style="background-color: white; color:black; border:none; outline:none; border-bottom: 2px dashed black; width:100%;"></td>
           </tr>

           <tr>
              <td><input type="text" name="b[15]" value="1" readonly style="background-color: white; color:black; border:none; outline:none; width:60px;"></td>
              <td> <input type="text" name="type[15]" readonly value="Is Woman age less than 18 or old than 35 at the first pregnancy?" readonly style="background-color: white; color:black; border:none; outline:none; width:100%; font-size: 14px;"> </td>
              <td>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="result[15]" value="Yes">Yes
                   </div>
                    <div class="form-check form-check-inline">
                     <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="result[15]" value="No">No
                    </div>
              </td>
              <td><input type="text" name="com[15]" value="" style="background-color: white; color:black; border:none; outline:none; border-bottom: 2px dashed black; width:100%; "></td>
            </tr>

            <tr>
               <td><input type="text" name="b[16]" value="2" readonly style="background-color: white; color:black; border:none; outline:none; width:60px;"></td>
               <td> <input type="text" name="type[16]" value="Is She having Vaginal bleeding?" readonly style="background-color: white; color:black; border:none; outline:none; width:100%; "> </td>
               <td>
                 <div class="form-check form-check-inline">
                   <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="result[16]" value="Yes">Yes
                    </div>
                     <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="result[16]" value="No">No
                     </div>
               </td>
               <td><input type="text" name="com[16]" value="" style="background-color: white; color:black; border:none; outline:none; border-bottom: 2px dashed black; width:100%;"></td>
             </tr>

         <tr>
          <td colspan="4"><center>
          <button type="submit" name="addData" class="btn btn-success">
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
