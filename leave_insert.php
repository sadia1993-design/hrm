<?php 
require_once("header.php");
require_once("sidebar.php");

$hh=$conn->query("SELECT * FROM leave_type");



if (isset($_POST['submit'])) {

  $title=$_POST['title'];
  $allowed_leave=$_POST['allowed_leave'];

  $leave_type=$conn->query("INSERT INTO `leave_type` (`title`, `allowed_leave`) VALUES ('$title', '$allowed_leave')");
  // var_dump($leave_type);

  // header("location: leave_insert.php"); ?>

  <script> 
      window.location.assign("leave_insert.php");
     </script>
<?php } ?>

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1></h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home / Leave Type</a></li>
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
                <h3>Leave Type</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- <h3>leave </h3> -->

                <form action="" method="post">
                <table class="table table-bordered table-striped">
        
                

                 <tr>
                  <th>Leave Title</th>
                    <td>
                      <input type="text" class="form-control" name="title" placeholder="title">
                    </td>
                
                    <th>Allowed Leave</th>
                    <td>
                      <input type="text" class="form-control" name="allowed_leave" placeholder="allowed leave">
                    </td>
                </tr>
                <tr >
                    <td colspan="5">
                      <input type="submit" name="submit" class=" btn btn-block btn-info" value="save">
                    </td>
                    
                  </tr>
                </table>
                

              </form>
                <table class=" table table-bordered table-striped">               
                 <tr>
                  <th>SL</th>
                <th>Title</th>
               <th>Allowed leave</th>
               <th>Action</th>
               </tr>
      <?php $i=0; while ($cc=$hh->fetch_assoc()) {
        ?>
        <tr>
      <td> <?php echo ++$i; ?></td>
      <td> <?php echo $cc['title']?></td>
      <td> <?php echo $cc['allowed_leave']?></td>
      
      <td>
        <a href="update_leave.php?id=<?php echo $cc['typeID'] ?>"class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
        <a href="leave_delete.php?id=<?php echo $cc['typeID'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
      </td>
      </tr>

  <?php } ?>

  </table>

  

            </div>
            <!-- /.card -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<?php require("footer.php"); ?>
<style>
  table{
    text-align: center;
  }
</style>