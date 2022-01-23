<?php 
require_once("header.php");
require_once("sidebar.php");

$id=$_GET['id'];
$edit=$conn->query("SELECT * FROM `income_source` WHERE id=$id");
$e=$edit->fetch_assoc();

   // echo "<pre>";
   // print_r($e);

if(isset($_POST['name'])){
  $name=$_POST["name"];
  $status=$_POST["status"];

  $conn->query("UPDATE `income_source` SET `name` = '$name', `status` = '$status' WHERE `income_source`.`id` = '$id'");

  header('location:add_incomeSource.php');
  
}
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Income Source</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Income Source</li>
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
            <h3 class="card-title">Income Source</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
           <h1>Update Income Source</h1>
           <form action="" method="post">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                 <label for="name">Name</label>
                 <input type="text" name="name" value=" <?php echo $e['name'] ?> " class="form-control" placeholder="Name">
               </div>
             </div>
             <div class="col-6">
              <div class="form-group">
               <label for="status">Select Status:</label>
               <select class="form-control" name="status" id="status" >
                <option value="active">active</option>
                <option value="inactive">inactive</option>
                
              </select>
            </div>
          </div> 
        </div>

        <input type="submit" class="btn btn-block btn-info" value="Submit">

      </form>
    </div>
  </div>
  <!-- /.card -->
</div>
</div>
</div><!-- /.container-fluid -->
</section>

<?php require("footer.php"); ?>