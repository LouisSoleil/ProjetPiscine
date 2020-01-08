var secondes = 7200;
var timer;
var text = "";

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