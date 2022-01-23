<?php 
require_once("header.php");
require_once("sidebar.php");
$id=$_GET['id'];
$data=$conn->query("SELECT * FROM `candidate` WHERE id=$id");
$d=$data->fetch_assoc();
// print_r($d);


if(isset($_POST['name'])){ 
  $idd=$_POST['id'];
  $name=$_POST['name'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $address=$_POST['address'];
  $photo=$_FILES['photo']["name"];
  $dob=$_POST['dob'];
  $gender=$_POST['gender'];
  // $shortlisted=$_POST['shortlisted'];

  $target_file=date('Y-m-d-h-i-s').basename($_FILES["photo"]["name"]);
  $target="./assets/images/".$target_file;
move_uploaded_file($_FILES["photo"]["tmp_name"], $target);


if($_FILES["photo"]["name"]){
  $insert=$conn->query("UPDATE `candidate` SET `name` = '$name', `email` = '$email', `phone` = '$phone', `address` = '$address', `photo` = '$target_file', `dob` = '$dob', `gender` = '$gender' WHERE `candidate`.`id` = $idd");
}else{
  $insert=$conn->query("UPDATE `candidate` SET `name` = '$name', `email` = '$email', `phone` = '$phone', `address` = '$address',`dob` = '$dob', `gender` = '$gender' WHERE `candidate`.`id` = $idd");
}
  // $fetch_data =$candidate->fetch_assoc();
  
  // echo'<pre>';  
  // print_r($candidate);?>

   <script>
      window.location.href ="candidate.php";
   </script>

<?php
    
}

?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Candidate</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Add Candidate</li>
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
                <h3 class="card-title">Candidate Information</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               <form action="" method="post" enctype="multipart/form-data">
                  <table class="table">
                    <tr colspan="2">
                    
                      <th>Name</th>

                        <td colspan="4">
                          <input type="text" class="form-control" name="name" value= "<?php echo $d['name'] ?>"> <td colspan="4">
                           
                          <input type="hidden" class="form-control" name="id" value= "<?php echo $d['id'] ?>">
                        </td>
                    </tr>
                    <tr>
                      <th>Email</th>
                        <td>
                        <input type="text" class="form-control" name="email" value="<?php echo $d['email'] ?>">
                        </td>
                      <th>Phone</th>
                        <td>
                          <input type="text" class="form-control" name="phone" value= "<?php echo $d["phone"] ?>">
                        </td>
                    </tr>
                    <tr>
                      <th>Address</th>
                        <td>
                        <input type="text" class="form-control" name="address" value="<?php echo $d["address"] ?>">
                        </td>
                      <th>photo</th>
                        <td>
                          <input type="file" class="form-control" name="photo" value= "<img width='50' height='50' src='./assets/images/<?php echo $d['photo']; ?>'/>"> <span><?php echo $d['photo']; ?></span>
                       </td>
                    </tr>
                    <tr>
                      <th>Date of birth</th>
                        <td>
                        <input type="date" class="form-control" name="dob" value="<?php echo $d['dob'] ?>">
                        </td>
                      <th>Gender</th>
                        <td> 
                          <input type="text" name="gender" class="form-control" value="<?php echo $d['gender']?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                          <input type="submit" class="btn btn-block btn-primary" value="Update">
                        </td>

                    </tr>
                  </table>
              </form>
  
          
                 </div>
               </table>
                        </div>
                        <!-- /.card -->
                      </div>
                    </div>
                  </div><!-- /.container-fluid -->
                </section>

<?php require("footer.php"); ?>