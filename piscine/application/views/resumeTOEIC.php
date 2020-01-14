<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../../assets/css/resumeTOEICss.css">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="robots" content="none">
</head>
<body>
	<h2>Résumé TOEIC :</h2>

	<h3>Score Total : <?php echo $TOEIC ?></h3>

	<div class="rightCol">

	<h4> Score Partie Listening : <?php echo $list ?></h4>

	<p>Partie 1 : <?php echo $partie[0][1] ?> /6</p>
	<p>Partie 2 : <?php echo $partie[1][1] ?> /25</p>
	<p>Partie 3 : <?php echo $partie[2][1] ?> /39</p>
    <p>Partie 4 : <?php echo $partie[3][1] ?> /30</p>

	</div>

	<div class="leftCol">

	<h4>Score Partie Reading : <?php echo $read ?></h4>
	<p>Partie 5 : <?php echo $partie[4][1] ?> /30</p>
	<p>Partie 6 : <?php echo $partie[5][1] ?> /16</p>
	<p>Partie 7 : <?php echo $partie[6][1] ?> /54</p>

	</div>

    <div class="centrage">
	<a href = "../controllers/routeur.php?controller=stats&action=afficherTOEIC">Retour</a>
    </div>

</body>
</html>