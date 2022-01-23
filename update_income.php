<?php 
require_once("header.php");
require_once("sidebar.php");
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">

      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">dashboard</li>
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
            <h2 class="card-title">Income</h2>
            <div style="text-align: right;">                   

            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
           <?php 

           $id=$_GET['id'];
           $edit=$conn->query("SELECT * FROM `income` WHERE incomeID=$id");
           $e=$edit->fetch_assoc();

           // echo "<pre>";
           // print_r($e); 

           if(isset($_POST['incomeID'])){
            $source_name=$_POST['source_name'];
            $incomeID=$_POST['incomeID'];
            $date=$_POST['date'];
            $amount=$_POST['amount'];
            $method=$_POST['method'];
            $bank_name=$_POST['bank_name'];

            $conn->query("UPDATE `income` SET `sourceID`='$source_name', `date` = '$date', `amount` = '$amount',`method` ='$method', `bankID` = '$bank_name' WHERE `income`.`incomeID` = $incomeID");

            // echo "UPDATE `income` SET `sourceID` = $source_name, `date` = '$date', `amount` = '$amount', `bankID` = $bank_name WHERE `income`.`incomeID` = $id";

            ?>

            <script type="text/javascript">
             window.location.href="add_income.php";
           </script> 

           <?php 
         }
         ?>
         <!--form section -->
         <form action="" method="post">

          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <input type="hidden" name="incomeID" value="<?php echo $e['incomeID'] ?>">
                <label for="source_name">Source Name</label>                        
                <select class="form-control" name="source_name" id="source_name">
                 <option value="" >Select Source Name</option>
                 <?php 
                 $source_table = $conn->query("SELECT * FROM `income_source`");

                 while($source_data = $source_table->fetch_assoc()){ 
                   // echo "<pre>";
                   // print_r($source_data);
                   // exit;

                  ?>
                  <option value="<?php echo $source_data['id']; ?>" <?php if ($source_data['id']==$e['sourceID']){echo "selected";} ?> ><?php echo $source_data['name']; ?></option> 
                 <?php 
               }
               ?>                          
             </select>
           </div>
         </div>   
         <div class="col-6">
          <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" value="<?php echo $e['date'] ?>" name="date" id="date">
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label for="amount">Amount</label>
            <input type="text" class="form-control" value="<?php echo $e['amount'] ?>" name="amount" id="amount">
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label for="method">Method</label>
            <select class="form-control" name="method" id="method" >
                <option value="bank">bank</option>
                <option value="cash">cash</option>
                
              </select>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="form-group">
          <label for="bank_name">Bank Name</label>
          <select class="form-control" name="bank_name" id="bank_name">
           <option value="" >Select Bank Name</option>
           <?php 
           $bank_type = $conn->query("SELECT * FROM `bank`");  

           while( $bankName_data = $bank_type->fetch_assoc()){  ?>

           <option value="<?php echo $bankName_data['bankID']; ?>" <?php if ($bankName_data['bankID']==$e['bankID']){echo "selected";} ?>  ><?php echo $bankName_data['bank_name']; ?></option>

         <?php }  ?>      
       </select>
     </div>
   </div>                  
   <!-- submit -->
   <input type="submit" class="btn btn-block btn-info" value="Update">
 </form>    
</div>
</div>
<!-- /.card -->
</div>
</div>
</div><!-- /.container-fluid -->
</section>

<?php require("footer.php"); ?>