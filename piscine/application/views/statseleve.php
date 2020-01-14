<!DOCTYPE html>
<html>
<head>
    <meta  charset="UTF-8">
    <title>Vos statistiques</title>
    <link rel="stylesheet" type="text/css" href="../assets/stats.css"></link>
    <link rel="stylesheet" type="text/css" href="../../assets/css/homepage.css">
	<script src="../assets/stats.js" type="text/javascript"></script>
	<style>
		body
		{  
		    font-size:100%;
		    font-family: Tahoma, Geneva, sans-serif;
			letter-spacing: 0.2pt;
		    background-color: #FFF;
		}

		.legal
		{
		    text-align:center;
		    font-size: 80%;
		    color: #666;
		}
	</style>
</head>

<body onload="startit()">

<?php include('../../assets/css/header.php'); ?>

<div class="content">

	<div id="content">
		<div id="tabs">
		    <ul>
		        <li><a href="#" class="selected"  rel="../controllers/routeur.php?controller=stats&action=afficherAllreponses" onclick="loadit(this)">Mes statistiques</a></li>
		        <li><a href="#" rel="../controllers/routeur.php?controller=stats&action=afficherListening" onClick="loadit(this)">Partie listening</a></li>
		        <li><a href="#" rel="../controllers/routeur.php?controller=stats&action=afficherReading" onClick="loadit(this)">Partie reading</a></li> 
		        <li><a href="#" rel="../controllers/routeur.php?controller=stats&action=afficherTOEIC" onClick="loadit(this)">Par TOEIC</a></li> 
		    </ul>
		    <iframe id="container"></iframe>
		</div>
	</div>

</div>

<?php include('../../assets/css/footer.php'); ?>

</body>
</html>
