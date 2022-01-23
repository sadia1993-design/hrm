<?php
require_once("header.php");
require_once("sidebar.php");

if (isset($_POST['start_date'])) {
  $start = $_POST['start_date'];
  $end = $_POST['end_date'];

  $expense = $conn->query("SELECT * FROM expense JOIN expense_category ON expense_category.id=expense.categoryID WHERE `date` BETWEEN '" . $start . "' AND '" . $end . "'");

  $salary_payment = $conn->query("SELECT * FROM `salary_payment` WHERE `payment_date` BETWEEN '" . $start . "' AND '" . $end . "'");

  $income = $conn->query("SELECT * FROM `income` join income_source on income_source.id=income.sourceID WHERE `date` BETWEEN '" . $start . "' AND '" . $end . "'");
} else {
  $expense = $conn->query("SELECT * FROM expense JOIN expense_category ON expense_category.id=expense.categoryID");

  $salary_payment = $conn->query("SELECT * FROM `salary_payment`");

  $income = $conn->query("SELECT * FROM `income` join income_source on income_source.id=income.sourceID");
};

$data = array();

while ($ex = $expense->fetch_assoc()) {
  $d = array();
  $d = array('date' => $ex['date'], 'description' => $ex['category_name'], 'amount' => $ex['amount'], 'type' => 'debit');
  array_push($data, $d);
}
while ($s = $salary_payment->fetch_assoc()) {
  $ss = array();
  $ss = array('date' => $s['payment_date'], 'description' => 'Employee Salary', 'amount' => $s['amount'], 'type' => 'debit');
  array_push($data, $ss);
}
while ($i = $income->fetch_assoc()) {
  $in = array();
  $in = array('date' => $i['date'], 'description' => $i['name'], 'amount' => $i['amount'], 'type' => 'credit');
  array_push($data, $in);
}
$da = array_column($data, 'date');
array_multisort($da, SORT_ASC, $data);
// echo "<pre>";
$top_date=(count($da)-1);
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <!-- <h1></h1> -->

      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="add_emp.php">Home</a></li>
          <li class="breadcrumb-item"><a href="add_emp.php">Profit & Loss Statement</a></li>
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
            <center>
              <h2>Company Name</h2>
            </center>
            <center>
              <h4>Profit & Loss Statement</h4>
            </center>
            <center>

              <h5></h5>
             <?php if (isset($_POST['start_date'])){
              echo "<h5>For the period of  $start  To  $end</h5>";
             }else{
              echo "<h5>For the period of  $da[0] To $da[$top_date]</h5>";
             } ?>
            </center>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

            <!-- taken empty variable for calculating total Debit $ Credit ammount -->
            <?php
            $debit = 0;
            $credit = 0;
            $total=0;
            ?>
            <!-- End empty variable -->

            <!-- start table for showing data         -->
            <div class="container">
              <div class="row">
                <div class="col-md-4"></div>
                <form action="" method="post">
                  <table>
                    <tr>
                      <th>From:</th>
                      <th>To:</th>
                    </tr>

                    <tr>
                      <td>
                        <input type="date" name="start_date" class="form-control">
                      </td>
                      <td>
                        <input type="date" name="end_date" class="form-control">
                      </td>
                      <td>
                        <input type="submit" class="btn btn-info btn-block">
                      </td>
                    </tr>
                  </table>
                </form>

              </div>
            </div>

            <br>
            <br>

            <table class="table table-bordered table-hover">
              <tr>
                <th>SL</th>
                <th>Date</th>
                <th>Description</th>
                <th>Debit</th>
                <th>Credit</th>
                <th>Comment</th>
              </tr>
              <?php $sl = 0;
              foreach ($data as $value) { ?>
                <tr>
                  <td><?php echo ++$sl; ?></td>
                  <td><?php echo $value['date']; ?></td>
                  <td><?php echo $value['description']; ?></td>

                  <td align="right"><?php if ($value['type'] === 'debit') {
                                      echo $value['amount'];
                                      $debit += $value['amount'];
                                    } else {
                                      echo '---';
                                    } ?></td>

                  <td align="right"><?php if ($value['type'] === 'credit') {
                                      echo $value['amount'];
                                      $credit += $value['amount'];
                                    } else {
                                      echo '---';
                                    } ?></td>

                  <td><?php if ($value['type'] == 'credit') {
                        echo "It's Revenue";
                      } else {
                        echo "It's an Expense";
                      } ?></td>
                </tr>

              <?php } ?>

              <tr>
                <th colspan="3">Total=</th>
                <th class="text-right"><?php echo number_format($debit, 2); ?></th>
                <th class="text-right"><?php echo  number_format($credit, 2); ?></th>
                <th class="text-right">
                  <?php $total= $credit-$debit;
                  if ($total>=0) {
                    echo "Net Profit=".$total;
                  }else{
                    echo "Net Loss=".abs($total);
                  }?>
                </th>
              </tr>
            </table>
            <!-- End table for showing data -->
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<?php require("footer.php"); ?>


<style>
  table {
    text-align: center;
  }
</style>