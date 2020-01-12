<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../../assets/css/homepage.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/accueilExamCss.css">
    <meta charset="UTF-8">
    <title>Passer un toeic</title>
</head>

<body>

<?php include('../../assets/css/header.php'); ?>

<div class="content" >

<h3> Passer un toeic</h3>


<form method="post" action="routeur.php?controller=toeic&&action=taken">
        <p>
            <p> Nous vous rappelons que : Le TOEIC Listening and Reading dure deux heures, dans lesquelles votre niveau de Business English est testé. Le test est divisé en deux parties, respectivement : Listening et Reading. L’épreuve du Listening dure 45 minutes. L’épreuve suivante dure donc 75 min. (soit 1h15). </p>

            <P> Vous devez cocher la case correspondant à la réponse qui vous semble la plus juste. </P>

            <p> Attention, le chrono démarrera au moment où vous aurez sélectionner votre Toeic, attendez donc les instructions du professeur </p>

            <?php

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
                    echo '<button class="bouton" type="submit" name="toeic" value="'.$value['IdTOEIC'].'">'.$value['LibelleTOEIC'].'</button><br><br>';
                }
            }

            ?>
        </p>
    <p>

    </p>
</form>

<input type='hidden' name='action' value='taken'>

</div>

<?php include('../../assets/css/footer.php'); ?>

</body>
</html>