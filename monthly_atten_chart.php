<?php 
require_once("header.php");
require_once("sidebar.php");




    // echo "<pre>";
    // print_r($emp);

    // For searching




?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <!-- <h1></h1> -->
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="add_emp.php">Home / Attendance Report</a></li>
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
            <h2 class="mt-2" style="text-align: center;">Monthly Attendance Report</h2>
          </div>
          <!-- /.card-header -->
          <div class="card-body">


            <form action="" method="post">
              <input type="date" name="search_date" class="form-control" placeholder="Search by employee date">

              <input type="submit" name="search" value="Search" class="btn btn-sm btn-info mt-2">
              <br>

            </form>
            <table class="table table-striped table-hover">
              <tr>
                <th>SL</th> 
                <th>Date</th> 
                <th>Present</th>
                <th>Absent</th> </tr>





                

                <?php 
                $total_absent=0;
                $total_present=0;
                $i=0;
                $dd=date('Y-d');
                if(isset($_POST['search'])){
                   $search_date=explode('-',$_POST['search_date']);
                   $da=30;
                   $dd=$search_date[0].'-'.$search_date[1];

                 }else{
                   $da=date('d');
                 }
               
                for ($x = 1; $x <=$da; $x++) { 
                 if(isset($_POST['search'])){
                   $search_date=explode('-',$_POST['search_date']);
                   $date=$search_date[0].'-'.$search_date[1].'-'.sprintf('%02d', $x);

                 }else{
                   $date=date('Y-m').'-'.sprintf('%02d', $x);
                 }
                 $emp=$conn->query("SELECT `empID`,`name`FROM `employee`");
                 while ($emp_data=$emp->fetch_assoc()) { 

                  $id=$emp_data['empID'];

                  $in=$conn->query("SELECT * FROM `attendance` WHERE empID= $id AND type='in_time' AND punch_time like '$date%' ORDER BY punch_time ASC limit 1");


                  $out=$conn->query("SELECT * FROM `attendance` WHERE empID= $id AND type='out_time' AND punch_time like '$date%' ORDER BY punch_time ASC limit 1");


                  $in_time=$in->fetch_assoc();
                  $out_time=$out->fetch_assoc();


                  $t=explode(' ', @$in_time['punch_time']);
                  $o=explode(' ', @$out_time['punch_time']);


                  ?>  


                  <?php 

                  if(isset(($t[1]))){
                    if (strtotime($t[1])<=strtotime('9:00') && strtotime($o[1])>=strtotime('16:00') ) {

                       $total_present+=1;
                    }else{
                       $total_absent+=1;
                    } 
                  }
                  ?>

                <?php }
                 } ?>


                <style>
                #chartdiv {
                  width: 80%;
                  height: 500px;
                }

              </style>

              <!-- Resources -->
              <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
              <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
              <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

              <!-- Chart code -->
              <script>
                am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.PieChart);

// Add data
chart.data = [ {
  "country": "Present",
  "litres": <?php echo $total_present; ?>
}, {
  "country": "Absent",
  "litres": <?php echo $total_absent; ?>
}, 
];

// Add and configure Series
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "litres";
pieSeries.dataFields.category = "country";
pieSeries.slices.template.stroke = am4core.color("#fff");
pieSeries.slices.template.strokeOpacity = 1;

// This creates initial animation
pieSeries.hiddenState.properties.opacity = 1;
pieSeries.hiddenState.properties.endAngle = -90;
pieSeries.hiddenState.properties.startAngle = -90;

chart.hiddenState.properties.radius = am4core.percent(0);


}); // end am4core.ready()
</script>

<!-- HTML -->
<div id="chartdiv"></div>
<td><?php echo ++$i;?></td>
<td><?php echo $dd; ?></td>
<td><?php echo $total_present;?></td>
<td><?php echo $total_absent; ?></td>
</div>
</div>
<!-- /.card -->
</div>
</div>
</div><!-- /.container-fluid -->
</table>
</section>

<?php require("footer.php"); ?>