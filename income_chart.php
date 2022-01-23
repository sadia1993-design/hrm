<?php 
require_once("header.php");
require_once("sidebar.php");?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Income</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Income</li>
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
            <h3 class="card-title">Source Wise Income Report</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
           <!-- Styles -->
           <style>
            #chartdiv {
              width: 100%;
              height: 400px;
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

<?php
$t=$conn->query("SELECT * FROM `income_source`");

?>
// Add data
chart.data = [ 
<?php $i=0; while ($incomeSource=$t->fetch_assoc()) {
  $mm=$conn->query( "SELECT sum(amount) AS total FROM `income` WHERE `sourceID`=".$incomeSource['id']);

  $chart=$mm->fetch_assoc();

  ?>

  { 
    "country": "<?php echo $incomeSource['name'] ?>",
    "litres": <?php echo $chart['total'] ?>

  },

<?php } ?>
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
<?php
$t=$conn->query("SELECT * FROM `income_source`");

?>

<h3 class="text-center mb-3">Income Source List</h3>
<div class="container">
  <table class="table table-bordered text-center">
   <thead>
     <tr>
       <th>SL</th>
       <th>Source Name</th>
       <th>Amount</th>
     </tr>
   </thead>
   <tbody>

    <?php $i=0; while ($incomeSource=$t->fetch_assoc()) {
      $mm=$conn->query( "SELECT sum(amount) AS total FROM `income` WHERE `sourceID`=".$incomeSource['id']);

      $chart=$mm->fetch_assoc();

      ?>

      <tr>
       <td><?php echo ++$i ?></td>
       <td><?php echo $incomeSource['name'] ?></td>
       <td><?php echo $chart['total']?></td> 
     </tr>

   <?php  } ?>
 </tbody>
</table>
</div>
</div>
</div>
<!-- /.card -->
</div>
</div>
</div><!-- /.container-fluid -->
</section>

<?php require("footer.php"); ?>