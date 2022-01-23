<?php 
require_once("header.php");
require_once("sidebar.php");

$id=$_GET['id'];
 $cat_up = $conn->query("SELECT * FROM expense_category WHERE id=$id");
 $result = $cat_up->fetch_assoc();

 // echo "<pre>";
 // print_r($result);


if(isset($_POST['submit'])){
$cat_name=$_POST['name'];
$status=$_POST['status'];

$conn->query("UPDATE `expense_category` SET `category_name`='$cat_name',`status`='$status' WHERE id=$id");

  // header('Location: expense_catt.php');

  ?>

    <script> 
      window.location.assign("expense_catt.php");
     </script> 

 <?php   }  ?>
     
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="add_emp.php">Home</a></li>
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
              <!-- /.card-header -->
              <div class="card-body">
  
        <a href="expense_catt.php" class="btn btn-sm btn-info  float-right">Add New</a>
       <h3 class="mt-3"> Update the Expense Category</h3>

       <form action="" method="post">
       <table class="table table-bordered table-striped table-hover">
        <tr>
          
          <th>Category Name</th>
          <td>
            <input type="text" name="name" class="form-control" value="<?php echo $result['category_name']?>">
          </td>


          <th>Status</th>
          <td>
            <input type="radio" name="status" value="active"<?php if($result['status']==='active'){ echo "checked"; } ?>><span>Active</span> |
            <input type="radio" name="status" value="inactive" <?php if($result['status']==='inactive'){ echo "checked"; } ?> ><span>Inactive</span>

          </td>


          <td>
            <input type="submit" value="Save" name="submit" class="btn btn-sm btn-info">
          </td>
        </tr>
       
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

<!-- 
<style>
  table{
    text-align: center;
  }
</style> -->