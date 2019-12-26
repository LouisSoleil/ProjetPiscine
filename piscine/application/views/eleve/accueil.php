<?php

session_start();

if (isset($_SESSION['email'])) {
    echo "Salut élève ".$_SESSION["prenom"];
}
else {
    echo "T'es nul";
}


session_destroy();
