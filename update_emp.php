<?php 
require_once("header.php");
require_once("sidebar.php");

$id=$_GET['id'];
 $details=$conn->query("SELECT * FROM `employee` WHERE empID=$id");
 $result=$details->fetch_assoc();
 // echo "<pre>";
 // print_r($result);
 $dpt=$conn->query("SELECT * FROM department");

 if(isset($_POST['submit'])){
  $dptID=$_POST['dptID'];
  $name=$_POST['name'];
   $email=$_POST['email'];
   $phone=$_POST['phone'];
   $dob=$_POST['dob'];
   $gender=$_POST['gender'];
   $address=$_POST['address'];
   // $photo=$_FILES['photo']['name'];

   $file_name=date('Y-m-d-h-i-s').basename($_FILES['photo']['name']);
   $file='./uploads/'.$file_name;
   move_uploaded_file($_FILES['photo']['tmp_name'],$file);
  
  $hire_date=$_POST['hire_date'];
  $designation=$_POST['designation'];
  $basic_salary=$_POST['basic_salary'];
  $password=$_POST['password'];

  
if ($_FILES['photo']['name']) {
  $ss=$conn->query("UPDATE `employee` SET `dptID`='$dptID',`name`=' $name',`email`='$email',`phone`='$phone',`dob`='$dob',`gender`='$gender',`address`='$address',`photo`='$file_name',`hire_date`='$hire_date',`designation`='$designation',`basic_salary`='$basic_salary',`password`=' $password' WHERE empID=$id");
}else{
  $ss=$conn->query("UPDATE `employee` SET `dptID`='$dptID',`name`=' $name',`email`='$email',`phone`='$phone',`dob`='$dob',`gender`='$gender',`address`='$address',`hire_date`='$hire_date',`designation`='$designation',`basic_salary`='$basic_salary',`password`=' $password' WHERE empID=$id");
   
};

   // header('location: view_emp.php');
                   
      if( $ss == true ){
        echo "info";
      }
      else{
        echo "failed";
      } ?>

        <script> 
      window.location.assign("view_emp.php");
     </script> 
         
 <?php } ?>   


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
               <h3>Update <?php echo $result['name'] ?>'s information</h3>
               <br> 
               
               <form action="" method="post" enctype="multipart/form-data">
              <table class="table table-bordered table-striped table-hover">

              <tr>
                    <th>Department ID</th>
                    <td>

                      <select name="dptID"  class="form-control">
                        <option value="">Select Department</option>

                        <?php while($d=$dpt->fetch_assoc()) { ?>
                        <option value="<?php echo $d['dptID'] ?>" <?php if($d['dptID']==$result['dptID']){ echo "selected";} ?>><?php echo $d['dptName']; ?></option>
                      <?php } ?>
                      </select>

                    </td>
                    <th>Name</th>
                    <td>
                      <input type="text" name="name" class="form-control" value="<?php echo $result['name']?>">
                    </td>
              </tr>
              <tr>
                    <th>Email</th>
                     <td>
                      <input type="email" name="email" class="form-control" value="<?php echo $result['email']?>">
                    </td>
                    <th>Phone</th>
                    <td>
                      <input type="text" name="phone" class="form-control" value="<?php echo $result['phone']?>">
                    </td>
             </tr>
               <tr>      
                    <th>Date of Birth</th>
                    <td>
                      <input type="date" name="dob" class="form-control" value="<?php echo $result['dob']?>">
                    </td>
                    <th>Gender</th>
                    <td>
                      <input type="text" name="gender" class="form-control" value="<?php echo $result['gender']?>">
                     
                    </td>
              </tr>

              <tr>
                    <th>Address</th>
                    <td>
                      <input type="text" name="address" class="form-control" value="<?php echo $result['address']?>">
                    </td>
                    <th>Photo</th>
                    <td>
                    <input type="file" name="photo" class="form-control" value="<?php echo $result['photo']?>">
                    </td>
              </tr>
              <tr>
                    <th>Hire Date</th>
                    <td>
                      <input type="date" name="hire_date" class="form-control" value="<?php echo $result['hire_date']?>">
                    </td>
                    <th>Designation</th>
                    <td>
                      <input type="text" name="designation" class="form-control" value="<?php echo $result['designation']?>">
                    </td>
              </tr>

             
              <tr> 
                  <th>Basic Salary</th>
                  <td>
                      <input type="text" name="basic_salary" class="form-control" value="<?php echo $result['basic_salary']?>">
                    </td>
                  <th>Password</th>
                  <td>
                      <input type="password" name="password" class="form-control" value="<?php echo $result['password']?>">
                    </td>
              </tr>
              <tr> 
                <td colspan="8">
                <input type="submit" name="submit" value="Save" class="btn btn-block btn-info">
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


<style>
  table{
    text-align: center;
  }
</style>