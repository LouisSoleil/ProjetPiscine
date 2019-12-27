<?php

session_start();

echo "Salut prof ".$_SESSION['prenom'];


echo "<a href='routeur.php?controller=toeic&&action=activate'>" . "Activer/Désactiver un toeic" . '</a></br>'; ?>
