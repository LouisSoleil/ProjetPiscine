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

            <label for="nom">Libellé du TOEIC</label> :
            <input type="text" name="name" id="name" required/>
            <br><br><br>

            <?php

            for ($i = 1; $i <= 200; $i++) {
                echo "$i :  ";
                echo '<label for="cocher">A</label>'.
                '<input type="radio" name="'.$i.'" value="A" checked/>'.
                '<label for="cocher">B</label>'.
                '<input type="radio" name="'.$i.'" value="B" checked/>'.
                '<label for="cocher">C</label>'.
                '<input type="radio" name="'.$i.'" value="C" checked/>'.
                '<label for="cocher">D</label>'.
                '<input type="radio" name="'.$i.'" value="D" checked/>'.
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
