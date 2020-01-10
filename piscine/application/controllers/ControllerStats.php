<?php

//session_start();

require_once ('../models/ModelToeic.php');
require_once ('../models/ModelPersonne.php');

class ControllerStats {

    public static function index()
    {
        $libClasse = ModelClasse::getSections();
        $classes = array();
        
        foreach ($libClasse as $lib){
            for($i = 3; $i <= 5; $i++){
                $idClasse = intval(ModelClasse::getIdClasse($lib, $i));
                $add = array("idClasse" => $idClasse, "libClasse" => $lib, "annee" => $i);
                array_push($classes, $add);
            }
            //var_dump($classes);
        }
        
        require('../views/professeur/statsprof.php');
    }

    public static function getStats() {
        $classe = $_POST['classe'];
        $groupe = $_POST['groupe'];
        $eleve = $_POST['eleve'];
        $toeic = $_POST['toeic'];
        $partie = $_POST['partie'];
        $liste_reponses = ModelToeic::getStats($classe, $groupe, $toeic, $partie, $eleve);
        
        $listening = array();
        $reading = array();
        $ptsListening = 0;
        $ptsReading = 0;
        $cptListening = 0;
        $cptReading = 0;
        
        if(isset($liste_reponses[0])){
            foreach($liste_reponses as $l){
                if($l['Type'] == "listening"){
                    
                    $add = array("date" => $l['date'], "score" => intval($l['score']), "partie" => $l['IdPartie'], "toeic" => $l['IdTOEIC']);
                    array_push($listening, $add);
                    /*$ptsListening = $ptsListening + $l['score'];
                    $cptListening = $cptListening + 1;*/
                }
                else{
                    $add = array("date" => $l['date'], "score" => intval($l['score']), "partie" => $l['IdPartie'], "toeic" => $l['IdTOEIC']);
                    array_push($reading, $add);
                    /*$ptsReading = $ptsReading + $l['score'];
                    $cptReading = $cptReading + 1;*/
                }
            }
            
            $date = $liste_reponses[0]['date'];
            
            $listeningConvert = array();
            
            if(count($listening) != 0){
                $partieListening = $listening[0]['partie'];
                foreach ($listening as $val){
                    if($date == $val['date'] && $val['partie'] == $partieListening){
                        $ptsListening = $ptsListening + $val['score'];
                        $cptListening = $cptListening + 1;
                    }
                    else{
                        $score = intval($ptsListening / $cptListening);
                        //var_dump($ptsListening);
                        //var_dump($cptListening);
                        $add = array("date" => $date, "score" => $score, "partie" => $val['partie'], "toeic" => $val['toeic']);
                        array_push($listeningConvert, $add);
                        $ptsListening = $val['score'];
                        $cptListening = 1;
                        $date = $val['date'];
                        $partieListening = $val['partie'];
                    }
                }
            }
            
            
            
            $date = $liste_reponses[0]['date'];
            
            $readingConvert = array();
            if(count($reading) != 0){
                $partieReading = $reading[0]['partie'];
                foreach ($reading as $val){
                    if($date == $val['date'] && $val['partie'] == $partieReading){
                        $ptsReading = $ptsReading + $val['score'];
                        $cptReading = $cptReading + 1;
                    }
                    else{
                        $score = intval($ptsReading / $cptReading);
                        $add = array("date" => $date, "score" => $score, "partie" => $val['partie'], "toeic" => $val['toeic']);
                        array_push($readingConvert, $add);
                        $ptsReading = $val['score'];
                        $cptReading = 1;
                        $date = $val['date'];
                        $partieReading = $val['partie'];
                    }
                }
            }
            
            $listeningFinale = array();
            if(count($listeningConvert) != 0){
                
                $cptListening = 0;
                $ptsListening = 0;
                $date = $listeningConvert[0]['date'];
                foreach ($listeningConvert as $val){
                    if($date == $val['date'] && $cptListening <= 3){
                        $ptsListening = $ptsListening + $val['score'];
                        $cptListening = $cptListening + 1;
                    }
                    else{
                        $score = ModelToeic::getScoreListening(intval($ptsListening));
                        $add = array("date" => $date, "score" => $score, "toeic" => $val['toeic']);
                        array_push($listeningFinale, $add);
                        $ptsListening = $val['score'];
                        $cptListening = 0;
                        $date = $val['date'];
                    }
                }
            }
            
            $readingFinale = array();
            if(count($readingConvert) != 0){
                
                $cptReading = 0;
                $ptsReading = 0;
                $date = $readingConvert[0]['date'];
                foreach ($readingConvert as $val){
                    if($date == $val['date'] && $cptReading <= 3){
                        $ptsReading = $ptsReading + $val['score'];
                        $cptReading = $cptReading + 1;
                    }
                    else{
                        $score = ModelToeic::getScoreReading(intval($ptsReading));
                        $add = array("date" => $date, "score" => $score, "toeic" => $val['toeic']);
                        array_push($readingFinale, $add);
                        $ptsReading = $val['score'];
                        $cptReading = 0;
                        $date = $val['date'];
                    }
                }
            }
            
            $dataPoints = array();
            if($partie == 1){
                foreach ($listeningFinale as $val){
                    $add = array("y" => $val['score'], "label" => $val['date']." TOEIC n°".$val['toeic']);
                    array_push($dataPoints, $add);
                }
            }
            elseif($partie == 2){
                foreach ($readingFinale as $val){
                    $add = array("y" => $val['score'], "label" => $val['date']." TOEIC n°".$val['toeic']);
                    array_push($dataPoints, $add);
                }
            }
            else{
                for($i = 0; $i < count($listeningFinale); $i++){
                    $add = array("y" => $listeningFinale[$i]['score']+$readingFinale[$i]['score'], "label" => $listeningFinale[$i]['date']." TOEIC n°".$listeningFinale[$i]['toeic']);
                    array_push($dataPoints, $add);
                }
            }
            
            //var_dump($dataPoints);
            
            
            if(isset($dataPoints) || count($dataPoints) != 0){
                $valMax = $dataPoints[0]['y'];
                $valMin = $dataPoints[0]['y'];
                
                $moyenne = 0;
                $cpt = 0;
                
                foreach($dataPoints as $val){
                    $moyenne += $val['y'];
                    $cpt += 1;
                    
                    if($val['y'] > $valMax){
                        $valMax = $val['y'];
                    }
                    elseif($val['y'] < $valMin){
                        $valMin = $val['y'];
                    }
                }
                $moyenne = round($moyenne / $cpt,2);
                
                $evolutionGlobale = 1;
                
                for($i = 1; $i < count($dataPoints); $i++){
                    $evolutionGlobale = round($evolutionGlobale * (1+round(($dataPoints[$i]['y']-$dataPoints[$i-1]['y'])/$dataPoints[$i]['y'], 2)),2);
                }
                
                $evolutionGlobale = ($evolutionGlobale-1)*100;
                
                //var_dump($evolutionGlobale);
                
            }
            
        }
        
        /*
        $dataPoints = array();
        
        $cpt = 0;
        $limit = 4;
        $pts = 0;
        $date = null;
        if(isset($liste_reponses[0])){
            $date = $liste_reponses[0]['date'];
        
            if($partie == 2){
                $limit = 3;
            }

            foreach ($liste_reponses as $reponse){

                if($cpt == $limit){

                    if($partie == 1){
                        $add = array("y" => ModelToeic::getScoreListening($pts), "label" => $date);
                    }
                    elseif($partie == 2){
                        $add = array("y" => ModelToeic::getScoreReading($pts), "label" => $date);
                    }
                    else{
                        $add = array("y" => ModelToeic::getScoreListening($pts), "label" => $date);
                    }
                    $pts = $reponse['score'];
                    $cpt = 1;
                    $date = $reponse['date'];
                    array_push($dataPoints, $add);
                }
                else{
                    $cpt = $cpt + 1;
                    $pts = $pts + $reponse['score'];
                }

            }
            if($partie == 1){
                $add = array("y" => ModelToeic::getScoreListening($pts), "label" => $date);
            }
            elseif($partie == 2){
                $add = array("y" => ModelToeic::getScoreReading($pts), "label" => $date);
            }
            array_push($dataPoints, $add);

            var_dump($dataPoints);
            
        }
        */
        
        require('../views/professeur/stats.php');
    }

}