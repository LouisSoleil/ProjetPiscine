var ecart = new Date("Jan 12, 2020 15:55:25").getTime() - new Date().getTime();
var timer;
var text = "";

function Chrono() {
    if (ecart > 0) {
        var minutes = Math.floor((ecart % (1000 * 60 * 60)) / (1000 * 60));
        var heures = Math.floor((ecart % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        text = ((heures < 10) ? "0"+heures : heures)+" : "+((minutes < 10) ? "0"+minutes : minutes)+" : "+ ((ecart%60 < 10) ? "0"+(ecart%60) : ecart%60);
        ecart--;
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