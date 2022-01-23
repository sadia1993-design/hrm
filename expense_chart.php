<?php
require_once("header.php");
require_once("sidebar.php");
?>
<?php
//$expense_data=$conn->query("SELECT `categoryID`,`amount`FROM `expense`");
//$mm=$conn->query("SELECT `categoryID` FROM `expense`");
$rs = $conn->query("SELECT * FROM `expense_category`");



?>

<style>
	#chartdiv {
		width: 100%;
		height: 300px;
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

		var chart = am4core.create("chartdiv", am4charts.PieChart3D);
		chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

		chart.data = [
			<?php $i = 0;
			while ($expense = $rs->fetch_assoc()) {
				$mm = $conn->query("SELECT SUM(amount)AS total FROM `expense` WHERE `categoryID`=" . $expense['id']);
				$ps = $mm->fetch_assoc();

			?> {
					country: "<?php echo $expense['category_name'] ?>",
					litres: <?php $pst=0; ($ps['total']>0)? $pst= $ps['total']:$pst=0; echo $pst; ?>
				},




			<?php   } ?>







		];

		chart.innerRadius = am4core.percent(40);
		chart.depth = 120;

		chart.legend = new am4charts.Legend();

		var series = chart.series.push(new am4charts.PieSeries3D());
		series.dataFields.value = "litres";
		series.dataFields.depthValue = "litres";
		series.dataFields.category = "country";
		series.slices.template.cornerRadius = 5;
		series.colors.step = 3;

	}); // end am4core.ready()
</script>


<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Expense Report</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body" stle="padding-top: 50px">
						<div id="chartdiv"></div>

						<?php
						//$expense_data=$conn->query("SELECT `categoryID`,`amount`FROM `expense`");
						//$mm=$conn->query("SELECT `categoryID` FROM `expense`");
						$rs = $conn->query("SELECT * FROM `expense_category`");



						?>

						<h3 class="text-center mb-4 mt-4">Expense List</h3>

						<div class="container">
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th>SL</th>
										<th>Category</th>
										<th>Amount</th>

								</thead>

								<tbody>

									<?php $i = 0;
									while ($expense = $rs->fetch_assoc()) {
										$mm = $conn->query("SELECT SUM(amount)AS total FROM `expense` WHERE `categoryID`=" . $expense['id']);
										$ps = $mm->fetch_assoc();

									?>



										<tr>
											<td><?php echo ++$i ?></td>
											<td><?php echo $expense['category_name'] ?></td>
											<td><?php $pst=0; ($ps['total']>0)? $pst= $ps['total']:$pst=0; echo $pst; ?></td>

											<td>

											</td>
										</tr>
									<?php   } ?>



								</tbody>

							</table>



						</div>
					</div>
					<!-- /.card -->
				</div>
			</div>
		</div><!-- /.container-fluid -->
</section>


<?php require("footer.php"); ?>
<!-- HTML -->