<!DOCTYPE html>
<html>
<head>
    <meta  charset="UTF-8">
    <title>Vos statistiques</title>
    <link rel="stylesheet" type="text/css" href="../assets/stats.css"></link>
	<script src="../assets/stats.js" type="text/javascript"></script>
	<style>
		body
		{ 
		    margin: 48px; 
		    font-size:100%;
		    font-family: arial, sans;
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
	<div id="content">	
		<h1>Vos Statistiques</h1>
		<br>
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
</body>
</html>
