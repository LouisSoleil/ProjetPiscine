<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" type="text/css" href="../../grille.css" />
    <script type="text/Javascript" src="../../chrono.js"></script>
    <meta charset="UTF-8">
    <title>Passer le toeic</title>
</head>

<body onload="DemarrerChrono();">

<h3>TOEIC</h3>

<div id="div_chrono">
    <p id="chrono"></p>
</div>

<form method="post" name="test_toeic" id="test_toeic" action="routeur.php?controller=toeic&&action=correct">
    <fieldset>
        <legend><b></b></legend>
        <p>

            <?php

            for ($i = 1; $i <= 200; $i++) {
                echo "$i :  ";
                echo '<label for="cocher">A</label>'.
                    '<input type="radio" name="'.$i.'" value="A" />'.
                    '<label for="cocher">B</label>'.
                    '<input type="radio" name="'.$i.'" value="B" />'.
                    '<label for="cocher">C</label>'.
                    '<input type="radio" name="'.$i.'" value="C" checked/>'.
                    '<label for="cocher">D</label>'.
                    '<input type="radio" name="'.$i.'" value="D" />'.
                    '<br><br>';
            }

            ?>


        </p>
        <p>
            <input type="submit" value="Valider" />
        </p>
    </fieldset>
</form>

<input type='hidden' name='action' value='created'>


</body>
</html>
