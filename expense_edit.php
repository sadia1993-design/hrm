	<?php 
require_once("header.php");
require_once("sidebar.php");?>
 <?php 
          $p=$_GET['ram'];
          $expense_da=$conn->query("SELECT * FROM `expense` WHERE exoenseID=$p");
           $result=$expense_da->fetch_assoc();
           // echo "<pre>";
           // print_r($result);

          $mm=$conn->query("SELECT * FROM expense_category");
         
           $bb=$conn->query("SELECT * FROM bank");
          

           if (isset($_POST['submit'])) {
                    $categoryID=$_POST['categoryID'];
                    $date=$_POST['date'];
                    $amount=$_POST['amount'];
                    $method=$_POST['method'];
                    $bankID=$_POST['bankID'];


              $conn->query("UPDATE `expense` SET  `categoryID` = '$categoryID',`date`='$date', `amount` = '$amount', `method` = '$method', `bankID` = '$bankID' WHERE `expense`.`exoenseID` = $p");

              // UPDATE `expense` SET `exoenseID`='[value-1]',`categoryID`='[value-2]',`date`='[value-3]',`amount`='[value-4]',`method`='[value-5]',`bankID`='[value-6]' WHERE 1





          // header("location:expense.php"); ?>
       <script> 
      window.location.assign("expense.php");
     </script>
		
      
 <?php }  ?>
   
          


<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Update Tables</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Update Tables</li>
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
						<h3 class="card-title">Expense</h3>
					</div>
					<!-- /.card-header -->
				
					<div class="container">
					<div class="card-body">
						<h1>Update Expense List</h1>


						<form action=" " method="post">
						<!-- <div> -->
						<label for="category name">Category Id:</label>
						<select name="id" class="form-control">
						<?php 
						while ($rr=$mm->fetch_assoc()) {
						?>
						<option value="<?php echo $rr['id'] ?>" ><?php echo $rr['category_name'] ?></option>
						<?php	} ?>
						</select>
						<br>

						<label for="date">Date:</label>
						<input type="date" name="date" placeholder="Enter your date here" class="form-control" value="<?php echo $result['date'] ?>"><br> 
						<label for="amount">Amount:</label>
						<input type="text" name="amount" placeholder="Enter your amount here" class="form-control"value="<?php echo $result['amount'] ?>"><br>

						<label for="method">Method:</label>
						<select name="method" class="form-control"value="<?php echo $result['method'] ?>">
							<option>Cash</option>
							<option>Bank</option>
						</select>
						<br>

						<div class="form-group">
							<label for="bankID">Bank Name:</label>
							<select name="bankID" class="form-control">
								<?php 
								while ($ebank=$bb->fetch_assoc()) {
									?>
									<option value="<?php echo $ebank['bankID'] ?>"><?php echo $ebank['bank_name'] ?></option>
								<?php } ?>
							</select>
						</div>
						<td colspan="6">
							<input type="Submit" name="submit" value="Submit"class="btn btn-outline-primary btn btn-block">
						</td>

						</form>

						
								
							
							
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