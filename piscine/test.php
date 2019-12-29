<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" type="text/css" href="grille.css" />
    <script type="text/Javascript">
        var secondes = 3600;
        var timer;
        var text = "";

        function Chrono()
        {
            if (secondes > 0)
            {
                var minutes = Math.floor(secondes/60);
                var heures = Math.floor(minutes/60);
                secondes -= minutes * 60;
                if (heures > 0)
                {
                    minutes -= heures * 60;
                    if (minutes > 0)
                    {
                        text = "Il reste " + heures + ' h ' + minutes + ' min ' + secondes + ' sec';
                    }
                    else
                    {
                        text = "Il reste " + heures + ' h ' + secondes + ' sec';
                    }
                    minutes = minutes + (heures * 60);
                    secondes = secondes + (minutes * 60) - 1;

                }
                else if (minutes > 0)
                {
                    text = "Il reste " + minutes + ' min ' + secondes + ' sec';
                    secondes = secondes + (minutes * 60) - 1;
                }
                else
                {
                    text = "Il reste " + secondes + ' sec';
                    secondes = secondes + (minutes * 60) - 1;
                }
            }
            else
            {
                clearInterval(timer);
                text = "Le temps est écoulé";
                document.forms['test_toeic'].submit();
            }
            document.getElementById('chrono').innerHTML = text;
        }

        function DemarrerChrono()
        {
            timer = setInterval('Chrono()', 1000);

        }
    </script>
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
                    '<input type="radio" name="'.$i.'" value="C" />'.
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
