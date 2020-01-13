<?php

require_once('../models/ModelPersonne.php');

$classe = intval($_POST['idClasse']);
$groupe = intval($_POST['numGroupe']);
$reponse = ModelPersonne::getEleveByClasseGroupe($classe,$groupe);

echo json_encode($reponse);
