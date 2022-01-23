<?php
@session_start();

require("db_config.php");
if (isset($_GET['employee_id'])) {
    $employee_id = $_GET['employee_id'];
    $start_date = $_GET['start_date'];

    $search_info = $conn->query("SELECT L.applicationID, L.empID, employee.name, L.typeID, leave_type.title, leave_type.allowed_leave, L.start_date, L.end_date, L.comment, L.status FROM leave_application AS L JOIN employee ON employee.empID = L.empID JOIN leave_type ON leave_type.typeID = L.typeID where L.empID=$employee_id AND status = 'approved' AND start_date LIKE '$start_date%'");

    $output = '';

    if (empty($employee_id) || empty($start_date)) {
        $styles= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                     Fields can't be empty!!
                </div>";
        echo $styles;
    }

    //if not empty
    else {
        if (mysqli_num_rows($search_info) > 0) {
            $output = "<table class='table table-bordered table-hover table-striped text-center'>
                    <tr>
                        <th>Leave Type</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Apply Day</th>
                        <th>Comment</th>
                        <th>Status</th>
                    </tr>";

            $day_sum = 0;
            while ($row = mysqli_fetch_assoc($search_info)) {
                $diff = abs(strtotime($row['end_date']) - strtotime($row['start_date']));
                $years = floor($diff / (365 * 60 * 60 * 24));
                $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

                $day_sum += $days;
                $output .= "<tr>
                                    <td class='align-middle'>{$row['title']}</td>
                                    <td class='align-middle'>{$row['start_date']}</td>
                                    <td class='align-middle'>{$row['end_date']}</td>
                                    <td class='align-middle'> {$days} </td>
                                    <td class='align-middle'>{$row['comment']}</td>
                                    <td class='align-middle'>{$row['status']}</td>                    
                        
                                    </tr>";
            }

            $output .= "<tr><th colspan='3'>Total leave (in days)</th><td>{$day_sum}</td></tr>";

            $output .= "</table>";
            echo $output;
        } else {
            echo "No record found";
        }
    }
}
