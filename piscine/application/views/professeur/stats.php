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
    <?php
    //var_dump($dataPoints);
    if(!isset($dataPoints) || count($dataPoints) == 0){
     ?>
    <h1>Désolé, il n'y a pas de données pour votre sélection</h1>
    <?php
    }
    else{
    ?>
	<div id="chartContainer" style="height: 300px; width: 100%;"></div>
        <div>
            <p>Meilleur score : <?php echo $valMax; ?></p>
            <p>Moins bon score : <?php echo $valMin; ?></p>
            <p>Score moyen : <?php echo $moyenne; ?></p>
            <?php 
            if($evolutionGlobale < 0){
            ?>
            <p>Évolution : <span  style="color:red;"><?php echo $evolutionGlobale; ?>%</span></p>
            <?php }
            elseif($evolutionGlobale == 0){
            ?>
            <p>Évolution : <span><?php echo $evolutionGlobale; ?>%</span></p>
            <?php
            }
            else{
            ?>
            <p>Évolution : <span style="color:green;">+<?php echo $evolutionGlobale; ?>%</span></p>
            <?php
            }
            ?>
        </div>
    <?php
    }
    ?>
        <a href="javascript:history.go(-1)">Retour</a>
</body>
</html>