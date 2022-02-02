<?php
	session_start();
	require_once '../connection/connect.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: adminlogin.php');
	}
?>
<?php include 'admintemp/header.php'; ?>

<?php include 'admintemp/nav.php'; ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">

google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);


function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Sales per Day'],
  ['MOBILE', 50],
  ['COMPUTER', 30],
  ['TV', 20]
]);

  
  var options = {'title':'Sales', 'width':550, 'height':400};

  
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
	<section>
		<div>
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
						<h1 id="h1">WELCOME ADMIN</h1>
					</div>
					<div class="col">
						<div class="row">
							<div id="piechart" style="padding-left:375px;width: 550px; height: 300px"></div>
						</div>

					</div>


					</div>
				</div>
			</div>
		</div>
	</section>

