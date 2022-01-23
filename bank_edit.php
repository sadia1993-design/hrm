<?php 
require_once("header.php");
require_once("sidebar.php");?>
 <?php 
          $d=$_GET['ram'];
          $bank_da = $conn->query("SELECT * FROM `bank` WHERE bankID=$d");

          $result=$bank_da->fetch_assoc();
          

      if(isset($_POST['bank_name'])) {
       $ban=$_POST['bank_name'];
       $status=$_POST['status']; 

              
      $conn->query("UPDATE `bank` SET `bank_name` = '$ban',status='$status' WHERE `bank`.`bankID` = $d");

          // header("location:bank.php"); ?>
    <script>
    window.location.href=("bank.php");
    </script>
      
   <?php } ?>
    

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Update Bank</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Update Bank </li>
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
            <h1 class="card-title">Add Bank</h1>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
           <form action="" method="post">

            <label for="bank_name">Bank Name:</label>
            <input type="text"name="bank_name"class="form-control"placeholder="Enter bank name" value="<?php echo $result['bank_name'] ?>">

            <label for="name">Status:</label>
            <select name="status"class="form-control">
              <option value="active"<?php if ($result['status']==='active'){echo "checked"; }?>><span>Active</span></option>
              <option value="inactive"<?php if ($result['status']==='inactive'){echo "checked"; }?>><span>Inactive</span></option>
            </select> 

            
            <br>
            <td colspan="6">
               <input type="Submit" value="Submit"class="btn btn-outline-info btn btn-block">
            </td>

            <br>
          </form>
         
    <!--table --> 
   
   </table>
 </div>
</div>
<!-- /.card -->
</div>
</div>
</div><!-- /.container-fluid -->
</section>

<?php require("footer.php"); ?>
