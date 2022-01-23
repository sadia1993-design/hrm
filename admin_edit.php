<?php 
require_once("header.php");
require_once("sidebar.php");?>
 <?php 
          $d=$_GET['ram'];
          $admin_da = $conn->query("SELECT * FROM `admin` WHERE adminID=$d");
         
          $result=$admin_da->fetch_assoc();
          

            if(isset($_POST['name'])) {
              $name=$_POST['name'];
              $email=$_POST['email'];
              $password=$_POST['password'];

              $conn->query("UPDATE `admin` SET `name`='$name',`email`='$email',`password`='$password' WHERE `admin`.`adminID` = $d");

          // header("location:admin.php"); ?>
             <script> 
      window.location.assign("admin.php");
     </script>
      
  <?php  } ?>
  
 <h1>Admin List</h1>
           <form action=" " method="post">
           <div> 
            <label for="name">Name:</label>
            <input type="text"name="name"placeholder="Enter your name here" class="form-control" value="<?php echo $result['name'] ?>"><br> 
            <label for="name">Email:</label>
            <input type="text"name="email"placeholder="Enter your email here" class="form-control" value="<?php echo $result['email'] ?>"><br> 
            <label for="name">Password:</label>
            <input type="text"name="password"placeholder="Enter your password here" class="form-control" value="<?php echo $result['password'] ?>"><br>

            <td colspan="6">
             <input type="Submit" value="Submit"class="btn btn-outline-info btn btn-block">
           </td>
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
