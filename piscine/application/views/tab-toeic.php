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
			<ul>
				<form method ="post" action ="../controllers/routeur.php?controller=stats&action=afficher1TOEIC">
					<select name = "numeroTOEIC">
				        <?php
				        foreach ($liste_TOEIC as $num) {
				        	?>
				           <option value="<?php echo $num['date']?>"> <?php echo ($num['libelleTOEIC'])?> - <?php echo ($num['date'])?> </option>
				        <?php
				        }
				        ?>
				    </select>
				    <input type="submit" name="numTOEIC"></input>
				</form>
			</ul>
	</div>
</body>
</html>