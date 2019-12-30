<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
	<meta name="robots" content="none">
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	<script>
		window.onload = function () {
			var chart = new CanvasJS.Chart("chartContainer", {
				animationEnabled: true,
				title: {
					text: "Evolution de la partie reading"
				},
				axisY: {
					title: "Score"
				},
				data: [{
					type: "line",
					dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
				}]
			});
		chart.render();
		}
	</script>
</head>

<body>
	<div id="chartContainer" style="height: 300px; width: 100%;"></div>
</body>
</html>