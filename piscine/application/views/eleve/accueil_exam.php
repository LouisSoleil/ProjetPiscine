<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Passer un toeic</title>
</head>

<body>
<h3> Passer un toeic</h3>


<form method="post" action="routeur.php?controller=toeic&&action=taken">
        <p>

            <?php

            foreach ($toeics as $value) {
                echo '<label for="cocher">'.$value['IdTOEIC'].' - '.$value['LibelleTOEIC'].'</label>'.
                    '<input type="radio" name="toeic" value="'.$value['IdTOEIC'].'" />'.
                    '<br><br>';
            }
            ?>
        </p>
        <p>
            <input type="submit" value="Valider" />
        </p>
</form>

<input type='hidden' name='action' value='taken'>

</body>
</html>