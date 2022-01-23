    <?php 
    require_once("header.php");
    require_once("sidebar.php");


    $emp=$conn->query("SELECT `empID`,`name`FROM `employee`");
    $date=date('Y-m-d');
    // echo "<pre>";
    // print_r($emp);

    // For searching

    if(isset($_POST['search'])){
    $date=$_POST['search_date'];

  }


    ?>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1></h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="add_emp.php">Home / Daily Report</a></li>
              <!-- <li class="breadcrumb-item active"></li> -->
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
                  <h2 class="mt-2" style="text-align: center; color: green">Daily Attendance Report</h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">


                <form action="" method="post">
          <input type="date" name="search_date" class="form-control" placeholder="Search by employee date">

          <input type="submit" name="search" value="Search" class="btn btn-sm btn-info mt-2">
          <br>
          
        </form>


             


               <table class="table table-striped table-hover">
                <tr>
                  <th>SL</th>
                  <!-- <th>Employee ID</th> -->
                  <th>Name</th>
                  <th>In Time</th>
                  <th>Out Time</th>
                  <th>Status</th>
                </tr>

                

                <?php 

                $sl=0; while ($emp_data=$emp->fetch_assoc()) { 
                  $id=$emp_data['empID'];

                  $in=$conn->query("SELECT * FROM `attendance` WHERE empID= $id AND type='in_time' AND punch_time like '$date%' ORDER BY punch_time ASC limit 1");

                  $out=$conn->query("SELECT * FROM `attendance` WHERE empID= $id AND type='out_time' AND punch_time like '$date%' ORDER BY punch_time DESC limit 1");


                  $in_time=$in->fetch_assoc();
                  $out_time=$out->fetch_assoc();


                  $t=explode(' ', @$in_time['punch_time']);
                  $o=explode(' ', @$out_time['punch_time']);


                  ?>  

                  <tr>
                    <td><?php echo ++$sl; ?></td>
                    <!-- <td><?php //echo $emp_data['empID']; ?></td> -->
                    <td><?php echo $emp_data['name']; ?></td>
                    <td><?php if(isset($t[1])){echo $t[1]; } ?></td>
                    <td><?php if(isset($o[1])){echo $o[1]; } ?></td>

                    <td>
                      <?php 
                      
                      if(isset(($t[1]))){
                        if (strtotime($t[1])<=strtotime('9:00') && strtotime($o[1])>=strtotime('16:00') ) {

                          echo "Present";
                        }else{
                          echo "Absent";
                        } 
                      }
                      ?>
                    </td>
                  </tr>
                <?php } ?>



              </table>



            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <?php require("footer.php"); ?>