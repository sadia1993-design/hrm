  <?php 
require_once("header.php");
require_once("sidebar.php");

$expense_data=$conn->query("SELECT `exoenseID`,expense_category.category_name,`date`,`amount`,`method`,`bankID` FROM `expense` JOIN expense_category ON expense_category.id=expense.categoryID");

$mm=$conn->query("SELECT * FROM expense_category");
 $bb=$conn->query("SELECT * FROM bank");

if (isset($_POST['submit'])) {
$categoryID=$_POST['categoryID'];
$date=$_POST['date'];
$amount=$_POST['amount'];
$method=$_POST['method'];
$bankID=$_POST['bankID'];

// if ($method == 'cash') {
//   $conn->query("INSERT INTO `expense`(`categoryID`, `date`, `amount`, `method`, `bankID`) VALUES ('$categoryID ."', '" $date . "', '" $amount ."','" $method ."', '0','" )");
// }elseif ($method == 'bank') {
//   $conn->query("INSERT INTO `expense`(`categoryID`, `date`, `amount`, `method`, `bankID`) VALUES ('$categoryID ."', '" $date . "', '" $amount ."','" $method ."', '" . $bankID .'"")");

$conn->query("INSERT INTO `expense`(`categoryID`, `date`, `amount`, `method`, `bankID`) VALUES ('$categoryID','$date','$amount','$method','$bankID')");

// echo "INSERT INTO `expense`(`categoryID`, `date`, `amount`, `method`, `bankID`) VALUES ('$categoryID','$date','$amount','$method','$bankID')";
// header('location:expense.php'); ?>

   <script> 
      window.location.assign("expense.php");
     </script>
    
<?php   }  ?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <!-- <h1>Expense Tables</h1> -->
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home/ Expense</a></li>
          <!-- <li class="breadcrumb-item active">Expense Tables</li> -->
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
            <!-- <h3 class="card-title">Expense</h3> -->
          </div>
          <!-- /.card-header -->
        
          <div class="container">
          <div class="card-body">
            <h1 style="text-align: center;">Expense</h1>


            <form action=" " method="post">
            <!-- <div> -->
            <label for="category name">Category Name:</label>
            <select name="categoryID" class="form-control">
            <?php 
            while ($rr=$mm->fetch_assoc()) {
            ?>
            <option value="<?php echo $rr['id'] ?>"><?php echo $rr['category_name'] ?></option>
            <?php } ?>
            </select>
            <br>

            <label for="date">Date:</label>
            <input type="date" name="date" placeholder="Enter your date here" class="form-control"><br> 
            <label for="amount">Amount:</label>
            <input type="text" name="amount" placeholder="Enter your amount here" class="form-control"><br>

            <label for="method">Method:</label>
            <select name="method"class="form-control">
              <option>Cash</option>
              <option>Bank</option>
            </select>
            <br>


            <div class="form-group">
              <label for="bankID">Bank Name:</label>
            <select name="bankID" class="form-control">
              <<option value="0">Select bank</option>}
              option
            <?php 
            while ($ebank=$bb->fetch_assoc()) {
            ?>
            <option value="<?php echo $ebank['bankID'] ?>"><?php echo $ebank['bank_name'] ?></option>
            <?php } ?>
            </select>
            </div>
            
            <!-- <input type="text" name="bankID" placeholder="Enter your bank here" class="form-control"><br>  -->
            

            <td colspan="6">
              <input type="Submit" name="submit" value="Submit"class="btn btn-outline-primary btn btn-block">
            </td>

            </form>

            <br><br>
            <h3 class="text-center mb-3 ">Expense List</h3>

            <div class="container">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>SL</th>
                    <th>Category Name</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Method</th>
                    <th>Bank Name</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>

                  <?php $i=0; while ($expense=$expense_data->fetch_assoc()) { ?>
                      
                    
                  <tr>
                    <td><?php echo ++$i ?></td>
                    <td><?php echo $expense['category_name']?></td>
                    <td><?php echo $expense['date']?></td>
                    <td><?php echo $expense['amount']?></td>
                    <td><?php echo $expense['method']?></td>
                    <td><?php 
if($expense['bankID']>0){
  $bb=$conn->query("SELECT * FROM bank");
  while ( $b=$bb->fetch_assoc()) {
    if($expense['bankID']==$b['bankID']){
      echo $b['bank_name'];
    }
  }
}
                    ?></td>
                    <td>
                      <a href="./expense_edit.php?ram=<?php echo $expense['exoenseID']; ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>

                      <a href="./expense_delete.php?ram=<?php echo $expense['exoenseID']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('are you sure?')"><i class="fas fa-trash"></i></a>
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