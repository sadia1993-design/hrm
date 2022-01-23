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
          <li class="breadcrumb-item"><a href="#">Home </a></li>
          <li class="breadcrumb-item active">Department List</li>
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
            <h3 class="card-title">Office Department</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

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
                  <!-- <script>
                                   window.location.href="department.php";
                               </script> -->
            <?php
                }
              }
            }
            ?>


            <hr>
            <!--table -->
            <table class="table table-striped" id="dptTable">
              <thead>
                <tr>
                  <th scope="col">Serial</th>
                  <th scope="col">Department</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>

                <?php
                $dpt_data = $conn->query("SELECT * FROM `department`");

                $i = 0;

                //echo "<pre>";
                //print_r($dp_data);
                //exit;

                while ($dp_data = $dpt_data->fetch_assoc()) { ?>
                  <tr>
                    <td scope="row"><?php echo ++$i; ?></td>
                    <td scope="row"><?php echo $dp_data['dptName']; ?></td>
                    <td scope="row">
                      <a href="./dpt_edit.php?id=<?php echo $dp_data['dptID']; ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                      <a href="./dpt_delete.php?id=<?php echo $dp_data['dptID']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('are you sure?')"><i class="fas fa-trash"></i></a>
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

<?php require("footer.php"); ?>

<script>
  $(document).ready(function() {
    $('#dptTable').DataTable();
  });
</script>