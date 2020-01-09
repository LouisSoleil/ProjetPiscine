<!DOCTYPE html >
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="robots" content="none">
	<link rel="stylesheet" type="text/css" href="../assets/stats.css"></link>
	<script src="../assets/stats.js" type="text/javascript"></script>
</head>

<body>
	<div id="content">
		<h1>Par TOEIC</h1>
		<br>
		<label>TOEIC :</label> 
		<div id ="tabs">
			<ul>
				<SELECT>
		        	<?php
		        	foreach ($liste_TOEIC as $value) {
		        	    echo "<OPTION href ='#' rel = '../controllers/routeur.php?controller=stats&action=afficher1TOEIC' onClick='loadit(this)'>$value[0]</OPTION>";
		        	}
		        	?>
	        	</SELECT>
			</ul>
	        <iframe id="container2"></iframe>
		</div>
	</div>
</body>
</html>

