<?php

session_start();

if (isset($_SESSION['email'])) {
    echo "T'es trop fort, t'es sur la page profil";

}
else {
    echo "T'es pas nul Mathilde";
}

//session_destroy();