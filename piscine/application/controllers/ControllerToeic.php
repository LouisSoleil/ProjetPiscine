<?php

require_once ('../models/ModelToeic.php');

class ControllerToeic {

    public static function create() {
        require ('../views/toeic/create.php');
    }

    public static function created() {

        $reponses = array();

        for ($i = 1; $i <= 200; $i++) {
            $reponses[$i] = $_POST[$i];
        }

        $toeic = new ModelToeic($_POST['name']);

        $toeic->save($reponses);
    }

    public static function activate() {

        $toeics = ModelToeic::getToeics();

        require('../views/toeic/activate.php');
    }

    public static function activated() {

        $toeics = ModelToeic::getToeics();

        $modifs = array();

        foreach ($toeics as $value) {
            $idToeic = $value['IdTOEIC'];
            $cr = ModelToeic::updateVisibilite($idToeic, $_POST[$idToeic]);
        }

        header('Location: routeur.php?controller=toeic&&action=activate');
    }

    public static function take() {

        $toeics = ModelToeic::getToeicsVisibles();

        require ('../views/eleve/accueil_exam.php');

    }

    public static function taken() {

        if (isset($_POST['toeic'])) {
            $_SESSION['idToeicChoisi'] = $_POST['toeic'];

            require ('../views/toeic/grille.php');
        }

    }

    public static function correct() {

        $reponses = array();

        for ($i = 1; $i <= 200; $i++) {
            $reponses[$i] = $_POST[$i];
        }

        $reponsesJustes = ModelToeic::recupererReponse($_SESSION['idToeicChoisi']);

        $note = ModelToeic::note($reponses, $reponsesJustes);

        require ('../views/toeic/score.php');

    }
}
