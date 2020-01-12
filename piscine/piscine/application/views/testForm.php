<html>
<head>
    <script type="text/Javascript">
        var secondes = 0;
        var timer;
        var pause = false;
        var text = "";

        function IndiquerMinutes(min)
        {
            secondes = min;
        }
        function Chrono()
        {
            text ="Salut";
            document.getElementById('chrono').innerHTML = text;
        }
        function DemarrerChrono()
        {
            timer = setInterval('Chrono()', 5000);
            document.getElementById('btn_dem').style.display = 'none';
            document.getElementById('btn_stop').style.display = 'inline';
            document.getElementById('btn_pause').style.display = 'inline';

        }
        function ArreterChrono()
        {
            clearInterval(timer);
            document.getElementById('btn_dem').style.display = 'inline';
            document.getElementById('btn_stop').style.display = 'none';
            document.getElementById('btn_pause').style.display = 'none';
        }
        function PauseChrono()
        {
            if (!pause)
            {
                pause = true;
                clearInterval(timer);
                text = '[EN PAUSE] ' + text;
                document.getElementById('chrono').innerHTML = text;
                document.getElementById('btn_stop').style.display = 'none';
                document.getElementById('btn_pause').value = 'Reprendre';
            }
            else
            {
                pause = false;
                DemarrerChrono();
                document.getElementById('btn_pause').value = 'Pause';
            }


        }

    </script>
</head>
<body>
<form name="f_chrono">
    <label for="saisie">Entrez le temps voulu en secondes : </label>
    <input type="text" name="saisie" /><br />
    <input type="button" name="btn_dem" id="btn_dem" value="Démarrer" onclick="IndiquerMinutes(f_chrono.saisie.value); DemarrerChrono();" />
    <input type="button" name="btn_stop" id="btn_stop" value="Arreter !" onclick="ArreterChrono();" style="display: none;" />
    <input type="button" name="btn_pause" id="btn_pause" value="Pause" onclick="PauseChrono();" style="display: none;" />
</form>
<p id="chrono"></p>
</body>
</html>