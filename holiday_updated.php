<?php 
require_once("header.php");
require_once("sidebar.php");?>
<?php
$id=$_GET['ff'];
$holiday_row=$conn->query("SELECT * FROM `holiday` where holidayID=$id");
$haw=$holiday_row->fetch_assoc();

if(isset($_POST['title'])){
  $name=$_POST['title'];
  $start=$_POST['start_date'];
  $end=$_POST['end_date'];
  $conn->query("UPDATE `holiday` SET  `title` = '$name', `start_date` = '$start', `end_date` = '$end' WHERE `holiday`.`holidayID` = $id");


  // header("location:holiday.php"); ?> 
  <script> 
      window.location.assign("holiday.php");
     </script>
  


 <?php } ?>
<section class="content-header">
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
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Bordered Table</h3>

          </div>







        </div>
        <!-- /.card-header -->
        
        <br>
        <!-- <a href="dashboard.php" class="button-button-info">BACK</a> -->
      </div>
      
      <div class="card-body">
       <h1> HOLIDAY INFORMATION</h1>
       
       <form action="" method="post">
        <table class="table table-bordared table striped table-hover">
          <tr>
            <th>TITLE</th>
            <td>
              <input type="text" name="title" class="from-control" value="<?php echo $haw['title']
              ?>"> 

            </td>
            
            <th>START DATE</th>
            <td><input type="date" name="start_date" class="from-control" value="<?php echo $haw['start_date']?>"></td>
            <th>END DATE</th>
            <td><input type="date" name="end_date" class="from-control" value="<?php echo $haw['end_date']?>"></td>
            <tr>
              <td colspan="2">
                <input type="submit" class="btn btn-block btn-primary" value="Save">
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