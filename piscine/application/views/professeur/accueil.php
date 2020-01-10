<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../../assets/css/homepage.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/accueilProfCss.css">
    <meta charset="UTF-8">
	<title>Accueil</title>
</head>
<body>

	<?php include('../../assets/css/header.php'); ?>

<!-- 	<div class="content"> -->
		
		<?php
		
			echo "<a href='routeur.php?controller=toeic&&action=activate'>" . "Activer/Désactiver un toeic" . '</a></br>';
			echo "<a href='routeur.php?controller=toeic&&action=create'>" . "Créer toeic" . '</a></br>';
			echo "<a href='routeur.php?controller=toeic&&action=modify'>" . "Modifier un toeic" . '</a></br>';
			echo "<a href='routeur.php?controller=toeic&&action=delete'>" . "Supprimer un toeic" . '</a></br>';
			
		?>

<!-- 	</div> -->

	<?php include('../../assets/css/footer.php'); ?>

</body>
</html>

