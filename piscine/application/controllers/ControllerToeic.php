<?php

require_once ('../models/ModelToeic.php');

class ControllerToeic {

    public static function create() {

        if (!isset($_SESSION['email'])) require ('../views/error.php');

        if (!isset($_POST['form_create_toeic'])) {
            require ('../views/toeic/create.php');
        }
        else {
            $reponses = array();

            for ($i = 1; $i <= 200; $i++) {
                $reponses[$i] = $_POST[$i];
            }

            $toeic = new ModelToeic($_POST['name']);

            $toeic->save($reponses);

            header('Location: routeur.php?controller=personne&&action=handle');
        }
    }

    /*public static function created() {

        $reponses = array();

        for ($i = 1; $i <= 200; $i++) {
            $reponses[$i] = $_POST[$i];
        }

        $toeic = new ModelToeic($_POST['name']);

        $toeic->save($reponses);
    }*/

    public static function activate() {

        if (!isset($_SESSION['email'])) require ('../views/error.php');

        $toeics = ModelToeic::getToeics();

        if (!isset($_POST['form_activate_toeic'])) {
            require('../views/toeic/activate.php');
        }
        else {
            $modifs = array();

            foreach ($toeics as $value) {
                $idToeic = $value['IdTOEIC'];
                $cr = ModelToeic::updateVisibilite($idToeic, $_POST[$idToeic]);
            }

            header('Location: routeur.php?controller=personne&&action=handle');
        }
    }

    /*public static function activated() {

        $toeics = ModelToeic::getToeics();

        $modifs = array();

        foreach ($toeics as $value) {
            $idToeic = $value['IdTOEIC'];
            $cr = ModelToeic::updateVisibilite($idToeic, $_POST[$idToeic]);
        }

        header('Location: routeur.php?controller=toeic&&action=activate');
    }*/

    public static function take() {

        if (!isset($_SESSION['email'])) require ('../views/error.php');

        if (!isset($_POST['toeic'])) {
            $toeics = ModelToeic::getToeicsVisibles();
            require ('../views/eleve/accueil_exam.php');
        }
        else {
            $_SESSION['idToeicChoisi'] = $_POST['toeic'];
            require ('../views/toeic/grille.php');
        }



    }

    /*public static function taken() {


        if (isset($_POST['toeic'])) {
            $_SESSION['idToeicChoisi'] = $_POST['toeic'];

            require ('../views/toeic/grille.php');
        }

    }*/

    public static function correct() {

        if (!isset($_SESSION['email'])) require ('../views/error.php');

        $reponses = array();

        for ($i = 1; $i <= 200; $i++) {
            $reponses[$i] = (isset($_POST[$i])) ? $_POST[$i] : "";
        }

        $reponsesJustes = ModelToeic::recupererReponses($_SESSION['idToeicChoisi']);

        $notes = ModelToeic::note($reponses, $reponsesJustes);
        $scoreListening = ModelToeic::getScoreListening($notes['listening']);
        $scoreReading = ModelToeic::getScoreReading($notes['reading']);

        require ('../views/toeic/score.php');

    }

    public static function modify() {

        $toeics = ModelToeic::getToeics();

        if (isset($_POST['toeic'])) {

            $toeicChoisi = ModelToeic::getToeicById($_POST['toeic']);

            require ('../views/toeic/modify.php');
        }
        else {
            require('../views/toeic/list_modify.php');
        }
    }

    public static function modified() {

        $reponses = array();

        for ($i = 1; $i <= 200; $i++) {
            $reponses[$i] = $_POST[$i];
        }

        ModelToeic::updateReponses($_POST['toeic'], $_POST['name'], $reponses);

        header('Location: routeur.php?controller=personne&&action=handle');
    }

    public static function delete() {

        if (!isset($_SESSION['email'])) require ('../views/error.php');

        if (!isset($_POST['toeic'])) {
            $toeics = ModelToeic::getToeics();
            require ('../views/toeic/delete.php');
        }
        else {
            ModelToeic::deleteToeic($_POST['toeic']);
            header('Location: routeur.php?controller=personne&&action=handle');
        }
    }

    /*public static function deleted() {

        ModelToeic::deleteToeic($_POST['toeic']);

        require ('../views/professeur/accueil.php');

    }*/
}
