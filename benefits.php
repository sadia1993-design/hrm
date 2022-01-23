<?php 
require_once("header.php");
require_once("sidebar.php");

$hh=$conn->query("SELECT * FROM benefits");



if (isset($_POST['submit'])) {

  // $id=$_POST['id'];
  $title=$_POST['title'];
  $type=$_POST['type'];
  $amount=$_POST['amount'];

  $benefits=$conn->query("INSERT INTO `benefits`( `title`, `type`, `amount`) VALUES ('$title','$type','$amount')");
  // var_dump($benefits);

  // header("location: benefits.php"); ?>
     <script> 
      window.location.assign("benefits.php");
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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Benefits</a></li>
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
                 <h3> Benefit </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               

                <form action="" method="post">
                <table class="table table-bordered">
        
                

                 <tr>
                  <th>Benefit Title</th>
                    <td>
                      <input type="text" class="form-control" name="title" placeholder="Title">
                    </td>
                
                  <th>Benefit Type</th>
                    <td>
                      <select name="type">
                        <option value="add">Add</option>
                        <option value="add">Deduct</option>
                      </select>
                    </td>

                      <th>Amount</th>
                    <td>
                      <input type="text" class="form-control" name="amount" placeholder="Percentage">
                    </td>
                </tr>
                <tr >
                    <td colspan="6">
                      <input type="submit" name="submit" class=" btn btn-block btn-info" value="save">
                    </td>
                    
                  </tr>
                </table>
                

              </form>
              <h2>List of Benefits</h2>
                <table class=" table table-bordered">               
                 <tr>
                  <th>Sl</th>
                <th>Title</th>
               <th>Type</th>
               <th>Amount</th>
               <th>Action</th>
               </tr>
      <?php $i=0; while ($cc=$hh->fetch_assoc()) {
        ?>
        <tr>
      <td> <?php echo ++$i; ?></td>
      <td> <?php echo $cc['title']?></td>
      <td> <?php echo $cc['type']?></td>
      <td> <?php echo $cc['amount']?></td>
      
      <td>
        <a href="benefits_update.php?id=<?php echo $cc['id'] ?>"class="btn btn-info"><i class="fas fa-edit"></i></a>
        <a href="benefits_delete.php?id=<?php echo $cc['id'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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