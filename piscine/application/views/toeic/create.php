<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../../assets/css/homepage.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/createToeicCss.css">
    <meta charset="UTF-8">
    <title>Créer un toeic</title>
</head>

<body>

<?php include('../../assets/css/header.php'); ?>

<div class="content">



<h3>TOEIC</h3>

<div class="centrage">

<form method="post" action="routeur.php?controller=toeic&&action=created">

        <p>

            <label for="nom">Libellé du TOEIC</label> :
            <input type="text" name="name" id="name" required/>
            <br><br>
            
            <?php

            for ($i = 1; $i <= 200; $i++) {
                echo "$i :  ";
                echo '<label for="cocher">A</label>'.
                '<input class="choix" type="radio" name="'.$i.'" value="A" />'.
                '<label for="cocher">B</label>'.
                '<input class="choix" type="radio" name="'.$i.'" value="B" />'.
                '<label for="cocher">C</label>'.
                '<input class="choix" type="radio" name="'.$i.'" value="C" checked/>'.
                '<label for="cocher">D</label>'.
                '<input class="choix" type="radio" name="'.$i.'" value="D" />'.
                '<br><br>';
            }

            ?>


        </p>
        <p>
            <input type="submit" value="Valider" />
        </p>
</form>
</div>
<input type='hidden' name='action' value='created'>

</div>

<?php include('../../assets/css/footer.php'); ?>


</body>
</html>
