<?php
require_once("header.php");
require_once("sidebar.php");
$id=$_GET['id'];
$ss=$conn->query("SELECT * FROM `salary_month` WHERE id=$id");
$st=$ss->fetch_assoc();


if(isset($_POST['salary_month'])){
  $rs=$_POST['salary_month'];

$conn->query("UPDATE `salary_month` SET `month`='$rs' WHERE id=$id");?>

<script>
window.location.href="salarymonth.php";
</script>
<?php
}

?> 
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update month</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"></li>
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
                <h3 class="card-title">Salary month</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

 <form action="" method="post">
   <input type="text" name="salary_month" class="form-control"value="<?php echo $st['month']?>" placeholder="enter month name">
                 
    <br>
                  
    <input type="Submit" value="Submit" class="btn btn-info"> <br>
    </form>

    <?php require("footer.php"); ?>