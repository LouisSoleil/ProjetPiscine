<?php

$mdp = "Salut";
//$hash = password_hash($mdp, PASSWORD_DEFAULT);

$hash = "$2y$10$XRhAoM1m3I0uBv3Qq3aW5.VNb0Kpp3A0ezQukpfw4P8nYlUwWN8wS";

if (password_verify($mdp, $hash)) {
    echo "Réussi";
}
else {
    echo "Manqué";
}
