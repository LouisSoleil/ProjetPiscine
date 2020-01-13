<?php if (!isset($_SESSION['email'])) require ('../error.php'); ?>
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

<?php
echo "<a class=\"toeic\" href='routeur.php?controller=toeic&&action=take'>" . "Passer un toeic" . '</a>';
echo "<a class=\"stat\" href='routeur.php?controller=personne&&action=accessStat'>" . "Accéder aux statistiques" . '</a></br>';
?>

<?php include('../../assets/css/footer.php'); ?>

</body>
</html>
