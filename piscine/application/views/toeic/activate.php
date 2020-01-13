<?php if (!isset($_SESSION['email'])) require ('../error.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../../assets/css/homepage.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/activateCss.css">
    <meta charset="UTF-8">
    <title>Activer/Désactiver un toeic</title>
</head>

<body>

<?php include('../../assets/css/header.php'); ?>

<div class="content">

<h3 class="title"> Activer/Désactiver un toeic</h3>


<form method="post" action="routeur.php?controller=toeic&&action=activate">
        <p>

            <?php

            foreach ($toeics as $value) {
                echo '<div class="valeur">'.$value['IdTOEIC'].' : '.$value['LibelleTOEIC'].'</div>'.
                '<table class="tableau">'.'<td>'.
                '<label for="cocher">Oui</label>'.
                '<input class="choix" type="radio" name='.$value['IdTOEIC'].' value="1" '.(($value['estVisible'] == 1) ? "checked" : "").'/>'.
                '<label for="cocher">Non</label>'.
                '<input class="choix" type="radio" name='.$value['IdTOEIC'].' value="0" '.(($value['estVisible'] == 0) ? "checked" : "").'/>'.'<td>'.
                '</table>'.
                '<br>';
            }

            ?>

            <br>
        </p>
        </p>
        <p>
            <input class="bouton" name="form_activate_toeic" type="submit" value="Valider" />
        </p>
</form>

</div>

<?php include('../../assets/css/footer.php'); ?>

</body>
</html>