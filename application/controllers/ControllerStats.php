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
		$liste_reads = ModelRepondre::get_reading($_SESSION['codeINE']);
		$liste_lists = ModelRepondre::get_listening($_SESSION['codeINE']);
		$reading = array();
		$listening = array();
		$total = array();
		$dataPoints = array();
		foreach ($liste_reads as $read) {
			$add = array("date" => $read['date'], "score" => ModelTOEIC::getScoreReading($read['SUM(score)']));
			array_push($reading, $add);
		}
		foreach ($liste_lists as $list) {
			$add = array("date" => $list['date'], "score" => ModelTOEIC::getScoreListening($list['SUM(score)']));
			array_push($listening, $add);
		}
		for ($i=0 ; $i < sizeof($reading) ; $i++) { 
			$add = array ("date" => $reading[$i]['date'], "score" => $reading[$i]['score'] + $listening[$i]['score']);
			array_push($total, $add);
		}
	    foreach ($total as $reponse){
	    	$add = array("y" => $reponse["score"], "label" => $reponse['date']);
		    array_push($dataPoints, $add);
	    }
	    require('../views/tab-stats.php');
	}

	public function afficherListening() {
		$liste_reponses = ModelRepondre::get_listening($_SESSION['codeINE']);
		$dataPoints = array();
	    foreach ($liste_reponses as $reponse){
	    	$add = array("y" => ModelTOEIC::getScoreListening($reponse['SUM(score)']), "label" => $reponse['date']);
		    array_push($dataPoints, $add);
	    }
	    require('../views/tab-listening.php');
	}

	public function afficherReading() {
		$liste_reponses = ModelRepondre::get_reading($_SESSION['codeINE']);
	    $dataPoints = array();
	    foreach ($liste_reponses as $reponse){
	    	$add = array("y" => ModelTOEIC::getScoreReading($reponse['SUM(score)']), "label" => $reponse['date']);
		    array_push($dataPoints, $add);
	    }
	    require('../views/tab-reading.php');
	}
	public function afficherTOEIC()
	{
		$liste_TOEIC = ModelRepondre::get_toeic($_SESSION['codeINE']);
		require('../views/tab-toeic.php');
	}

	public function afficher1TOEIC()
	{
		$gTOEIC = ModelRepondre::get_1toeic($_SESSION['codeINE'],$_POST['numeroTOEIC']);
		$gread =  ModelRepondre::sum_reading($_SESSION['codeINE'],$_POST['numeroTOEIC']);
		$read = ModelTOEIC::getScoreReading($gread[0]["sum(score)"]);
		$glist =  ModelRepondre::sum_listening($_SESSION['codeINE'],$_POST['numeroTOEIC']);
		$list = ModelTOEIC::getScoreListening($glist[0]["sum(score)"]);
		$partie = ModelRepondre::get_partie($_SESSION['codeINE'],$_POST['numeroTOEIC']);
		$TOEIC = $list + $read;
		require('../views/resumeTOEIC.php');
	}



}
?>