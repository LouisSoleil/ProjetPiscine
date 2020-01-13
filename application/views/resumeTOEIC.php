<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="robots" content="none">
</head>
<body>
	<h1>Résumé TOEIC <?php echo $_POST['numeroTOEIC'] ?> :</h1>

	<h2>Score Total : <?php echo $TOEIC ?></h2>

	<h3> Score Partie Listening : <?php echo $list ?></h3>

	<p>Partie 1 : <?php echo $partie[0][1] ?> /6</p>
	<p>Partie 2 : <?php echo $partie[1][1] ?> /25</p>
	<p>Partie 3 : <?php echo $partie[2][1] ?> /39</p>

	<h3>Score Partie Reading : <?php echo $read ?></h3>
	<p>Partie 4 : <?php echo $partie[3][1] ?> /30</p>
	<p>Partie 5 : <?php echo $partie[4][1] ?> /30</p>
	<p>Partie 6 : <?php echo $partie[5][1] ?> /16</p>
	<p>Partie 7 : <?php echo $partie[6][1] ?> /54</p>

	<a href = "../controllers/routeur.php?controller=stats&action=afficherTOEIC">Retour</a>
</body>
</html>