<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<?php 
require_once("header.php");
require_once("sidebar.php");

if(isset($_POST['submit'])){
$cat_name=$_POST['cat_name'];
$status=$_POST['status'];
$conn->query("INSERT INTO `expense_category`(`category_name`, `status`) VALUES ('$cat_name','$status')");
}

$cat_data=$conn->query("SELECT * FROM expense_category");

// echo "<pre>";
// print_r($cat_data);

?>

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1></h1> -->
             <!-- <h2 class="">Expense Category</h2> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="add_emp.php">Home</a></li>
              <li class="breadcrumb-item"><a href="add_emp.php">Category Name</a></li>
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
               

              </div>
              <!-- /.card-header -->
              <div class="card-body">
  
        <!-- <a href="expense_catt.php" class="btn btn-sm btn-info  float-right">Add New</a> -->
       

       <form action="" method="post">
       <table class="table table-bordered table-striped table-hover">
        <tr>
          
          <th>Add Category Name</th>
          <td>
            <input type="text" name="cat_name" class="form-control">
          </td>
          <th>Status</th>
          <td>
            <input type="radio" name="status" value="active" checked><span>Active</span> |
            <input type="radio" name="status" value="inactive"><span>Inactive</span>

          </td>
          <td>
            <input type="submit" value="Save" name="submit" class="btn btn-sm btn-info">
          </td>
        </tr>
       
    </table> 
    </form>

    <h3 class="mt-5 text-center mb-3">Expense Categories</h3>

    <table class="table table-striped table-hover">
      <tr>
        <th>SL</th>
        <th>Category Name</th>
        <th>Status</th>
        <th>Action</th>
      </tr>

      <?php $sl=0; while($data=$cat_data->fetch_assoc()) { ?>
      <tr>
        <td><?php echo ++$sl; ?></td>
        <td><?php echo $data['category_name']; ?></td>
        <td><?php echo $data['status']; ?></td>
        <td>
          <a href="expense_catt_up.php?id=<?php echo  $data['id']; ?>" class="btn btn-sm btn-info fas fa-edit"></a>
          <a href="expense_catt_delete.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-danger fas fa-trash-alt"></a>
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


<style>
  table{
    text-align: center;
  }
</style>