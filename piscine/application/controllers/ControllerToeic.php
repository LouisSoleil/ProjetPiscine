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

        $toeicOn = ModelToeic::getToeicsVisibles();
        $toeicOff = ModelToeic::getToeicsInvisibles();

        require ('../views/toeic/activate.php');
    }

    public static function activated() {

    }
}
