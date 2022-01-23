<?php
require_once("header.php");
require_once("sidebar.php");

if (isset($_POST['pMethod'])) {
    $empID = $_POST['empID'];
    $date = $_POST['date'];
    $amount = $_POST['amount'];
    $pMethod = $_POST['pMethod'];
    $month = $_POST['month'];
    if ($pMethod == 'cash') {
        $conn->query("INSERT INTO `salary_payment` (`empID`, `payment_date`, `amount`, `payment_method`, `bankID`, `monthID`) VALUES ( '" . $empID . "', '" . $date . "', '" . $amount . "', '" . $pMethod . "', '0', '" . $month . "')");
    } elseif ($pMethod == 'bank') {
        $bank = $_POST['selBank'];
        $conn->query("INSERT INTO `salary_payment` (`empID`, `payment_date`, `amount`, `payment_method`, `bankID`, `monthID`) VALUES ( '" . $empID . "', '" . $date . "', '" . $amount . "', '" . $pMethod . "', '" . $bank . "', '" . $month . "')");
    }
?>
    <script>
        window.location.assign('showsallarypayment.php');
    </script>
<?php
}
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
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
                        <h3 class="card-title">Bordered Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="empID">Employee Name</label>
                                        <select name="empID" id="empID" class="form-control" readonly>
                                            <option value="<?php echo $_GET['empID'] ?>">
                                                <?php
                                                $empID = $_GET['empID'];
                                                $emp = $conn->query("select * from employee where empID=$empID");
                                                $e = $emp->fetch_assoc();
                                                echo $e['name'];
                                                ?>
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="month">Month</label>
                                        <select name="month" id="month" class="form-control" readonly>
                                            <option value="<?php echo $_GET['month'] ?>">
                                                <?php
                                                $month = $_GET['month'];
                                                $mon = $conn->query("select * from salary_month where id=$month");
                                                $m = $mon->fetch_assoc();
                                                echo $m['month'];
                                                ?>
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="amount">Amount</label>
                                        <input type="text" name="amount" class="form-control" id="amount" value="<?php echo $_GET['amount'] ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="date">Payment Date</label>
                                        <input type="text" name="date" class="form-control" id="date" value="<?php echo $_GET['payDate'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pMethod">Payment Method</label>
                                        <select name="pMethod" id="pMethod" class="form-control">
                                            <option value="cash">Cash</option>
                                            <option value="bank">Bank</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group" id="bankinf">
                                        <label for="selBank">Bank</label>
                                        <select name="selBank" id="selBank" class="form-control">
                                            <option value="0">select bank</option>
                                            <?php
                                            $bank = $conn->query("select * from bank where status='active'");
                                            while ($b = $bank->fetch_assoc()) { ?>
                                                <option value="<?php echo $b['bankID'] ?>"><?php echo $b['bank_name'] ?></option>
                                            <?php
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-info btn-block">Submit</button>

                        </form>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<?php require("footer.php"); ?>