<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Passer le toeic</title>
</head>

<body>
<h3>TOEIC</h3>


<form method="post" action="routeur.php?controller=toeic&&action=created">
    <fieldset>
        <legend><b></b></legend>
        <p>

            <?php

            for ($i = 1; $i <= 100; $i++) {
                echo "$i :  ";
                echo '<label for="cocher">A</label>'.
                '<input type="radio" name="coder" id="A" value="A" required/>'.
                '<label for="cocher">B</label>'.
                '<input type="radio" name="coder" id="B" value="B" required/>'.
                '<label for="cocher">C</label>'.
                '<input type="radio" name="coder" id="C" value="C" required/>'.
                '<label for="cocher">D</label>'.
                '<input type="radio" name="coder" id="D" value="D" required/>'.
                '<br>';
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
