<?php
require_once ('../models/ModelStats.php');

class ControlerStats {

	public static function afficherAllreponses() {
		$liste_reponses = array (10,15); /*ModelStats::get_allreponses();*/
	    require('../views/statseleve.php');
	}
}
?>