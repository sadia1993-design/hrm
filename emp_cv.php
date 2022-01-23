<?php 
require_once("header.php");
require_once("sidebar.php");

 $id=$_GET['id'];
 $details=$conn->query("SELECT employee.*,department.dptName FROM `employee` join department ON department.dptID=employee.dptID WHERE employee.empID=$id");
 $result=$details->fetch_assoc();

 // $file_name=date('Y-m-d-h-i-s').basename($_FILES['photo']['name']);
 //   $file='./uploads/'.$file_name;
 //   move_uploaded_file($_FILES['photo']['tmp_name'],$file);
  
 ?>
<section class="content-header">
      <div class="container-fluid">
        <div class="mb-2 row">
          <div class="col-sm-6">
            <!-- <h1></h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Employee Details</title>
</head>
<body>
	<center>

    <td rowspan="10"></td>
        <td><img height="130" width="140" alt="Image not found" src="./uploads/<?php echo $result['photo']; ?>">
        </td>
        <br>

		<table class="table table-hover">
			<tr>
				
			<th colspan="4"> <h2 style="text-align: center; color: green"> <?php echo $result['name']; ?> </h2> </th>
			<a href="view_emp.php" class="float-left btn btn-sm btn-info"><-Back</a>
			</tr>

			<tr>
				<td>Name</td>
				<td> : </td>
				<td><?php echo $result['name']; ?></td>
			</tr>
			<tr>
            	<td>Employee ID</td>
            	<td> : </td>
            	<td><?php echo $result['empID']; ?></td>
            </tr>

            <tr>
            	<td>Department</td>
            	<td> : </td>
            	<td><?php echo $result['dptName']; ?></td>
            </tr>

            <tr>
            <td>Designation</td>
            <td> : </td>
            <td><?php echo $result['designation']; ?></td>
           </tr>
             
           <tr>
            <td>Date of Birth</td>
            <td> : </td>
            <td><?php echo $result['dob']; ?></td>
           </tr>

           <tr>
            <td>Gender</td>
            <td> : </td>
            <td><?php echo $result['gender']; ?></td>
           </tr>

           <tr>
            <td>Address</td>
            <td> : </td>
            <td><?php echo $result['address']; ?></td>
           </tr>

           <tr>
            <td>Hire date</td>
            <td> : </td>
            <td><?php echo $result['hire_date']; ?></td>
           </tr>

           <tr>
            <td>Basic Salary</td>
            <td> : </td>
            <td><?php echo $result['basic_salary']; ?></td>
           </tr>

           <tr>
            <td >Phone</td>
            <td> : </td>
            <td><?php echo $result['phone']; ?></td>
           </tr>

           <tr>
            <td>Password</td>
            <td> : </td>
            <td><?php echo $result['password']; ?></td>
           </tr>

           <tr>
            <td>Email</td>
            <td> : </td>
            <td><?php echo $result['email']; ?></td>
           </tr>

		</table>

	</center>
</body>
</html>

<hr>
             </div>
            </div>
           
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<?php require("footer.php"); ?>