<?php

require_once('../models/ModelToeic.php');

$eleve = $_POST['codeINE'];
$classe = $_POST['idClasse'];
$groupe = $_POST['numGroupe'];
$reponse = ModelToeic::getToeicByEleve($eleve,$classe,$groupe);

echo json_encode($reponse);
