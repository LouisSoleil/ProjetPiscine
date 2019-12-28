<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Score</title>
</head>

<body>
<h3>Score</h3>

<?php

if (isset($_SESSION['email'])) {
    echo "Salut élève ".$_SESSION["prenom"];
    //echo "<a href='../../controllers/routeur.php?controller=toeic&&action=take'>" . "Passer un toeic" . '</a></br>';


    echo "<a href='routeur.php?controller=toeic&&action=take'>" . "Passer un toeic" . '</a></br>';
    echo "<a href='../views/eleve/profil.php'>" . "Accéder au profil" . '</a></br>';

}
else {
    echo "T'es nul";
}
?>
</body>
</html>
