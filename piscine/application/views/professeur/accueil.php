<?php if (!isset($_SESSION['email'])) require ('../error.php'); ?>

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

echo "<a class=\"toeic\" href='routeur.php?controller=personne&&action=handle'>" . "Gérer les toeics" . '</a>';
echo "<a class=\"stat\" href='routeur.php?controller=stats&&action=index'>" . "Accéder aux statistiques" . '</a>';

?>

<!-- 	</div> -->

<?php include('../../assets/css/footer.php'); ?>

</body>
</html>
