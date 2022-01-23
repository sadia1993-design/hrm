<?php
require_once("header.php");
require_once("sidebar.php");
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">

      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>

          <li class="breadcrumb-item active">dashboard</li>

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
            <h2 class="card-title">Income</h2>
            <div style="text-align: right;">

            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <?php
            if (isset($_POST['source_name'])) {
              $source_name = $_POST['source_name'];
              $date = $_POST['date'];
              $amount = $_POST['amount'];
              $method = $_POST['method'];

              if ($method == 'cash') {
                $conn->query("INSERT INTO `income`(`sourceID`, `date`, `amount`, `method`, `bankID`) VALUES ('$source_name','$date','$amount','$method','0')");
              } elseif ($method == 'bank') {
                $bank_name = $_POST['bank_name'];
                $conn->query("INSERT INTO `income`(`sourceID`, `date`, `amount`, `method`, `bankID`) VALUES ('$source_name','$date','$amount','$method','$bank_name')");
              }
            ?>

              <script type="text/javascript">
                window.location.href = "add_income.php";
              </script>

            <?php  } ?>
            <!--form section -->
            <form action="" method="post">
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label for="source_name">Source Name</label>
                    <select class="form-control" name="source_name" id="source_name">
                      <option value="">Select Source Name</option>
                      <?php
                      $source_table = $conn->query("SELECT * FROM `income_source`");

                      while ($source_data = $source_table->fetch_assoc()) { ?>
                        <option value="<?php echo $source_data['id']; ?>"><?php echo $source_data['name']; ?></option>

                      <?php  } ?>

                    </select>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" name="date" id="date">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="text" class="form-control" name="amount" id="amount">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="method">Method</label>
                    <select class="form-control" name="method" id="method">
                      <option value="">Select Payment Method</option>
                      <option value="bank">bank</option>
                      <option value="cash">cash</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label for="bank_name">Bank Name</label>
                  <select class="form-control" name="bank_name" id="bank_name">
                    <option value="">Select Bank Name</option>
                    <?php
                    $bank_type = $conn->query("SELECT * FROM `bank`");

                    while ($bankName_data = $bank_type->fetch_assoc()) {  ?>

                      <option value="<?php echo $bankName_data['bankID']; ?>"><?php echo $bankName_data['bank_name']; ?></option>

                    <?php }  ?>
                  </select>
                </div>
              </div>

              <!-- submit -->
              <input type="submit" class="btn btn-block btn-info" value="Submit">
            </form>

            <h3>Income List</h3>
            <table class="table table-bordered">
              <tr>
                <th>Source Name</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Method</th>
                <th>Bank Name</th>
                <th>Action</th>
              </tr>

              <?php
              $add = $conn->query("SELECT income.incomeID,income_source.name,income.date,income.amount,income.method,bankID FROM `income` JOIN income_source ON income_source.id=income.sourceID");

              $sum = 0;
              while ($i = $add->fetch_assoc()) {
                $sum = $sum + $i['amount'];

                $bankname = '';
                if ($i['bankID'] > 0) {

                  $b = $conn->query("SELECT `bankID`, `bank_name` FROM `bank` WHERE bankID=" . $i['bankID']);
                  $p = $b->fetch_assoc();
                  $bankname = $p['bank_name'];
                }
              ?>


                <tr>
                  <td><?php echo $i['name'] ?></td>
                  <td><?php echo $i['date'] ?></td>
                  <td><?php echo $i['amount'] ?></td>
                  <td><?php echo $i['method'] ?></td>
                  <td><?php echo $bankname; ?></td>
                  <td>
                    <a href="update_income.php?id=<?php echo $i['incomeID'] ?>" class="btn btn-xs btn-primary"><i class="fas fa-edit"></i></a>
                    <a href="delete_income.php?id=<?php echo $i['incomeID'] ?>" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
              <?php  } ?>

            </table>
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<?php require("footer.php"); ?>