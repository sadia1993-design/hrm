<?php
require_once("header.php");
require_once("sidebar.php");

$sm=$conn->query("SELECT * FROM `salary_month`");

if(isset($_POST['salary_month'])){
  $month=$_POST['salary_month'];
  $date=date("Y-m-d");

  $conn->query("INSERT INTO `salary_month`(`month`,generate_date) VALUES ('$month','$date')");
//header("location:salarymonth.php");?>
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
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Salary month</li>
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
                <h3 class="card-title">Salary Month</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <form action="" method="post">
                  <input type="text" name="salary_month" class="form-control" placeholder="Enter month" id="demo-2">
                 
                  <br>
                  

                  <input type="Submit" value="Submit"class="btn btn-info"> <br>
            </form>
            

           

             <hr>
                 <!--table --> 
                 <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Serial</th>
                        <th scope="col">Month</th>
                        <th scope="col">Generate Date</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      $i=0;
                       while($sm_data = $sm->fetch_assoc()){ ?>
                          
                            <tr>
                              <td scope="row"><?php echo ++$i; ?></td>
                              <td scope="row"><?php echo $sm_data['month']; ?></td>                        
                              <td scope="row"><?php echo $sm_data['generate_date']; ?></td>                        
                              <td scope="row">
                                 <a href="./salmon_edit.php?id=<?php echo $sm_data['id']; ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                 <a href="./salmon_delete.php?id=<?php echo $sm_data['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('are you sure?')"><i class="fas fa-trash"></i></a>
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
<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css">
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
<script src="jquery.mtz.monthpicker.js"></script>
<script>
    $('#demo-2').monthpicker({
        pattern: 'yyyy-mm',
        selectedYear: 2021,
        startYear: 1900,
        finalYear: 2212,
    });
</script>
<?php require("footer.php"); ?>


            

