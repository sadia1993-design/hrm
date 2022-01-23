<?php 
require_once("header.php");
require_once("sidebar.php");


$att_data=$conn->query("SELECT * FROM employee");

              
 ?>   


<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Attendance Details</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Attendance Details Tables</li>
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
            <h3 class="card-title mb-0 text-green"><strong>Attendance History</strong></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
           
                <!-- Attendance ID Start -->


                      <!--  Details Table code Start -->

                      <div class="panel-body">
                        <div class="table-responsive">

                          <table width="100%" class="table table-striped table-bordered table-hover" style="text-align:center">
                            <tbody>

                              <tr>
                                
                                <th>Serial</th>
                                <th title="">Employee Name</th>
                                <th title="">Action</th>
                              </tr>

                              <?php

                                 $i=1;
                                 while ($value=$att_data->fetch_assoc()) { ?>


                                    <tr>
                                      <td> <?php echo $i++ ?></td>

                                      <td> <?php echo $value['name'] ?> </td>
                                      <td>

                                        <a title="See Details"  class=" btn btn-sm  btn-info " href="attendance_log.php?empid=<?php if( isset($value['empID'])) {echo $value['empID'];} ?>"><i class="fas fa-info-circle"></i></a>
                                        
                                      </td>
                                    </tr>

                              <?php 
                                 }
                                 

                              ?>
                                 
     
                              </tbody></table>
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