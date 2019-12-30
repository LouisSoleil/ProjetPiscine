<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Activer/Désactiver un toeic</title>
</head>

<body>
<h3> Activer/Désactiver un toeic</h3>


<form method="post" action="routeur.php?controller=toeic&&action=activated">
    <fieldset>
        <p>

            <?php

            foreach ($toeics as $value) {
                echo $value['IdTOEIC'].' : '.$value['LibelleTOEIC'];
                echo '<label for="cocher">Oui</label>'.
                '<input type="radio" name='.$value['IdTOEIC'].' value="1" '.(($value['estVisible'] == 1) ? "checked" : "").'/>'.
                '<label for="cocher">Non</label>'.
                '<input type="radio" name='.$value['IdTOEIC'].' value="0" '.(($value['estVisible'] == 0) ? "checked" : "").'/>'.

                '<br><br>';
            }

            ?>
        </p>
        <p>
            <input type="submit" value="Valider" />
        </p>
    </fieldset>
</form>

<input type='hidden' name='action' value='activated'>

</body>
</html>