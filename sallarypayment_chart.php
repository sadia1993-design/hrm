<?php 
require_once("header.php");
require_once("sidebar.php");?>






 


<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Salary Payment Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Salary Payment Report</a></li>
              <!-- <li class="breadcrumb-item active"></li> -->
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section >
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Salary Payment Report</h3>

              </div>


<!-- Styles -->
<style>
#chartdiv {
  width: 100%;
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
var chart = am4core.create("chartdiv", am4charts.XYChart);
chart.paddingRight = 20;


// Add data
chart.data = [   <?php 
                    $sum =0;
                     $m=$conn->query("SELECT * FROM salary_month");
   
                    while($ii=$m->fetch_assoc()){

                       $b=$conn->query("SELECT SUM(amount)AS total FROM `salary_payment` WHERE `monthID`=".$ii['id']);

                        $nn=$b->fetch_assoc();


                      ?>
 
 {
  "year": "<?php echo $ii['month']?>",
  "value": <?php  if ($nn['total']>0) {
        echo $nn['total'];
} else {
  echo 0;
}

 ?>
   },                   

      <?php   } ?>          
            
 
];

// Create axes
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "year";
categoryAxis.renderer.minGridDistance = 50;
categoryAxis.renderer.grid.template.location = 0.5;
categoryAxis.startLocation = 0.5;
categoryAxis.endLocation = 0.5;

// Create value axis
var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.baseValue = 0;

// Create series
var series = chart.series.push(new am4charts.LineSeries());
series.dataFields.valueY = "value";
series.dataFields.categoryX = "year";
series.strokeWidth = 2;
series.tensionX = 0.77;

// bullet is added because we add tooltip to a bullet for it to change color
var bullet = series.bullets.push(new am4charts.Bullet());
bullet.tooltipText = "{valueY}";

bullet.adapter.add("fill", function(fill, target){
    if(target.dataItem.valueY < 0){
        return am4core.color("#FF0000");
    }
    return fill;
})
var range = valueAxis.createSeriesRange(series);
range.value = 0;
range.endValue = -1000;
range.contents.stroke = am4core.color("#FF0000");
range.contents.fill = range.contents.stroke;

// Add scrollbar
var scrollbarX = new am4charts.XYChartScrollbar();
scrollbarX.series.push(series);
chart.scrollbarX = scrollbarX;

chart.cursor = new am4charts.XYCursor();

}); // end am4core.ready()
</script>

<!-- HTML -->
<div id="chartdiv"></div>



            </div>
            <!-- /.card-header -->
            <div class="container">
              <div class="rowclearfix">
                <div class="col-md-2">
                  <br>
                  <a href="#" class="button-button-info"></a>



                </div>
                  <form action="" method="POST"> 
         


          </div>
         
        </form>




                <div>
               
                <div class="col-md-12">
                  <h3>Salary Payment</h3>
                  <table class="table table-bordered table-striped hover" >
                    <thead >

                      <tr >

                       <!--  <th>paymentID</th> -->

                      
                       <th>Month</th>
                       <th>Amount</th>
                     



                     </tr>

                     
                   </thead>
                   
                   

                    <?php 
                    $sum =0;
                     $m=$conn->query("SELECT * FROM salary_month");
   
                    while($ii=$m->fetch_assoc()){

                       $b=$conn->query("SELECT SUM(amount)AS total FROM `salary_payment` WHERE `monthID`=".$ii['id']);

                        $nn=$b->fetch_assoc();


                      ?>
                      <tr>


                    
                      
                      <td><?php echo $ii['month']?></td>
                  
                      <td><?php 
                      if ($nn['total']>0) {
  echo $nn['total'];
} else {
  echo "0";
}

                       ?></td>


                   </tr>
                 <?php } ?> 


               </table>

             </div>



           </div>

         </div>


       </div>

     </div>
   </div>
   <!-- /.card -->
 </div>
</div>
</div><!-- /.container-fluid -->
</section>

<?php require("footer.php"); ?>