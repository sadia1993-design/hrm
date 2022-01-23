<?php 
require_once("header.php");
require_once("sidebar.php");

if(isset($_GET['id'])){
  $id=$_GET['id'];
  $edit=$conn->query("SELECT * FROM `notice` WHERE id=$id");
  $e=$edit->fetch_assoc();
}


if(isset($_POST['title'])){
  $title=$_POST["title"];
  $date=$_POST["date"];
  $details=$_POST["details"];

  $conn->query("UPDATE `notice` SET `title` = '$title', `date` = '$date', `details` = '$details' WHERE `notice`.`id` = '$id'");

 
    ?>

  <script> 
      window.location.href="add_notice.php";
   </script>

  <?php
  
}
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Notice</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Notice</li>
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
            <h3 class="card-title">Notice</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
           <h1>Update Notice</h1>
           <form action="" method="post">
            <table class="table table-bordered">
              <tr>
                <td>
                  <input type="text" value=" <?php echo $e['title'] ?> " name="title" class="form-control" placeholder="Title">
                </td>
              </tr>
              <tr>
                <td>
                  <input type="text" value=" <?php echo $e['date'] ?> " name="date" class="form-control" placeholder="Date">
                </td>
              </tr>
               <tr>
                <td>
                  <textarea class="form-control" name="details"  cols="30" rows="10"  placeholder="Details"><?php echo trim($e['details']); ?></textarea>                 
                </td>
              </tr>
              <tr>
                <td>
                  <input type="submit" class="btn btn-block btn-info" value="Update">
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