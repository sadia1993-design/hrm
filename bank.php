<?php 
require_once("header.php");
require_once("sidebar.php");?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h2>Bank Details</h2>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Bank Details</a></li>
          <!-- <li class="breadcrumb-item active">Input Bank</li> -->
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
            <!-- <h1 class="card-title">Bank</h1> -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
           <form action="" method="post">

            <label for="bank_name">Bank Name:</label>
            <input type="text"name="bank_name"class="form-control"placeholder="Enter bank name">

            <label for="name">Status:</label>
            <select name="status"class="form-control">
              <option>Active</option>
              <option>Inactive</option>
            </select> 

            
            <br>
            <td colspan="6">
               <input type="Submit" value="Submit"class="btn btn-outline-info btn btn-block">
            </td>

            <br>
          </form>

          <?php 
          $bank_data = $conn->query("SELECT * FROM `bank`");
          // $bank_status= "error";
          ?>

          <?php
          
          if( isset($_POST['bank_name'])){
           $bank_name=$_POST['bank_name'];
           $status=$_POST['status'];

            $conn->query("INSERT INTO `bank` (`bankID`, `bank_name`, `status`) VALUES (NULL,'$bank_name', '$status');");
            ?>
            <script>
            window.location.href=("bank.php");
          </script>

          <?php


         }
      
    
    ?>


    <hr>
    <!--table --> 
    <table class="table table-striped table-hover" >
      <thead>
        <tr>
          <th scope="col">SL</th>
          <th scope="col">Bank Name</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>

        <?php 
                        // $dp_datas = $conn->query("SELECT * FROM `department`");
        $i=0;
        
                         //echo "<pre>";
                      //print_r($dp_data);
                         //exit;

        while($ban_data = $bank_data->fetch_assoc()){ ?>
          <tr>
            <td scope="row"><?php echo ++$i ?></td>
            <td scope="row"><?php echo $ban_data['bank_name']; ?></td>                        
            <td scope="row"><?php echo $ban_data['status']; ?></td>                        
            <td scope="row">
             <a href="./bank_edit.php?ram=<?php echo $ban_data['bankID']; ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a> 

             <a href="./bank_delete.php?ram=<?php echo $ban_data['bankID']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('are you sure?')"><i class="fas fa-trash"></i></a>
           </td>                        
         </tr>

         <?php
       }
       ?>
       
     </tbody>
   </table>
 </div>
</div>
<!-- /.card -->
</div>
</div>
</div><!-- /.container-fluid -->
</section>

<?php require("footer.php"); ?>
