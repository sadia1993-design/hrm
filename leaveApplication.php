<?php

$page = "Leave Application";
require_once("header.php");
require_once("sidebar.php"); ?>

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
            <h3 class="card-title text-bold" style="padding-top: 9px;">All applied leave status</h3>
            <div style="text-align: right;">
              <a href="add_leave_app.php" class="btn btn-md btn-info"><i class="fas fa-plus"></i> Add Leave</a>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <!--form section -->

            <table class="table table-bordered table-hover table-striped  " id="leaveApplyTable" style="text-align: center;">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Leave Type</th>
                  <th> Start Date</th>
                  <th> End Date</th>
                  <th>Reason For leave</th>
                  <th>Apply Day</th>
                  <th>Leave Status</th>
                  <th>Action</th>
                </tr>
              </thead>

              <?php
              $i = 0;
              $all_leave = $conn->query("SELECT L.applicationID  ,employee.name AS EmployeeName, leave_type.title, leave_type.allowed_leave, L.start_date, L.end_date, L.comment, L.status, L.empID, L.typeID FROM `leave_application` AS L JOIN employee ON employee.empID = L.empID JOIN leave_type ON leave_type.typeID = L.typeID order by L.applicationID DESC");
              $all_fetch = $all_leave->fetch_all();
              foreach ($all_fetch as $key => $value) { ?>
                <tr>
                  <td class="align-middle"><?php echo $value[1]; ?></td>
                  <td class="align-middle"><?php echo $value[2]; ?></td>
                  <td class="align-middle"><?php echo $value[4]; ?></td>
                  <td class="align-middle"><?php echo $value[5]; ?></td>
                  <td class="align-middle"><?php echo $value[6]; ?></td>
                  <td class="align-middle">
                    <?php
                    $diff = abs(strtotime($value[5]) - strtotime($value[4]));
                    $years = floor($diff / (365 * 60 * 60 * 24));
                    $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                    $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

                    echo $days;
                    ?>
                  </td>

                  <td class="text-bold pt-4">
                    <div class="status<?php echo $value[0]; ?>">
                      <?php
                      if ($value[7] == 'applied') {
                        echo  "applied";
                      }
                      if ($value[7] == "approved") {
                        echo "Approved";
                      }
                      if ($value[7] == "rejected") {
                        echo "<b>Rejected</b>";
                      }
                      ?>
                    </div>



                    <?php
                    if ($_SESSION['name'] == "admin") {
                      if ($value[7] == "approved") { ?>
                        <button type="button" class="btn btn-xs btn-danger mt-2" onclick="reject_<?php echo $value[0]; ?>()" title="Reject">
                          <i class="fas fa-ban"></i>
                        </button>
                      <?php
                      }
                      if ($value[7] == "rejected") { ?>
                        <button type="button" class="btn btn-xs btn-info mt-2 " onclick="approve_<?php echo $value[0]; ?>()" title="Approve">
                          <i class="fas fa-paper-plane"></i>
                        </button>

                      <?php
                      }

                      if ($value[7] == "applied") { ?>
                        <button type="button" class="btn btn-xs btn-danger mt-2" onclick="reject_<?php echo $value[0]; ?>()" title="Reject">
                          <i class="fas fa-ban"></i>
                        </button>
                        <button type="button" class="btn btn-xs btn-info mt-2 " onclick="approve_<?php echo $value[0]; ?>()" title="Approve">
                          <i class="fas fa-paper-plane"></i>
                        </button>

                    <?php
                      }
                    }
                    ?>


                    <script>
                      function approve_<?php echo $value[0]; ?>() {

                        var status = "approve";
                        var appId = "<?php echo $value[0]; ?>";
                        window.location.href = 'leaveApplication.php?status' + appId + '=' + status + '&appid=' + appId;
                      }

                      function reject_<?php echo $value[0]; ?>() {
                        var status = "reject";
                        var appId = "<?php echo $value[0]; ?>";
                        window.location.href = 'leaveApplication.php?status' + appId + '=' + status + '&appid=' + appId;
                      }
                    </script>
                    <?php
                    $status = 'status' . $value[0];
                    if (isset($_GET[$status])) {
                      $stat = $_GET[$status];
                      $id = $_GET['appid'];
                      if ($stat == 'approve') {
                        $conn->query("UPDATE `leave_application` SET `status` ='Approved'  WHERE `applicationID`=$id");
                        echo '<script>window.location="leaveApplication.php"</script>';
                      } elseif ($stat == 'reject') {
                        $conn->query("UPDATE `leave_application` SET `status` ='Rejected'  WHERE `applicationID`=$id");
                        echo '<script>window.location="leaveApplication.php"</script>';
                      } else {
                        $conn->query("UPDATE `leave_application` SET `status` ='Applied'  WHERE `applicationID`=$id");
                        echo '<script>window.location="leaveApplication.php"</script>';
                      }
                    }
                    ?>


                  </td>
                  <td class="align-middle">

                    <?php
                    if ($_SESSION['name'] !== "admin") { ?>

                      <a href="" title="preview" class=" btn btn-sm mt-2 btn-primary"> <i class="fas fa-eye"></i></a>
                      <a href="leaveApplicationEdit.php?eid=<?php echo $value[0]; ?>" title="Edit Leave" class=" btn btn-xs mt-2 btn-info"> <i class="fas fa-edit"> </i></a>
                      <a href="leaveApplication.php?id=<?php echo $value[0]; ?>" onclick="return confirm('are you sure?')" title="Delete" class="btn btn-xs mt-2 btn-danger"> <i class="fas fa-trash"> </i></a>

                    <?php
                    } else { ?>

                      <a href="view.php?id=<?php echo $value[8]; ?>&status=<?php echo $value[7]; ?>&leaveType=<?php echo $value[9]; ?>" title="preview" class=" btn btn-xs mt-2 btn-primary"> <i class="fas fa-eye"></i></a>
                      <a href="leaveApplication.php?id=<?php echo $value[0]; ?>" onclick="return confirm('are you sure?')" title="Delete" class="btn btn-xs mt-2 btn-danger"> <i class="fas fa-trash"> </i></a>

                    <?php
                    }

                    ?>

                  </td>
                </tr>

              <?php
              }

              //delete query
              if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $conn->query("DELETE FROM `leave_application` WHERE `applicationID` = $id"); ?>
                <script>
                  window.location.href = "leaveApplication.php";
                </script>

              <?php
              }
              ?>


            </table>

          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>


<?php require("footer.php"); ?>

<script>
  $(document).ready(function() {
    $('#leaveApplyTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "lengthMenu": [
        [5, 25, 50, -1],
        [5, 25, 50, "All"]
      ]
    });
  });
</script>