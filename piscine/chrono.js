var secondes = 7200;
var timer;
var text = "";

/** A SUPPRIMER */
/*function Chrono() {
    if (secondes > 0) {
        var minutes = Math.floor(secondes/60);
        var heures = Math.floor(minutes/60);
        secondes -= minutes * 60;

        if (heures > 0) {
            minutes -= heures * 60;
            if (minutes > 0) {
                text = heures + ' h ' + minutes + ' min ' + secondes + ' sec';
            }
            else {
                text = heures + ' h ' + secondes + ' sec';
            }

            minutes = minutes + (heures * 60);
            secondes = secondes + (minutes * 60) - 1;
        }
        else if (minutes > 0) {
            text = minutes + ' min ' + secondes + ' sec';
            secondes = secondes + (minutes * 60) - 1;
        }
        else {
            text = secondes + ' sec';
            secondes = secondes + (minutes * 60) - 1;
        }
    }
    else {
        clearInterval(timer);
        document.forms['test_toeic'].submit();
    }

    document.getElementById('chrono').innerHTML = text;
}*/

function Chrono() {
    if (secondes > 0) {
        var minutes = Math.floor(secondes/60)%60;
        var heures = Math.floor(secondes/3600);
        text = ((heures < 10) ? "0"+heures : heures)+" : "+((minutes < 10) ? "0"+minutes : minutes)+" : "+ ((secondes%60 < 10) ? "0"+(secondes%60) : secondes%60);
        secondes--;
    }
    else {
        clearInterval(timer);
        document.forms['test_toeic'].submit();
    }

    document.getElementById('chrono').innerHTML = text;
}

function DemarrerChrono() {
    timer = setInterval('Chrono()', 1000);
}