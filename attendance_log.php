<?php
require_once("header.php");
require_once("sidebar.php");

if(isset($_GET['empid'])){

  $empid = $_GET['empid'];

  $att = $conn->query("SELECT `attID`, attendance.`empID`, employee.name ,`type`,`punch_time` FROM `attendance` JOIN employee ON employee.empID= attendance.empID WHERE attendance.`empID`=$empid");

  $att_select = $conn->query("SELECT `attID`, attendance.`empID`, employee.name ,`type`,`punch_time` FROM `attendance` JOIN employee ON employee.empID= attendance.empID WHERE attendance.`empID`=$empid");
  $att1 = $att_select->fetch_assoc();

}
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Attendance Login Time</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Attendance Login Tables</li>
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
            <h3 class="card-title mb-0 text-green"><strong>Attendance Log Details of  <?php if(isset($att1['name'])) {echo $att1['name'];} ?></strong></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

            <!--  Details Table code Start -->

            <div class="panel-body">
              <div class="table-responsive">
                <table width="100%" class="table table-striped table-bordered table-hover" style="text-align:center">
                    <thead>
                      <tr>
                        <th colspan="7" class="text-center">Attendance History </th>
                      </tr>

                      <tr>
                        <th>Serial</th>
                        <th>Name</th>
                        <th>Punch Time</th>
                        <th>Type</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>
                       <?php 
                        $i=1;
                        if(isset ($att)){
                         while($att2 = $att->fetch_assoc()){                          
                         ?>
                           <tr>

                              <td class="align-middle"><?php echo $i++; ?></td>
                              <td class="align-middle"><?php echo $att2['name']; ?></td>
                              <td class="align-middle"><?php echo date('m/d/Y h:i:s a ', strtotime($att2['punch_time'])); ?></td>
                              <td class="align-middle"><?php echo $att2['type']; ?></td>
                              <td class="align-middle">

                               <!--  <a href="attendance_log_edit.php?editId=<?php if(isset($att2['attID'])) {echo $att2['attID'];} ?>&emp_id=<?php echo $att2['empID']; ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>  -->                           
                                
                                <a href="attendance_log_delete.php?delid=<?php if(isset($att2['attID'])) {echo $att2['attID'];} ?>&emp_id=<?php echo $att2['empID']; ?>" onclick="return confirm('Are You sure to delete this data?')" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                                
                              </td>
                            </tr>
                    
                      <?php

                         }
                        }

                         
                       ?>
                       
                    </tbody>
                </table>
              </div>
            </div>

          </div>

        </div>
        <!-- /.card -->
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<?php require("footer.php"); ?>