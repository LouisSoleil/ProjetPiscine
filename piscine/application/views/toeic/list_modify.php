<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Modifier un toeic</title>
</head>

<body>
<h3> Modifier un toeic</h3>


<form method="post" action="routeur.php?controller=toeic&&action=modify">
    <p>

        <?php

        if (empty($toeics)) {
            echo "Aucun toeic à afficher";
        }
        else {
            foreach ($toeics as $value) {
                echo '<button type="submit" name="toeic" value="'.$value['IdTOEIC'].'">'.$value['LibelleTOEIC'].'</button><br><br>';
            }
        }

        ?>
    </p>
    <p>

    </p>
</form>

<input type='hidden' name='action' value='modify'>

</body>
</html>