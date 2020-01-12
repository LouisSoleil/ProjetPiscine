<!DOCTYPE html >
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="robots" content="none">
	<link rel="stylesheet" type="text/css" href="../assets/stats.css"></link>
	<script src="../assets/stats.js" type="text/javascript"></script>
</head>

<body onload="startit2()">
	<div id="content">
		<h1>Par TOEIC</h1>
		<br>
		<label>TOEIC :</label> 
		<div id ="tabs2">	
			<ul>
				<select>
		        <?php
		        foreach ($liste_TOEIC as $num) {
		            echo "<option value = 'routeur.php?controller=stats&action=afficher1TOEIC'>$num[0]</option>";
		        }
		        ?>
				</select>
			</ul>
		</div>
		<iframe id="container2"></iframe>
	</div>
	</div>
</body>
</html>

