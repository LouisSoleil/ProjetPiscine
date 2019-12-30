<?php

session_start();

require_once ('../models/ModelRepondre.php');
require_once ('../models/ModelTOEIC.php');

class ControllerStats {

	public function index()
	{
		require('../views/StatsEleve.php');
	}

	public function afficherAllreponses() {
		$liste_reponses = ModelRepondre::get_allreponses();
	    $dataPoints = array();
	    foreach ($liste_reponses as $reponse){
	    	$add = array("y" => $reponse['score'], "label" => $reponse['date']);
		    array_push($dataPoints, $add);
	    }
	    require('../views/tab-stats.php');
	}

	public function afficherListening() {
		$liste_reponses = ModelRepondre::get_listening();
	    $dataPoints = array();
	    foreach ($liste_reponses as $reponse){
	    	$add = array("y" => $reponse['score'], "label" => $reponse['date']);
		    array_push($dataPoints, $add);
	    }
	    require('../views/tab-stats.php');
	}

	public function afficherReading() {
		$liste_reponses = ModelRepondre::get_reading();
	    $dataPoints = array();
	    foreach ($liste_reponses as $reponse){
	    	$add = array("y" => $reponse['score'], "label" => $reponse['date']);
		    array_push($dataPoints, $add);
	    }
	    require('../views/tab-stats.php');
	}
	public function afficherTOEIC()
	{
		$liste_TOEIC = ModelRepondre::get_toeic();
		require('../views/tab-toeic.php');
	}




}
?>