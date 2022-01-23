<?php 
require_once("header.php");
require_once("sidebar.php");

$id=$_GET['id'];
$data=$conn->query("SELECT * FROM `benefits` WHERE id=$id");
 $r=$data->fetch_row();

		 // echo "<pre>";
		 // print_r($r);


if (isset($_POST['title'])) {

  
  $title=$_POST['title'];
  $type=$_POST['type'];
  $amount=$_POST['amount'];
  
 $conn->query("UPDATE `benefits` SET `title`='$title',`type`='$type',`amount`='$amount' WHERE id=$id");
  // header("location: benefits.php"); ?>

  <script> 
      window.location.assign("benefits.php");
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
                <!-- <h3 class="card-title">Update benefits</h3> -->
                <h3>Update Benefit</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               <!-- <h1>Updated</h1> -->


               <form action="" method="post">
                <table class="table table-bordered">
        
                <tr>
                  <th>Title</th>
                   <td>
                      <input type="text" class="form-control" name="title" placeholder="title" value="<?php echo $r[1] ?>">
                   </td>

                    <th> Type</th>
                    <td>
                      <input type="text" class="form-control" name="type" placeholder="type" value="<?php echo $r[2] ?>">
                    </td>

                    <th>Amound</th>
                    <td>
                      <input type="text" class="form-control" name="amount" placeholder="amount" value="<?php echo $r[3] ?>">
                    </td>
                </tr>
                <tr >
                    <td colspan="6">
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