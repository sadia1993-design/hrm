<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<?php 
require_once("header.php");

require_once("sidebar.php");

$qq=$conn->query("SELECT * FROM employee");

?>

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1></h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="add_emp.php">Home / Employee List</a></li>
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
                <!-- <h3 class="card-title">Bordered Table</h3> -->

              </div>
              <!-- /.card-header -->
              <div class="card-body">
  
        <a href="add_emp.php" class="btn btn-sm btn-info  float-right">Add New</a>
       <h2 class="text-center">Employee List</h2>

       
      
   <table class="table table-bordered table-striped table-hover">
      <tr>
        <th>SL</th>
        <th>Name</th>
        <th>Designation</th>
        
        <th>Phone</th>
        <th>Email</th>
        <th>Action</th>
        </tr>

   <?php $sl=0; while($q=$qq->fetch_assoc()){ ?>     
      <tr>
        <td><?php echo ++$sl; ?></td>
        <td><?php echo $q['name']; ?></td>
       <td><?php echo $q['designation']; ?></td>
        
        <td><?php echo $q['phone']; ?></td>
        <td><?php echo $q['email']; ?></td>
        <td>
          <a href="emp_cv.php?id=<?php echo $q['empID'] ?>" class="btn btn-sm btn-info fas fa-info-square"></a>
          <a href="update_emp.php?id=<?php echo $q['empID'] ?>" class="btn btn-sm btn-info fas fa-edit"></a>
          <a href="delete_emp.php?id=<?php echo $q['empID'] ?>" class="btn btn-sm btn-danger fas fa-trash-alt" onclick="return confirm('Are you sure to delete?')"></a>
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

