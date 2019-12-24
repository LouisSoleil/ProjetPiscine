<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
</head>

<body>

<p>
    <?php

   echo "Salut ".$_SESSION['prenom']." ".$_SESSION['nom'];

    /*if (!$personne) {
            echo "Rien";
        }
        else {
            echo $personne->getNom()." ".$personne->getPrenom()." ".$personne->getEmail();
        }*/


    ?>

</p>

</body>
</html>