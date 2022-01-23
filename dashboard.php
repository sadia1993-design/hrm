<?php
require_once("header.php");
require_once("sidebar.php"); 
?>


<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1> <i class="fas fa-home"></i> Dashboard</h1>
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
            <h2 class="card-title text-center">Income & Expense Report</h2>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          
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

                var container = am4core.create("chartdiv", am4core.Container);
                container.width = am4core.percent(100);
                container.height = am4core.percent(100);
                container.layout = "horizontal";


                var chart = container.createChild(am4charts.PieChart);

                // Add data
                chart.data = [
                  <?php
                  $ifd = date('Y-m-01');
                  $ild  = date('Y-m-t');
                  $income_total = $conn->query("SELECT SUM(amount) as in_total FROM `income` WHERE `date` BETWEEN '" . $ifd . "' AND '" . $ild . "'");
                  $in_total = $income_total->fetch_assoc();

                  ?> {
                    "country": "Income",
                    "litres": <?php $int=0; ($in_total['in_total']!='')? $int=$in_total['in_total']:$int=0; echo $int; ?>,
                    "subData": [
                      <?php
                      $income=$conn->query("SELECT * FROM income JOIN income_source ON income_source.id=income.sourceID WHERE income.date BETWEEN '".$ifd."' AND '".$ild."'");
                      while ($i=$income->fetch_assoc()) {?>{
                        name: "<?php echo $i['name']?>",
                        value: <?php echo $i['amount']?>
                      },
                      <?php
                      }
                      ?>

                    ]
                  },
                  <?php
                  $efd = date('Y-m-01');
                  $eld  = date('Y-m-t');
                  $expense_total = $conn->query("SELECT SUM(amount) as exp_total FROM `expense` WHERE `date` BETWEEN '" . $ifd . "' AND '" . $ild . "'");
                  $exp_total = $expense_total->fetch_assoc();

                  ?> {
                    "country": "Expense",
                    "litres": <?php $expt=0; ($exp_total['exp_total']!='')?$expt= $exp_total['exp_total']:$expt= 0; echo $expt; ?>,
                    "subData": [
                      <?php
                      $expense=$conn->query("SELECT * FROM expense JOIN expense_category ON expense.categoryID=expense_category.id WHERE expense.date BETWEEN '".$efd."' AND '".$eld."'");
                      while ($e=$expense->fetch_assoc()) {?>{
                        name: "<?php echo $e['category_name'] ?>",
                        value: <?php echo $e['amount'] ?>
                      },
                      <?php
                      }
                      ?>

                    ]
                  },
                ];

                // Add and configure Series
                var pieSeries = chart.series.push(new am4charts.PieSeries());
                pieSeries.dataFields.value = "litres";
                pieSeries.dataFields.category = "country";
                pieSeries.slices.template.states.getKey("active").properties.shiftRadius = 0;
                //pieSeries.labels.template.text = "{category}\n{value.percent.formatNumber('#.#')}%";

                pieSeries.slices.template.events.on("hit", function(event) {
                  selectSlice(event.target.dataItem);
                })

                var chart2 = container.createChild(am4charts.PieChart);
                chart2.width = am4core.percent(30);
                chart2.radius = am4core.percent(80);

                // Add and configure Series
                var pieSeries2 = chart2.series.push(new am4charts.PieSeries());
                pieSeries2.dataFields.value = "value";
                pieSeries2.dataFields.category = "name";
                pieSeries2.slices.template.states.getKey("active").properties.shiftRadius = 0;
                //pieSeries2.labels.template.radius = am4core.percent(50);
                //pieSeries2.labels.template.inside = true;
                //pieSeries2.labels.template.fill = am4core.color("#ffffff");
                pieSeries2.labels.template.disabled = true;
                pieSeries2.ticks.template.disabled = true;
                pieSeries2.alignLabels = false;
                pieSeries2.events.on("positionchanged", updateLines);

                var interfaceColors = new am4core.InterfaceColorSet();

                var line1 = container.createChild(am4core.Line);
                line1.strokeDasharray = "2,2";
                line1.strokeOpacity = 0.5;
                line1.stroke = interfaceColors.getFor("alternativeBackground");
                line1.isMeasured = false;

                var line2 = container.createChild(am4core.Line);
                line2.strokeDasharray = "2,2";
                line2.strokeOpacity = 0.5;
                line2.stroke = interfaceColors.getFor("alternativeBackground");
                line2.isMeasured = false;

                var selectedSlice;

                function selectSlice(dataItem) {

                  selectedSlice = dataItem.slice;

                  var fill = selectedSlice.fill;

                  var count = dataItem.dataContext.subData.length;
                  pieSeries2.colors.list = [];
                  for (var i = 0; i < count; i++) {
                    pieSeries2.colors.list.push(fill.brighten(i * 2 / count));
                  }

                  chart2.data = dataItem.dataContext.subData;
                  pieSeries2.appear();

                  var middleAngle = selectedSlice.middleAngle;
                  var firstAngle = pieSeries.slices.getIndex(0).startAngle;
                  var animation = pieSeries.animate([{
                    property: "startAngle",
                    to: firstAngle - middleAngle
                  }, {
                    property: "endAngle",
                    to: firstAngle - middleAngle + 360
                  }], 600, am4core.ease.sinOut);
                  animation.events.on("animationprogress", updateLines);

                  selectedSlice.events.on("transformed", updateLines);

                  //  var animation = chart2.animate({property:"dx", from:-container.pixelWidth / 2, to:0}, 2000, am4core.ease.elasticOut)
                  //  animation.events.on("animationprogress", updateLines)
                }


                function updateLines() {
                  if (selectedSlice) {
                    var p11 = {
                      x: selectedSlice.radius * am4core.math.cos(selectedSlice.startAngle),
                      y: selectedSlice.radius * am4core.math.sin(selectedSlice.startAngle)
                    };
                    var p12 = {
                      x: selectedSlice.radius * am4core.math.cos(selectedSlice.startAngle + selectedSlice.arc),
                      y: selectedSlice.radius * am4core.math.sin(selectedSlice.startAngle + selectedSlice.arc)
                    };

                    p11 = am4core.utils.spritePointToSvg(p11, selectedSlice);
                    p12 = am4core.utils.spritePointToSvg(p12, selectedSlice);

                    var p21 = {
                      x: 0,
                      y: -pieSeries2.pixelRadius
                    };
                    var p22 = {
                      x: 0,
                      y: pieSeries2.pixelRadius
                    };

                    p21 = am4core.utils.spritePointToSvg(p21, pieSeries2);
                    p22 = am4core.utils.spritePointToSvg(p22, pieSeries2);

                    line1.x1 = p11.x;
                    line1.x2 = p21.x;
                    line1.y1 = p11.y;
                    line1.y2 = p21.y;

                    line2.x1 = p12.x;
                    line2.x2 = p22.x;
                    line2.y1 = p12.y;
                    line2.y2 = p22.y;
                  }
                }

                chart.events.on("datavalidated", function() {
                  setTimeout(function() {
                    selectSlice(pieSeries.dataItems.getIndex(0));
                  }, 1000);
                });


              }); // end am4core.ready()
            </script>

            <!-- HTML -->
            <div id="chartdiv" class="pb-5"></div>
            <?php 
            
            ?>
            <h2 class="text-center  my-5">Notice Board</h2>
            <table class="table table-bordered">
              <tr class="bg-info">
                <th>Title</th>
                <th>Date</th>
                <th>Details</th>
              </tr>
              <tr>
                <?php
                $db=$conn->query("SELECT * FROM `notice` ORDER BY date DESC LIMIT 4");
                while ($i = $db->fetch_assoc()) { ?>

                  <td><?php echo $i['title'] ?></td>
                  <td><?php echo $i['date'] ?></td>
                  <td><?php echo $i['details'] ?></td>
              </tr>
            <?php } ?>
            </table>

          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<?php require("footer.php"); ?>