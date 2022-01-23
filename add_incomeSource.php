<?php 
require_once("header.php");
require_once("sidebar.php");

$db=$conn->query("SELECT * FROM `income_source`");

if(isset($_POST['name'])){
  $name=$_POST["name"];
  $status=$_POST["status"];
  
  $conn->query("INSERT INTO `income_source` (`name`, `status`) VALUES ('$name', '$status')");

  // header('location:add_incomeSource.php');
  

      ?>

  <script> 
      window.location.href="add_incomeSource.php";
   </script>

  <?php
  
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
           <!-- <h1>Add Income Source</h1> -->
           <form action="" method="post">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                 <label for="name">Name</label>
                 <input type="text" name="name" class="form-control" placeholder="Name">
               </div>
             </div>
             <div class="col-6">
              <div class="form-group">
               <label for="status">Select Status:</label>
               <select class="form-control" name="status" id="status" >
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
                
              </select>
            </div>
          </div>  
        </div>

        <input type="submit" class="btn btn-block btn-info mb-3" value="Save">

      </form>


      <!-- <h2>Income Source List</h2> -->
      <table class="table table-bordered text-center">
        <tr>
          <th>Name</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
        <tr>
          <?php 
          while($i=$db->fetch_assoc()){?>

            <td><?php echo $i['name'] ?></td>
            <td><?php echo $i['status'] ?></td>
            <td>
              <a href="update_incomeSource.php?id=<?php echo $i['id'] ?>" class="btn btn-xs btn-primary"><i class="fas fa-edit"></i></a>
              <a href="delete_incomeSource.php?id=<?php echo $i['id'] ?>" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></a>
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