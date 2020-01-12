<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../../assets/css/homepage.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/accueilToeicCss.css">
    <meta charset="UTF-8">
	<title>Accueil Toeic</title>
</head>
<body>

	<?php include('../../assets/css/header.php'); ?>
	</br>
	</br>

<!-- 	<div class="content"> -->
		
		<?php
		
			echo "<a class=\"activation\" href='routeur.php?controller=toeic&&action=activate'>" . "Activer/Désactiver un toeic" . '</a>';
			echo "<a class=\"creation\" href='routeur.php?controller=toeic&&action=create'>" . "Créer toeic" . '</a>';
			echo "<a class=\"modifier\" href='routeur.php?controller=toeic&&action=modify'>" . "Modifier un toeic" . '</a>';
			echo "<a class=\"suppression\" href='routeur.php?controller=toeic&&action=delete'>" . "Supprimer un toeic" . '</a>';
			
		?>

<!-- 	</div> -->

	<?php include('../../assets/css/footer.php'); ?>

</body>
</html>
