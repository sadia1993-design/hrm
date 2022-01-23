<?php

$page = "View Leave Information";
require_once("header.php");
require_once("sidebar.php");



$id = $_GET['id'];
$status = $_GET['status'];
$leaveType = $_GET['leaveType'];

$approved_table = $conn->query("SELECT L.`applicationID`,L.`empID`,employee.name,L.`typeID`,leave_type.title, L.`start_date`,L.`end_date`,L.`comment`,L.`status`,leave_type.allowed_leave  FROM `leave_application`AS L JOIN employee ON employee.empID = L.empID JOIN leave_type ON leave_type.typeID=L.typeID WHERE L.`empID` = '$id' AND L.`status` = '$status' AND L.`typeID` = '$leaveType' ");

//$fetch = $approved_table->fetch_assoc();


/* leave type */
$all_leave_type = $conn->query("SELECT * FROM `leave_type` ");



?>



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
                    <div class="card-header mb-0">
                        <?php
                        $approved_emp_name = $conn->query("SELECT L.`applicationID`,L.`empID`,employee.name,L.`typeID`,leave_type.title, L.`start_date`,L.`end_date`,L.`comment`,L.`status`,leave_type.allowed_leave  FROM `leave_application`AS L JOIN employee ON employee.empID = L.empID JOIN leave_type ON leave_type.typeID=L.typeID WHERE L.`empID` = '$id' AND L.`status` = '$status' AND L.`typeID` = '$leaveType' ");
                        $fetch = $approved_emp_name->fetch_assoc();
                        ?>
                        <h4 class="text-info">
                            <strong>Leave Application information of:
                                <?php
                                if (!isset($_GET['leaveType'])) {
                                    echo "no info available ";
                                } else {
                                    echo $fetch['name']; 
                                }
                                ?>
                            </strong>
                        </h4>
                    </div>


                    <div class="card-body">
                        <table class="table table-bordered table-hover table-striped" style="text-align: center;">
                            <tr>
                                <th>Leave Type</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Apply Day</th>
                                <th>Reason </th>
                                <th>Status</th>
                            </tr>
                            <?php


                            $row_numb =  mysqli_num_rows($approved_table);
                            $day_sum = 0;
                            while ($fetch = $approved_table->fetch_assoc()) {

                            ?>

                                <tr>
                                    <td class="align-middle"><?php if ($fetch['title']) {
                                                                    echo  $fetch['title'];
                                                                } ?></td>
                                    <td class="align-middle"><?php if ($fetch['start_date']) {
                                                                    echo $fetch['start_date'];
                                                                } ?></td>
                                    <td class="align-middle"><?php echo $fetch['end_date']; ?></td>
                                    <td class="align-middle">
                                        <?php
                                        $diff = abs(strtotime($fetch['end_date']) - strtotime($fetch['start_date']));
                                        $years = floor($diff / (365 * 60 * 60 * 24));
                                        $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                                        $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
                                        echo $days;
                                        $day_sum = $day_sum + $days;
                                        ?>
                                    </td>
                                    <td class="align-middle"><?php echo $fetch['comment']; ?></td>
                                    <td class="align-middle"><?php echo $fetch['status']; ?></td>
                                </tr>

                            <?php
                            }

                            ?>

                        </table>


                    </div>
                </div>
            </div>
        </div>

        <?php

        if ($status == "approved") { ?>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="box-info">
                        <table class="table table-bordered">
                            <tbody>
                                <?php

                                $approved_table = $conn->query("SELECT L.`applicationID`,L.`empID`,employee.name,L.`typeID`,leave_type.title, L.`start_date`,L.`end_date`,L.`comment`,L.`status`,leave_type.allowed_leave  FROM `leave_application`AS L JOIN employee ON employee.empID = L.empID JOIN leave_type ON leave_type.typeID=L.typeID WHERE L.`empID` = '$id' AND L.`status` = '$status' AND L.`typeID` = '$leaveType' ");
                                $fetch = $approved_table->fetch_assoc();

                                ?>
                                <tr>
                                    <th>Allowed <?php echo $fetch['title']; ?> :</th>
                                    <td><?php echo $fetch['allowed_leave']; ?></td>
                                </tr>
                                <tr>
                                    <th>Total approved <?php echo $fetch['title']; ?> :</th>
                                    <td><?php echo $row_numb; ?></td>
                                </tr>
                                <tr>
                                    <th>Total leave taken (in days) :</th>
                                    <td><?php echo $day_sum; ?></td>
                                </tr>
                                <tr>
                                    <?php $remaining = $fetch['allowed_leave'] - $day_sum; ?>
                                    <th>Remaining <?php echo $fetch['title']; ?> :</th>
                                    <td>
                                        <?php
                                        if ($remaining < 1) {
                                            echo "<div class='remaining_leave'>0</div>";
                                        } else {
                                            echo $remaining;
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Extra <?php echo $fetch['title']; ?>taken :</th>
                                    <td>
                                        <?php
                                        if ($remaining < 0) {
                                            echo abs($remaining);
                                        } else {
                                            echo "0";
                                        }
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        <?php
        }
        ?>


    </div>
</section>


<?php require("footer.php"); ?>