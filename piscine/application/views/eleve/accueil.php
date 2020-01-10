<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../../assets/css/homepage.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/accueilEleveCss.css">
    <meta charset="UTF-8">
    <title>Accueil</title>
</head>

<body>

<?php include('../../assets/css/header.php'); ?>

<!-- <div class="content"> -->
<!-- <h3>Accueil</h3> -->

<?php
    //echo "Salut élève ".$_SESSION["prenom"];
    //echo "<a href='../../controllers/routeur.php?controller=toeic&&action=take'>" . "Passer un toeic" . '</a></br>';

    echo "<a class=\"toeic\" href='routeur.php?controller=toeic&&action=take'>" . "Passer un toeic" . '</a>';
    echo "<a class=\"profil\" href='routeur.php?controller=personne&&action=profil'>" . "Accéder au profil" . '</a></br>';
?>

<!-- </div> -->

<?php include('../../assets/css/footer.php'); ?>

</body>
</html>
