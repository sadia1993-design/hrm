<?php 
require_once("header.php");
require_once("sidebar.php");

$id=$_GET['id'];
$data=$conn->query("SELECT * FROM `leave_type` WHERE typeID=$id");
 $r=$data->fetch_row();

		 // echo "<pre>";
		 // print_r($r);


if (isset($_POST['title'])) {

  $title=$_POST['title'];
  $allowed_leave=$_POST['allowed_leave'];
  
 $conn->query("UPDATE `leave_type` SET `title` = '$title', `allowed_leave` = '$allowed_leave' WHERE `leave_type`.`typeID` = $id");

		 // header("location: leave_insert.php"); ?>
     <script> 
      window.location.assign("leave_insert.php");
     </script>
     
	<?php	} ?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1></h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                <h3>Update leave</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               <!-- <h1>Update leave</h1> -->


               <form action="" method="post">
                <table class="table table-bordered">
        
                

                 <tr>
                  <th>Leave Title</th>
                    <td>
                      <input type="text" class="form-control" name="title" placeholder="title" value="<?php echo $r['1'] ?>">
                     <!--  <input type="text" class="form-control" name="typeID" placeholder="title" value="<?php //echo $qq['1'] ?>"> -->
                    </td>
                
                    <th>Day</th>
                    <td>
                      <input type="text" class="form-control" name="allowed_leave" placeholder="allowed leave" value="<?php echo $r['2'] ?>">
                    </td>
                </tr>
                <tr >
                    <td colspan="5">
                      <input type="submit" class=" btn btn-block btn-info" value="save">
                    </td>
                    
                  </tr>
                </table>
                

              </form>
                

           </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>

<!-- <?php //require("footer.php"); ?> -->