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

            var_dump($_SESSION);

            if (empty($toeics)) {
                echo "Aucun toeic disponible";
            }
            else {
                /*foreach ($toeics as $value) {
                    echo '<label for="cocher">'.$value['IdTOEIC'].' - '.$value['LibelleTOEIC'].'</label>'.
                        '<input type="radio" name="toeic" value="'.$value['IdTOEIC'].'" />'.
                        '<br><br>';
                }*/

                foreach ($toeics as $value) {
                    echo '<button type="submit" name="toeic" value="'.$value['IdTOEIC'].'">'.$value['LibelleTOEIC'].'</button><br><br>';
                }


            }

            ?>
        </p>
    <p>

    </p>
</form>

<input type='hidden' name='action' value='taken'>

</body>
</html>