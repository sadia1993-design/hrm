<?php 
require_once("header.php");
require_once("sidebar.php");
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">

      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">dashboard</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h2 class="card-title"> Update Leave Application Form</h2>
            <div style="text-align: right;">                   

            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
           <?php 
           
           $id=$_GET['id'];
           $edit=$conn->query("SELECT * FROM `leave_application` WHERE applicationID =$id");
           $e=$edit->fetch_assoc();
           // echo "<pre>";
           // print_r($e);

           if(isset($_POST['emp_name'])){
            $emp_name=$_POST['emp_name'];
            $emp_leaveType=$_POST['emp_leaveType'];
            $start_date=$_POST['start_date'];
            $end_date=$_POST['end_date'];
            $comment=$_POST['comment'];

            $conn->query("UPDATE `leave_application` SET `empID`=$emp_name,`typeID`=$emp_leaveType,`start_date`='$start_date',`end_date`='$end_date',`comment`='$comment' WHERE `leave_application`.`applicationID` = $id");

            ?>

            <script type="text/javascript">
             window.location.href="add_leave_app.php";
           </script>

           <?php 

         }
         ?>
         <!--form section -->
         <form action="" method="post">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="emp_name">Employee Name</label>                        
                <select class="form-control" name="emp_name" id="emp_name">
                 <option value="" >Select Employee Name</option>
                 <?php 
                 $emp_table = $conn->query("SELECT * FROM `employee`");

                 while($emp_data = $emp_table->fetch_assoc()){ ?>
                  <option value="<?php echo $emp_data['empID']; ?>" <?php if ($emp_data['empID']==$e['empID']) {
                   echo "selected";
                  } ?> ><?php echo $emp_data['name']; ?></option>
                  <?php 
                }
                ?>                          
              </select>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="emp_leaveType">Leave Type</label>
              <select class="form-control" name="emp_leaveType" id="emp_leaveType">
               <option value="" >Select Leave Type</option>
               <?php 
               $emp_leave_type = $conn->query("SELECT * FROM `leave_type`");  

               while( $leaveType_data = $emp_leave_type->fetch_assoc() ){ ?>

                 <option value="<?php echo $leaveType_data['typeID']; ?>" <?php if ($leaveType_data['typeID']==$e['typeID']) {
                   echo "selected";
                 } ?> ><?php echo $leaveType_data['title']; ?></option>

               <?php }  ?>      
             </select>
           </div>
         </div>
         <div class="col-6">
          <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" class="form-control" value="<?php echo $e['start_date'] ?>" name="start_date" id="start_date">
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" class="form-control" value="<?php echo $e['end_date'] ?>" name="end_date" id="end_date">
          </div>
        </div>
      </div>                  
      <!--textarea-->
      <div class="row">
        <div class="col-12">
          <div class="form-group">
            <label for="reason_leave">Comment</label>
            <textarea class="form-control" placeholder="Comment" name="comment" id="" cols="30" rows="10"><?php echo ($e['comment']); ?></textarea>
          </div>
        </div>
      </div>
      <!-- submit -->
      <input type="submit" class="btn btn-block btn-info" value="Update">
    </form>
  </div>
</div>
<!-- /.card -->
</div>
</div>
</div><!-- /.container-fluid -->
</section>

<?php require("footer.php"); ?>