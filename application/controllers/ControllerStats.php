<?php

session_start();

require_once ('../models/ModelRepondre.php');

class ControllerStats {

	public static function afficherAllreponses() {
		$liste_reponses = ModelRepondre::get_allreponses();
	    $dataPoints = array();
	    $part = ModelRepondre::get_partie();
	    foreach ($liste_reponses as $reponse){
	    	$add = array("y" => $reponse['score'], "label" => $reponse['date']);
		    array_push($dataPoints, $add);
	    }
	    require('../views/StatsEleve.php');
	}

	public static function afficherAllreponses2() {
		$liste_reponses = ModelRepondre::get_allreponses2();
	    $dataPoints = array();
	    foreach ($liste_reponses as $reponse){
	    	$add = array("y" => $reponse['score'], "label" => $reponse['idTOEIC']);
		    array_push($dataPoints, $add);
	    }
	    require('../views/StatsEleve.php');
	}




}
?>