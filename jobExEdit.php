<?php
require_once("header.php");
require_once("sidebar.php"); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">

      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Job Experience</li>
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
            <h3 class="card-title">Job Experience</h3>
            <div style="text-align: right;">
               
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <!--form section -->
               <?php 
                  if(isset($_GET['id'])){
                     $id = $_GET['id'];
                     $individual_table= $conn->query("SELECT * FROM `job_experience` where jobID = $id");
                     $fetch_individual = $individual_table->fetch_row();
            
                  }

                  //update query 
                  if(isset($_POST['candidate_designation'])){
                    $candidate_job_id = $_POST['candidate_job_id'];
                    $candidate_designation = $_POST['candidate_designation'];
                    $candidate_organization = $_POST['candidate_organization'];
                    $joining_date = $_POST['joining_date'];
                    $resign_date = $_POST['resign_date'];

                    $up =$conn->query("UPDATE `job_experience` SET `designation` = ' $candidate_designation', `organization` = '$candidate_organization', `joining_date` = '$joining_date', `resign_date` = '$resign_date' WHERE `job_experience`.`jobID` = $candidate_job_id"); ?>
                    
                    <script>
                       window.location.href = "jobEx.php";
                    </script>
               <?php                    

                  }
               ?>
            <form action="#" method="POST">
              
              <div id="new">
                <div class="row">
                  <div class="col-md-12">
                     <input type="hidden" name="candidate_job_id" value="<?php echo $fetch_individual[0]; ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="Designation">Designation</label>
                      <input type="text" class="form-control" name="candidate_designation" id="Designation" placeholder="Enter Designation" value="<?php echo $fetch_individual[1]; ?>">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="organization">organization</label>
                      <input type="text" class="form-control" value="<?php echo $fetch_individual[2]; ?>"  name="candidate_organization" id="organization" placeholder="Enter organization">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="joining_date">joining Date</label>
                      <input type="date" class="form-control" value="<?php echo $fetch_individual[3]; ?>" name="joining_date" id="joining_date">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="resign_date">Resign Date</label>
                      <input type="date" class="form-control" value="<?php echo $fetch_individual[4]; ?>" name="resign_date" id="resign_date">
                    </div>
                  </div>
                </div>
                <hr style="border: 1px solid #ccc;">
              </div>

              <button type="submit" class="btn btn-block btn-info">Update</button>
            </form>

            <hr style="border: 2px solid green;">

            <!-- show JobExperience table data -->

          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>


<?php require("footer.php"); ?>