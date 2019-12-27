<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Vos statistiques</title>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <script>
	window.onload = function () {
	 
	var chart = new CanvasJS.Chart("chartContainer", {
		title: {
			text: "Evolution du score"
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
	<div class="row">
		<h1>Vos Statistiques</h1>
		<br>
		<div id="chartContainer" style="height: 370px; width: 50%;"></div>
		<br>
		<label for="partie">Sous-partie</label> :
	    <SELECT name="partie">
	        <?php
	        foreach ($part as $value) {
	            echo "<OPTION value = '$value[0]'>$value[1]</OPTION>";
	        }
	        ?>
	    </SELECT>
	    <a href ="routeur.php?controller=stats&action=afficherAllreponses2"><button type="button" class="btn btn-success btn-lg btn-block">Accéder</button></a>
	</div>
</body>
</html>
