<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
</head>

<body>
<h3>Accueil</h3>

<?php

var_dump($_SESSION);

if (isset($_SESSION['email'])) {
    echo "Salut élève ".$_SESSION["prenom"];
    //echo "<a href='../../controllers/routeur.php?controller=toeic&&action=take'>" . "Passer un toeic" . '</a></br>';


    echo "<br>";
    echo "<a href='routeur.php?controller=toeic&&action=take'>" . "Passer un toeic" . '</a></br>';
    echo "<a href='routeur.php?controller=personne&&action=profil'>" . "Accéder au profil" . '</a></br>';

    echo '<input type="button" value="Déconnexion" onclick="javascript:location.href=\'routeur.php?controller=personne&&action=deconnect\'">';

}
else {
    echo "T'es nul";
}

//session_destroy();
?>
</body>
</html>
