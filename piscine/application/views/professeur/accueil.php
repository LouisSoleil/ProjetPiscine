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
		
			echo "<a class=\"toeic\" href='routeur.php?controller=personne&&action=handle'>" . "Gérer toeic" . '</a>';
    		echo "<a class=\"profil\" href='routeur.php?controller=personne&&action=profil'>" . "Accéder au profil" . '</a></br>';
			
		?>

<!-- 	</div> -->

	<?php include('../../assets/css/footer.php'); ?>

</body>
</html>

