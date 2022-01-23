<?php
require_once("header.php");
require_once("sidebar.php");

$data = $conn->query("SELECT * FROM `attendance`");
$emp_name = $conn->query("SELECT * FROM employee");



?>



<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h4>Employee Attendance</h4>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Attendance Tables</li>
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
            <!-- <h3 class="card-title mb-0">Employee Attendance Details</h3> -->
          </div> <!-- /.card-header -->

          <div class="card-body">

            <form action="" method="post">

              <!-- Employee ID Start -->
              <div class="form-group row">

                <label class="col-sm-3 col-form-label"> Employee Name </label>
                <div class="col-sm-4">
                  <select name="employee_name" class="form-control mb-3">
                  <option value="">Select Employee</option>
                    <?php
                    
                    $fetch_emp = $emp_name->fetch_all();
                    foreach ($fetch_emp as $key => $value) {  ?>
                      <option value="<?php echo $value[0]; ?>"><?php echo $value[2]; ?></option>

                    <?php
                    }

                    ?>
                  </select>
                </div>
              </div>
              <!-- Employee ID end -->

              <!-- Type Intime and Outtime start -->
              <div class="form-group row">
                <label class="col-sm-3 col-form-label"> In-time or Out-time </label>

                <div class="col-sm-5">

                  <input type="radio" name="checking_type" value="in_time"> In Time
                  <input type="radio" name="checking_type" value="out_time"> Out Time

                </div>
              </div>
              <!-- Type Intime and Outtime end***** -->

              <!-- Punch Time Start -->

              <div class="form-group row">
                <label for="intime" class="col-sm-3 col-form-label">Punch Time</label>
                <div class="col-sm-4">
                  <input type="datetime-local" name="punch_time" class="form-control datetimepicker">
                </div>
              </div>

              <!-- Punch Time end****** -->

              <!-- submit -->
              <div class="form-group row">
                <label class="col-sm-3 col-form-label"></label>
                <div class="col-sm-4 text-right">
                  <input type="submit" value="Check In" class="btn btn-info w-md m-b-5">
                </div>
              </div>
              <!-- submit end-->

            </form>
            <hr>

            <?php
            //insert query
            if (isset($_POST['employee_name'])) {
              $employee_name = $_POST['employee_name'];
              $employee_inOutType = $_POST['checking_type'];
              $employee_punch_time = $_POST['punch_time'];

              $c = $conn->query("INSERT INTO attendance ( `empID`, `type`, `punch_time` ) values ( '$employee_name', '$employee_inOutType', '$employee_punch_time' )");
            ?>
              <script>
                window.location.href = "attendance.php";
              </script>
            <?php
            }

            ?>

            <!--  Details Table code Start -->
            <div class="panel-body">
              <div class="table-responsive">
                <table width="100%" class="table table-striped table-bordered table-hover text-center ">
                  <tbody>
                    <tr>
                      <th colspan="7" class="text-center">Attendance History </th>
                    </tr>

                    <tr>
                      <th>Serial</th>
                      <th>Employee Name</th>
                      <th>Type In-time & Out-time</th>
                      <th>Punch Time</th>
                      <th>Action</th>
                    </tr>

                    <?php
                    $emp_join = $conn->query("SELECT employee.name , attendance.type, attendance.punch_time, attendance.attID FROM attendance JOIN employee ON employee.empID = attendance.empID");
                    $fetch = $emp_join->fetch_all();
                    $i = 1;
                    foreach ($fetch as $key => $value) { ?>
                      <tr>
                        <td class="align-middle"> <?php echo $i++ ?></td>
                        <td class="align-middle"> <?php echo $value[0] ?></td>
                        <td class="align-middle"> <?php echo $value[1] ?></td>
                        <td class="align-middle"> <?php echo $value[2] ?></td>
                        <td>
                          <a class=" btn btn-sm  btn-info " href="atten_edit.php?eid=<?php echo $value[3]; ?>"><i class="fas fa-edit"></i></a> |
                          <a class=" btn btn-sm btn-danger" href="attendance.php?id=<?php echo $value[3]; ?>" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
                        </td>
                      </tr>

                    <?php
                    }


                    //delete quary
                    if (isset($_GET['id'])) {

                      $del_id = $_GET['id'];
                      $del = $conn->query("DELETE FROM attendance where attID=$del_id"); ?>

                      <script>
                        window.location.href = "attendance.php";
                      </script>

                    <?php }  ?>


                  </tbody>
                </table>
              </div>
            </div>
            <!--  Details Table code end -->

          </div><!-- /.card-body -->
        </div>
      </div> <!-- /.col-12 -->
    </div> <!-- /.row -->
  </div> <!-- /.container fluid -->
</section> <!-- /.content -->

<?php require("footer.php"); ?>