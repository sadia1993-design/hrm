<?php
require_once("header.php");
require_once("sidebar.php");

if (isset($_GET['eid'])) {
  $eid = $_GET['eid'];
  $fetchTable = $conn->query("SELECT employee.empID ,employee.name, a.type, a.punch_time, a.attID FROM `attendance` AS a JOIN employee ON employee.empID = a.empID WHERE `attID`= $eid");
  $fetch_single = $fetchTable->fetch_assoc();
}

   $attendance_table = $conn->query("SELECT * FROM `attendance` ORDER BY `attID` LIMIT 2");
?>


<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Employee Attendance</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Employee Attendance Tables</li>
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
            <h3 class="card-title mb-0 text-info"><strong> Update  Attendance Details of <?php if(isset($fetch_single['name'])) {echo $fetch_single['name'];}  ?></strong></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

            <form action="" method="post">

              <!-- Employee ID Start -->

              <div class="form-group row">
                <input class="form-control" type="hidden" id="attendance_id" name="attendance_id" value="<?php echo $fetch_single['attID']; ?>">
                <label for="employee_name" class="col-sm-3 col-form-label"> Employee Name </label>
                <div class="col-sm-5">
                  <input class="form-control" type="text" id="employee_name" name="employee_id" value="<?php if(isset($fetch_single['name'])) {echo $fetch_single['name'];}   ?>" readonly>
                </div>

              </div>

              <!-- Employee ID end******* -->

              <!-- Type Intime and Outtime start -->

              <div class="form-group row">
                <label for="INoUT" class="col-sm-3 col-form-label"> In-time & Out-time </label>

                <div class="col-sm-5">
                  <select name="in_out" class="form-control  ">
                      <option value="<?php echo $fetch_single['type']; ?>"><?php if(isset($fetch_single['type'])) {echo $fetch_single['type'];}   ?></option>
                    
                    <?php
                        
                        while( $all_attendance = $attendance_table->fetch_assoc()){
                          if($fetch_single['type'] != $all_attendance['type']){ ?>
                              <option value="<?php echo $all_attendance['type'] ?>"><?php if(isset($all_attendance['type'])) { echo $all_attendance['type'];} ?></option>
                        <?php
                            }
                        }
                        
                    ?>

                  </select>
                </div>

              </div>


              <!-- Type Intime and Outtime end***** -->

              <!-- Punch Time Start -->

              <div class="form-group row">

                <label for="punch_time" class="col-sm-3 col-form-label">Punch Time</label>

                <div class="col-sm-5">
                  <input type="datetime-local" name="punch_time" value="<?php echo date('Y-m-d\TH:i', strtotime($fetch_single['punch_time']));  ?>" class="form-control datetimepicker">
                </div>


              </div>



              <div class="form-group row">
                <label class="col-sm-3 col-form-label"></label>

                <div class="col-sm-5 text-right">
                  <button type="submit" class="btn btn-info w-md m-b-5">Update</button>
                </div>
              </div>


            </form>

                  <?php

                      //updated query
                      if (isset($_POST['attendance_id'])) {

                        $attendance_id = $_POST['attendance_id'];
                        $in_out = $_POST['in_out'];
                        $punch_time = $_POST['punch_time'];

                       

                        $conn->query("UPDATE `attendance` SET `type`='$in_out',`punch_time`='$punch_time' WHERE attendance.attID = $attendance_id"); 
                        
                        ?>

                        <script>
                          window.location.href = "attendance.php";
                        </script>
                      
                      <?php
                      }
                  ?>

            <hr style="border:1px solid lightgreen">
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<?php require("footer.php"); ?>