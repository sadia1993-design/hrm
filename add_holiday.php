<?php 
require_once("header.php");
require_once("sidebar.php");
$conn->query("SELECT * FROM `holiday`")

?>



 <?php

if(isset($_POST['title'])){
  $name=$_POST['title'];
  $start=$_POST['start_date'];
  $end=$_POST['end_date'];
 $conn->query("INSERT INTO `holiday` (`title`, `start_date`, `end_date`) VALUES ('$name', '$start', '$end');");
 

  // header('location:holiday.php'); ?>
  
    <script> 
      window.location.assign("holiday.php");
     </script>
  
 <?php } ?>




<section class="content-header" >
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content" >
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Bordered Table</h3>
              </div>


    </div>
              <!-- /.card-header -->
              
                    <!-- <br>
                    <a href="dashboard.php" class="button-button-info">back</a> -->
                  </div>
                
             <div class="card-body" >
               <h1> holiday date</h1>
               <form action="" method="post">
                <table class="table table-bordered"style="hover:background-color:red;">
                  <tr>


                  <tr :hover {background-color:red;}>
                    <th>title</th>
                    <td>
                      <input type="text" name="title" class="from-control"> 

                      </td>
                     
                  <th>start date</th>
                  <td><input type="date" name="start_date" class="from-control"></td>
                  <th>end date</th>
                  <td><input type="date" name="end_date" class="from-control"></td>
                  <tr>
                  <td colspan="8">
        <input type="submit"  class="btn btn-block btn-primary" value="Save">
      </td>
      <tr>

    </table>
                </table>
                 




               </form> 

              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<?php require("footer.php"); ?>