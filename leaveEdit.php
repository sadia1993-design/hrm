<?php 
 $page = "Edit Leave Application";
 require_once("header.php");
 require_once("sidebar.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $edit_view = $conn->query("SELECT L.applicationID, employee.name , leave_type.typeID, leave_type.title, L.start_date, L.end_date, L.comment FROM `leave_application` AS L JOIN leave_type ON leave_type.typeID=L.typeID JOIN employee ON employee.empID=L.empID WHERE `applicationID`=$id");
   
    $edit_fetch = $edit_view->fetch_assoc();


    $edit_emp = $conn->query("SELECT * FROM employee");
    
}
  $allLeave =  $conn->query("SELECT * FROM `leave_type`");
?>

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $page; ?></li>
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
                <h3 class="card-title"><strong>Update Leave Info of <?php echo $edit_fetch['name']; ?></strong></h3>
              </div>
              <!-- /.card-header -->

              <div class="card-body">
                 <form action="" method="post">
                    <div class="row">
                       <div class="col">
                         <div class="form-group">
                            <label for="emp_name"> Employee Name</label>
                            <select class="form-control" name="emp_name" id="emp_name" readonly>
                               <?php 
                                  while($emp_all = $edit_emp->fetch_assoc() ) { ?>
                                    <option value="<?php echo $emp_all['empID']; ?>" <?php if( $emp_all['name'] == $edit_fetch['name']) { echo "Selected";} ?>  ><?php echo $emp_all['name']; ?></option>

                                <?php 
                                  }
                               ?>
                               
                            </select>
                         </div>
                       </div>
                    </div>
                    <div class="row">
                      <div class="col">
                         <input type="hidden" name="appId" id="appId" value="<?php echo $edit_fetch['applicationID']; ?>">
                         <div class="form-group">
                            <label for="leaveType"> Leave Type</label>
                            <select class="form-control" name="leaveType" id="leaveType">
                               <option value="<?php echo $edit_fetch['typeID']; ?>"><?php echo $edit_fetch['title']; ?></option>
                               <?php 
                                 while( $fetch_leave = $allLeave->fetch_assoc()){
                                    if($edit_fetch['typeID'] != $fetch_leave['typeID']){ ?>
                                        <option value="<?php echo $fetch_leave['typeID']; ?>"><?php echo $fetch_leave['title']; ?></option>
                                <?php
                                    }
                                 }
                               ?>
                            </select>
                         </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input class="form-control" type="date" name="start_date" id="start_date" value="<?php echo $edit_fetch['start_date']; ?>">
                         </div>
                      </div>
                      <div class="col">
                          <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input class="form-control" type="date" name="end_date" id="end_date" value="<?php echo $edit_fetch['end_date']; ?>">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                         <div class="col">
                            <div class="form-group">
                               <label for="reason">Reason For Leave</label>
                               <textarea class="form-control" name="reason" id="reason"  cols="30" rows="10"><?php echo $edit_fetch['comment']; ?></textarea>
                            </div>
                         </div>
                      </div>

                      <div class="row">
                         <div class="col">
                            <input type="submit" class="btn btn-block btn-info"  value="Update" >
                         </div>
                      </div>
                      
                    </div>
                 </form>
              </div>


            </div>
          </div>
        <!-- /.card -->
        </div>
      </div>
    </div><!-- /.container-fluid -->
</section>

<?php
    
    if(isset($_POST['appId'])){
        
        // Submitted form data
        $appId   = $_POST['appId'];
        $emp_name   = $_POST['emp_name'];
        $leaveType   = $_POST['leaveType'];
        $start_date  = $_POST['start_date'];
        $end_date= $_POST['end_date'];
        $reason= $_POST['reason'];

        $conn->query("UPDATE `leave_application` SET `typeID`='$leaveType',`start_date`='$start_date',`end_date`='$end_date',`comment`='$reason' WHERE `applicationID`=$appId");
    
   ?>
       <script>
          window.location.href= "leaveApplication.php";
       </script>
   <?php        
    }

    ?>
