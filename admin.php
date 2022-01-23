	<?php 
require_once("header.php");
require_once("sidebar.php");?>
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Admin Tables</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Admin Tables</li>
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
						<h3 class="card-title">Admin</h3>
					</div>
					<!-- /.card-header -->
				
						<?php 
						$admin_data=$conn->query("SELECT * FROM `admin`");
					
						?>
						<?php
							if (isset($_POST['name'])) {
				   	// $pme=$_POST['adminID'];
						$pname=$_POST['name'];
						$n=$_POST['email'];
						$rpassword=$_POST['password'];

						 $conn->query("INSERT INTO `admin` (`adminID`, `name`, `email`, `password`) VALUES (NULL,'$pname', '$n', '$rpassword');");
						

					}

						?>
							<div class="card-body">
						<!-- <h1>Admin List</h1> -->
						<form action=" " method="post">
						<div> 
						<label for="name">Name:</label>
						<input type="text"name="name"placeholder="Enter your name here" class="form-control"><br> 
						<label for="email">Email:</label>
						<input type="text"name="email"placeholder="Enter your email here" class="form-control"><br> 
						<label for="password">Password:</label>
						<input type="text"name="password"placeholder="Enter your password here" class="form-control"><br>

						<td colspan="6">
							<input type="Submit" value="Submit"class="btn btn-outline-info btn btn-block">
						</td>
						</form>

						<br><br>
						<h3>Admin List</h3>

						<div class="container">
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th>SL</th>
										<th>Name</th>
										<th>Email</th>
										<th>Password</th>
										<th>Action</th>
									</tr>
								</thead>

								<tbody>
									<?php
									$i=0;
									while ($one=$admin_data->fetch_assoc()) {
											
										
										?>
										
									<tr>
										<td><?php echo ++$i ?></td>
									
										<td><?php echo $one['name']?></td>
										<td><?php echo $one['email']?></td>
										<td><?php echo $one['password']?></td>
										<td>
											<a href="./admin_edit.php?ram=<?php echo $one['adminID']; ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a> || 
											<a href="./admin_delete.php?ram=<?php echo $one['adminID']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('are you sure?')"><i class="fas fa-trash"></i></a>
										</td>
									</tr>
									<?php   } ?>
									


									</tbody>
								
							</table>
							
						</div>


					</div>
				</div>
			</div>
			<!-- /.card -->
		</div>
	</div>
</div><!-- /.container-fluid -->
</section>

<?php require("footer.php"); ?>