<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulaire produit</title>
</head>

<body>

<p>
    <?php

    var_dump($personne);
        if (!$personne) {
            echo "Rien";
        }
        else {
            echo $personne->getNom()." ".$personne->getPrenom()." ".$personne->getEmail();
        }
    ?>

</p>

</body>
</html>