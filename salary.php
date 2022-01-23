<?php
require_once("header.php");
require_once("sidebar.php");
$benifits = $conn->query("select * from benefits");
$employee = $conn->query("select * from employee");
?>
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class=" text-center" >Salary Sheet</h1>
            </div>
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home </a></li>
                    <li class="breadcrumb-item"><a href="#">Salary Sheet </a></li>
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

                        <div class="col-md-4">
                            <form action="" method="post">
                                <input type="text" class="form-control" name="date" id="demo-2" placeholder="Search Month">
                                <input type="submit" class="btn btn-block btn-info mt-1" value="Search">
                            </form>

                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Working Days</th>
                                    <th>Leave</th>
                                    <th>Present</th>
                                    <th>Absent</th>
                                    <th>Basic Salary</th>
                                    <?php while ($b = $benifits->fetch_assoc()) { ?>
                                        <th><?php echo $b['title'] ?></th>
                                    <?php
                                    }
                                    ?>
                                    <th>Absent Deduct</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_POST['date'])) {
                                    $dt = $_POST['date'];
                                    $month = $conn->query("SELECT * FROM `salary_month` where month='$dt'");
                                    if ($month->num_rows > 0) {
                                        $mn = $month->fetch_assoc();
                                        $sm = explode("-", $mn['month']);
                                    } else { ?>
                                        <tr class="table-danger">
                                            <td colspan="100%"><?php echo "No data found for Searched Month!!! Last month's data Showing." ?></td>
                                        </tr>
                                        <?php
                                        $slmn = $conn->query("SELECT * FROM `salary_month` ORDER by month DESC LIMIT 1");
                                        $slm = $slmn->fetch_assoc();
                                        $sm = explode("-", $slm['month']);
                                    }
                                } else {
                                    $slmn = $conn->query("SELECT * FROM `salary_month` ORDER by month DESC LIMIT 1");
                                    $slm = $slmn->fetch_assoc();
                                    $sm = explode("-", $slm['month']);
                                }
                                while ($e = $employee->fetch_assoc()) {
                                    $empID = $e['empID'];

                                    ?>
                                    <tr>
                                        <td><?php echo $e['name'] ?></td>
                                        <td>
                                            <?php
                                             $dcount = cal_days_in_month(CAL_GREGORIAN, $sm[1], $sm[0]);
                                             $dc=$dcount;
                                            for ($x = 1; $x <= $dc; $x++) {
                                                $date = $sm[0] . '-' . $sm[1] . '-' . $x;

                                                if (date('l', strtotime($date)) == 'Friday') {
                                                    $dcount--;
                                                   // echo $date.'--'.date('l', strtotime($date)).'<br>';
                                                }
                                                
                                            }
                                             $holiday = $conn->query("SELECT * FROM `holiday` WHERE start_date LIKE '" . $sm[0] . "-" . $sm[1] . "%'");
                                             // var_dump($holiday);
                                             $hh=0;
                                            while ($h = $holiday->fetch_assoc()) {
                                                $start = $h['start_date'];
                                                $end = $h['end_date'];
                                                $date1 = date_create($start);
                                                $date2 = date_create($end);
                                                $diff = date_diff($date1, $date2);
                                                $hl = $diff->days;
                                                $dcount -= $hl;
                                                $hh+=$hl;
                                            }
                                            // echo $hh;
                                            echo $dcount;
                                            $working_day = $dcount;
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $leave = $conn->query("SELECT * FROM `leave_application` WHERE empID=$empID AND status='approved' AND start_date LIKE '" . $sm[0] . "-" . $sm[1] . "%'");
                                            $total_leave = 0;
                                            while ($l = $leave->fetch_assoc()) {
                                                $start = $l['start_date'];
                                                $end = $l['end_date'];
                                                $date1 = date_create($start);
                                                $date2 = date_create($end);
                                                $diff = date_diff($date1, $date2);
                                                $hl = $diff->days;
                                                $total_leave += $hl;
                                            }
                                            echo $total_leave;
                                            $wrk_without_lv = $working_day - $total_leave;
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $present = 0;
                                            for ($x = 1; $x <= 31; $x++) {
                                                $date = $sm[0] . '-' . $sm[1] . '-' . sprintf("%02d", $x);
                                                $out = $conn->query("SELECT * FROM `attendance` WHERE empID=$empID AND punch_time LIKE '" . $date . "%' AND type='out_time' ORDER BY punch_time DESC LIMIT 1");
                                                if ($out->num_rows > 0) {
                                                    $in = $conn->query("SELECT * FROM `attendance` WHERE empID=$empID AND punch_time LIKE '" . $date . "%' AND type='in_time' ORDER BY punch_time ASC LIMIT 1");
                                                    $in_time = $in->fetch_assoc();
                                                    $out_time = $out->fetch_assoc();
                                                    $entry = explode(' ', $in_time['punch_time']);
                                                    $exit = explode(' ', $out_time['punch_time']);
                                                    if (strtotime($entry[1]) <= strtotime('9:00') && strtotime($exit[1]) >= strtotime('16.00')) {
                                                        $present++;
                                                    }
                                                }
                                            }
                                            echo $present;
                                            ?>
                                        </td>
                                        <td>
                                            <?php $absent=$wrk_without_lv-$present;
                                                echo $absent;
                                            ?>
                                        </td>
                                        <td>
                                            <?php $basic_salary=$e['basic_salary'];
                                                echo $basic_salary;
                                            ?>
                                        </td>
                                        <?php
                                        $slad=$conn->query("select * from benefits");
                                        $net_salary=$basic_salary;
                                        while ($sad = $slad->fetch_assoc()) { 
                                            if ($sad['type']=="add") {
                                                $amount=$sad['amount'];
                                                $add=($basic_salary/100)*$amount;
                                                $net_salary+=$add; ?>
                                                <td><?php echo $add ?></td>
                                            <?php
                                            }elseif ($sad['type']=="deduct") {
                                                $amount=$sad['amount'];
                                                $deduct=($basic_salary/100)*$amount;
                                                $net_salary-=$deduct; ?>
                                                <td><?php echo "($deduct)" ?></td>
                                            <?php
                                            }
                                        }?>
                                        <td>
                                            <?php
                                                $absentCut=(1 / 100) * $basic_salary;
                                                if ($absentCut<200) {
                                                    $paycut=$absent*200;
                                                }else{
                                                    $paycut=$absent*$absentCut;
                                                }
                                                
                                                echo "($paycut)";
                                                $net_salary-=$paycut;
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo $net_salary;
                                            ?>
                                        </td>
                                        <td>
                                            <?php $date=$sm[0] . '-' . $sm[1]; 
                                            $month=$conn->query("SELECT * FROM salary_month where month='$date'");
                                            $mon=$month->fetch_assoc();
                                            $mID=$mon["id"];
                                            ?>
                                            <a href="salaryPayMethod.php?empID=<?php echo $empID ?>&payDate=<?php echo date("Y-m-d") ?>&amount=<?php echo $net_salary ?>&month=<?php echo $mID ?>" class="btn btn-info"> Pay Now </a>
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