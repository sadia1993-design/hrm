<?php 
require_once("header.php");
require_once("sidebar.php");
$attend_report=$conn->query("SELECT * FROM `employee`");
?>
<section class="content">
      <div class="container-fluid mt-3">
        <div class="row">
          <div class="col-md-12">
            <div class="card">



              <div class="card-header">
                <h5>Search Monthly Attendance Report</h5>
              </div>

                <div class="card-body">

           
              <form action="Mon_atten_report.php" method="post" class=" text-center">
                <label>Employee *</label>  
                <select name='emp_id'>
                  <?php
                while($d_employee=$attend_report->fetch_assoc()){
                  //var_dump($d_employee); ?>
                <option value="<?php echo $d_employee['empID'] ?>"><?php echo $d_employee['name'] ?></option><br>
              <?php } ?>
              </select>
                
                <label>Month *</label>  
                <select name='emp_moth'>
                <option value="01">January</option>
                <option value='02'>February</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
              </select>
              <label>Years *</label>  
                <select name='years'>
                  <?php
                    for ($i=date('Y'); $i >1970 ; $i--) { 
                      // code...
                    
                  ?>
                <option value="<?php echo $i?>"> <?php echo $i?></option><br>
                <?php } ?>
              </select><br>
             <!--  <a href=""> -->
              <input type="submit" value="View Attendance" class="btn btn-info btn-block form-control">
           <!--  </a> -->
                       
              </form>
                 </div>


               </table>
               </div>
              </div>
             </div>
           </div>
       </section>

<?php require("footer.php"); ?>
