<?php
require_once("header.php");
require_once("sidebar.php"); ?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Office Department</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header bg-cyan">
            <h3 class="text-center  mb-0  font-weight-bolder">Office Department</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form action="" method="post">
              <input type="text" name="office_department" class="form-control" placeholder="Enter Department Name">

              <br>
              <input type="Submit" value="Submit" class="btn btn-info"> <br>
            </form>

            <?php
            $dpt_data = $conn->query("SELECT * FROM `department`");
            $dpt_status = "error";


            if (isset($_POST['office_department'])) {
              $office_department = $_POST['office_department'];

              if (empty(trim($office_department))) { ?>
                <div class="alert alert-danger" role="alert">
                  <br>field must not be empty!!
                </div>

                <?php
              } else {
                while ($data = $dpt_data->fetch_assoc()) {
                  if ($data['dptName'] === $office_department) {
                    $dpt_status = 'ok'; ?>
                    <div class="alert alert-danger" role="alert">
                      <br>Duplicate Data Found!!
                    </div>

                  <?php
                  }
                }

                if ($dpt_status == "error") {
                  $dpt = $conn->query("INSERT INTO `department` ( `dptName`) VALUES ( '$office_department')"); ?>
                  <script>
                    window.location.href = "department.php";
                  </script>
            <?php
                }
              }
            }
            ?>


          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<?php require("footer.php"); ?>