<?php

require_once('../models/ModelToeic.php');

$eleve = $_POST['codeINE'];
$reponse = ModelToeic::getToeicByEleve($eleve);

echo json_encode($reponse);
