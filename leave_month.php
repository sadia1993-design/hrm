<?php

$page = "Leave Application (monthly)";
require_once("header.php");
require_once("sidebar.php");

$emp_table = $conn->query("SELECT empID, name FROM employee");
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
                    <div class="card-header text-center">
                        <h3 class="text-primary  font-weight-bold mb-0">Show leave information (monthly)</h3>
                    </div>


                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>
                                    <label for="days">Select Employee</label>
                                    <select class="form-control" id="employeeId">
                                        <option value="">Select Employee</option>
                                        <?php
                                        while ($emp = $emp_table->fetch_assoc()) { ?>
                                            <option value="<?php echo $emp['empID']; ?>"><?php echo $emp['name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </th>
                                <th>
                                    <div class="row">
                                        <div class="col">
                                            <label for="startDate">Month</label>
                                            <input name="startDate" id="startDate" class="date-picker form-control " />
                                        </div>

                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" class="btn btn-block btn-primary" value="search" id="search">
                                </td>
                            </tr>
                        </table>

                        <hr>


                        <!--   show leave info -->
                        <div class="monthSearch"></div>


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
        $('.date-picker').datepicker({
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            dateFormat: 'yy-mm',

            onClose: function() {
                var iMonth = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                var iYear = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                $(this).datepicker('setDate', new Date(iYear, iMonth, 1));
            },

            beforeShow: function() {
                if ((selDate = $(this).val()).length > 0) {
                    iYear = selDate.substring(selDate.length - 4, selDate.length);
                    iMonth = jQuery.inArray(selDate.substring(0, selDate.length - 5),
                        $(this).datepicker('option', 'monthNames'));
                    $(this).datepicker('option', 'defaultDate', new Date(iYear, iMonth, 1));
                    $(this).datepicker('setDate', new Date(iYear, iMonth, 1));
                }
            }
        });


        //search 
        $('#search').on('click', function(e) {
            var employeeId = $('#employeeId').val();
            var startDate = $('#startDate').val();

            //ajax call
            $.ajax({
                url: "leave_search.php",
                method: "get",
                data: {
                    "employee_id": employeeId,
                    "start_date": startDate
                },
                success: function(data) {
                    $('.monthSearch').html(data);
                }
            })

        });
                                      
    });
</script>