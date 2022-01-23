<?php
$page = "Candidate Job Experience";
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
          <li class="breadcrumb-item active"><?php echo $page; ?></li>
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
              <button onclick="add_new()" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add New Experience</button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <!--form section -->

            <form action="#" method="POST">
              <div class="row">

                <?php
                // insert query 
                if (isset($_POST['candidateID'])) {
                  $candidateID = $_POST['candidateID'];
                  $candidate_designation = $_POST['candidate_designation'];
                  $candidate_organization = $_POST['candidate_organization'];
                  $joining_date = $_POST['joining_date'];
                  $resign_date = $_POST['resign_date'];

                  $result="";
                  foreach ($candidate_designation as $key => $value) {

                    if (empty($candidateID) || empty(trim($candidate_designation[$key])) || empty(trim($candidate_organization[$key])) ||  empty($joining_date[$key]) || empty($resign_date[$key])) {
                      $result = "ok";
                    } else {
                      $ins = $conn->query("INSERT INTO `job_experience` ( `designation`, `organization`, `joining_date`, `resign_date`, `candidateID`) VALUES ( '$value', '$candidate_organization[$key].', '$joining_date[$key]', '$resign_date[$key]', '$candidateID')");
                    }
                  }


                  if ($result == "ok") { ?>
                    <div class="alert alert-danger" role="alert">
                      <?php $_SESSION['alert'] = "Field must not be empty";
                      echo $_SESSION['alert']; ?>
                    </div>


                  <?php
                  } else {  ?>

                    <script>
                      window.location.href = "candidate_list.php";
                    </script>

                <?php
                  }
                }

                ?>

                <div class="col-12">
                  <?php
                  $candidateTable = $conn->query("SELECT * FROM `candidate`");
                  $fetchData = $candidateTable->fetch_all();

                  ?>
                  <label for="Candidate">Candidate</label>
                  <select name="candidateID" class="form-control" id="Candidate">
                    <option value="">Select Candidate</option>

                    <?php foreach ($fetchData as $key => $value) {  ?>
                      <option value="<?php echo $value[0]; ?>"><?php echo $value[1]; ?></option>

                    <?php }  ?>
                  </select>
                </div>
              </div>
              <br>

              <div id="new">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="Designation">Designation</label>
                      <input type="text" class="form-control" name="candidate_designation[]" id="Designation" placeholder="Enter Designation">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="organization">organization</label>
                      <input type="text" class="form-control" name="candidate_organization[]" id="organization" placeholder="Enter organization">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="joining_date">joining Date</label>
                      <input type="date" class="form-control" name="joining_date[]" id="joining_date">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="resign_date">Resign Date</label>
                      <input type="date" class="form-control" name="resign_date[]" id="resign_date">
                    </div>
                  </div>
                </div>
                <hr style="border: 1px solid #ccc;">
              </div>

              <button type="submit" class="btn btn-block btn-info">Insert</button>
            </form>

            
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>


<script>
  const newId = document.getElementById('new').innerHTML;

  function add_new() {
    $('#new').append(newId);
  }
</script>
<?php require("footer.php"); ?>