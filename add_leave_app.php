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
          <li class="breadcrumb-item active">Leave Application</li>
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
            <h2 class="card-title">Leave Application Form</h2>
            <div style="text-align: right;">

            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <?php
            if (isset($_POST['emp_name'])) {
              $emp_name = $_POST['emp_name'];
              $emp_leaveType = $_POST['emp_leaveType'];
              $start_date = $_POST['start_date'];
              $end_date = $_POST['end_date'];
              $comment = $_POST['comment'];

              // echo "<pre>";
              // var_dump($emp_name);

              $conn->query("INSERT INTO `leave_application`( `empID`, `typeID`, `start_date`, `end_date`, `comment`) VALUES ('$emp_name','$emp_leaveType','$start_date','$end_date','$comment')");

            ?>

              <script type="text/javascript">
                window.location.href = "add_leave_app.php";
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
                      <option value="">Select Employee</option>
                      <?php
                      $emp_table = $conn->query("SELECT *  FROM `employee`");

                      while ($emp_data = $emp_table->fetch_assoc()) { ?>
                        <option value="<?php echo $emp_data['empID']; ?>"><?php echo $emp_data['name']; ?></option>
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
                      <option value="">Select Leave Type</option>
                      <?php
                      $emp_leave_type = $conn->query("SELECT *  FROM `leave_type`");

                      while ($leaveType_data = $emp_leave_type->fetch_assoc()) {  ?>

                        <option value="<?php echo $leaveType_data['typeID']; ?>"><?php echo $leaveType_data['title']; ?></option>

                      <?php }  ?>
                    </select>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" class="form-control" name="start_date" id="start_date">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="date" class="form-control" name="end_date" id="end_date">
                  </div>
                </div>
              </div>
              <!--textarea-->
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label for="reason_leave">Comment</label>
                    <textarea class="form-control" placeholder="Comment" name="comment" id="" cols="30" rows="10"></textarea>
                  </div>
                </div>
              </div>
              <!-- submit -->
              <input type="submit" class="btn btn-block btn-info" value="Submit">
            </form>

            <hr>

            <h3 class="mt-5 mb-5 text-center">Leave Application List</h3>
            <table class="table table-bordered" id="leaveTable">
              <thead>
                <tr>
                  <th>Employee Name</th>
                  <th>Leave Type</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Comment</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>

              <?php
              $add = $conn->query("SELECT leave_application.applicationID,employee.name,leave_type.title,start_date,end_date,comment, status FROM `leave_application` JOIN employee ON employee.empID=leave_application.empID JOIN leave_type ON leave_type.typeID=leave_application.typeID");

              $color = "";
              while ($i = $add->fetch_assoc()) {
                if ($i['status'] == "applied") {
                  $color = "yellow";
                } elseif ($i['status'] == "approved") {
                  $color = "green";
                } else {
                  $color = "red";
                }

              ?>
                <tr>
                  <td><?php echo $i['name'] ?></td>
                  <td><?php echo $i['title'] ?></td>
                  <td><?php echo $i['start_date'] ?></td>
                  <td><?php echo $i['end_date'] ?></td>
                  <td><?php echo $i['comment'] ?></td>
                  <td class="text-<?= $color; ?> font-weight-bold"><?php echo $i['status'] ?></td>
                  <td>
                    <a href="update_leave_app.php?id=<?php echo $i['applicationID'] ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                    <a href="delete_leave_app.php?id=<?php echo $i['applicationID'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
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
    $('#leaveTable').DataTable({
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