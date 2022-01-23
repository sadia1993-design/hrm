<?php 
require_once("header.php");
require_once("sidebar.php");

 $id=$_GET['id'];
 $details=$conn->query("SELECT * FROM `employee` WHERE empID=$id");
 $result=$details->fetch_assoc();
 ?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1></h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="add_emp.php">Home</a></li>
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
               <h3 style="text-align: center; color: green">Details of the employee</h3>          

<table class="table table-bordered table-striped table-hover">
  <tr>
  <th>Employee ID</th>
  <th>Gender</th>
   <th>Department</th>
   <th>DOB</th>
  <th>Basic Salary</th>
  <th>Address</th>
  <th>Hire Date</th>
  <th>Photo</th>
  <th>Action</th> 
 
</tr>
<tr>
  <td><?php echo $result['empID']; ?></td>
  <td><?php echo $result['gender']; ?></td>
  <td><?php echo $result['dptID']; ?></td>
  <td><?php echo $result['dob']; ?></td>
  <td><?php echo $result['basic_salary']; ?></td>
  <td><?php echo $result['address']; ?></td>
  <td><?php echo $result['hire_date']; ?></td>
  <td><?php echo $result['photo']; ?></td>
  <td>
    <a href="view_emp.php" class="btn btn-sm btn-info">Go Back</a>
  </td>
  
</tr>
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