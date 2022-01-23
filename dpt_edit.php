<?php 
require_once("header.php");
require_once("sidebar.php");
$id=$_GET['id'];
$s=$conn->query("SELECT * FROM `department` WHERE dptID=$id");
$st=$s->fetch_assoc();

if(isset($_POST['office_department'])){

$rs=$_POST['office_department'];
$conn->query("UPDATE `department` SET `dptName` = '$rs' WHERE `dptID` = $id");?>
<script>
  window.location.href="department.php";
</script>
<?php

}


?>
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
                <h3 class="card-title">Update Department</h3>
              </div>
              <!-- /.card-header -->

             
              <div class="card-body">
                 <form action="" method="post">
                  <input type="text" name="office_department" class="form-control" value=" <?php echo   $st['dptName'] ?>"placeholder="enter department name">
                 
                  <br>
                  <input type="Submit" value="Submit"class="btn btn-info"> <br>
                 </form>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<?php require("footer.php"); ?>