<?php

var_dump($_SESSION);

echo "Salut prof ".$_SESSION['prenom'];
echo "<br><br>";

echo "<a href='routeur.php?controller=toeic&&action=activate'>" . "Activer/Désactiver un toeic" . '</a></br>';
echo "<a href='routeur.php?controller=toeic&&action=create'>" . "Créer toeic" . '</a></br>';
echo "<a href='routeur.php?controller=toeic&&action=modify'>" . "Modifier un toeic" . '</a></br>';
echo "<a href='routeur.php?controller=toeic&&action=delete'>" . "Supprimer un toeic" . '</a></br>';
echo '<input type="button" value="Déconnexion" onclick="javascript:location.href=\'routeur.php?controller=personne&&action=deconnect\'">';
