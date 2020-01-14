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
                }
                else{
                    $add = array("date" => $l['date'], "score" => intval($l['score']), "partie" => $l['IdPartie'], "toeic" => $l['IdTOEIC']);
                    array_push($reading, $add);
                }
            }
            
            $date = $liste_reponses[0]['date'];
            
            $listeningConvert = array();
            if(count($listening) != 0){
                $partieListening = $listening[0]['partie'];
                $i = 0;
                while($i-1 != count($listening)){
                    if($i != count($listening) && $date == $listening[$i]['date'] && $listening[$i]['partie'] == $partieListening){
                        $ptsListening = $ptsListening + $listening[$i]['score'];
                        $cptListening = $cptListening + 1;
                    }
                    else{
                        $score = intval($ptsListening / $cptListening);
                        $add = array("date" => $date, "score" => $score, "partie" => $listening[$i-1]['partie'], "toeic" => $listening[$i-1]['toeic']);
                        array_push($listeningConvert, $add);
                        if($i != count($listening)){
                            $ptsListening = $listening[$i]['score'];
                            $cptListening = 1;
                            $date = $listening[$i]['date'];
                            $partieListening = $listening[$i]['partie'];
                        }
                    }
                    $i += 1;
                }
            }
            
            
            
            $date = $liste_reponses[0]['date'];
            
            $readingConvert = array();
            if(count($reading) != 0){
                $partieReading = $reading[0]['partie'];
                $i = 0;
                while(($i-1) != count($reading)){
                    if($i != count($reading) && $date == $reading[$i]['date'] && $reading[$i]['partie'] == $partieReading){
                        $ptsReading = $ptsReading + $reading[$i]['score'];
                        $cptReading = $cptReading + 1;
                    }
                    else{
                        $score = intval($ptsReading / $cptReading);
                        $add = array("date" => $date, "score" => $score, "partie" => $reading[$i-1]['partie'], "toeic" => $reading[$i-1]['toeic']);
                        array_push($readingConvert, $add);
                        if($i != count($reading)){
                            $ptsReading = $reading[$i]['score'];
                            $cptReading = 1;
                            $date = $reading[$i]['date'];
                            $partieReading = $reading[$i]['partie'];
                        }
                    }
                    $i += 1;
                }
            }
            
            $listeningFinale = array();
            if(count($listeningConvert) != 0){
                
                $cptListening = 0;
                $ptsListening = 0;
                $date = $listeningConvert[0]['date'];
                $i = 0;
                while(($i-1) != count($listeningConvert)){
                    if($i != count($listeningConvert) && $date == $listeningConvert[$i]['date'] && $cptListening <= 3){
                        $ptsListening = $ptsListening + $listeningConvert[$i]['score'];
                        $cptListening = $cptListening + 1;
                    }
                    else{
                        $score = ModelToeic::getScoreListening(intval($ptsListening));
                        $add = array("date" => $date, "score" => $score, "toeic" => $listeningConvert[$i-1]['toeic']);
                        array_push($listeningFinale, $add);
                        if($i != count($listeningConvert)){
                            $ptsListening = $listeningConvert[$i]['score'];
                            $cptListening = 0;
                            $date = $listeningConvert[$i]['date'];
                        }
                    }
                    $i += 1;
                }
            }
            
            $readingFinale = array();
            if(count($readingConvert) != 0){
                
                $cptReading = 0;
                $ptsReading = 0;
                $date = $readingConvert[0]['date'];
                $i = 0;
                while(($i-1) != count($readingConvert)){
                    if($i != count($readingConvert) && $date == $readingConvert[$i]['date'] && $cptReading <= 3){
                        $ptsReading = $ptsReading + $readingConvert[$i]['score'];
                        $cptReading = $cptReading + 1;
                    }
                    else{
                        $score = ModelToeic::getScoreReading(intval($ptsReading));
                        $add = array("date" => $date, "score" => $score, "toeic" => $readingConvert[$i-1]['toeic']);
                        array_push($readingFinale, $add);
                        if($i != count($readingConvert)){
                            $ptsReading = $readingConvert[$i]['score'];
                            $cptReading = 0;
                            $date = $readingConvert[$i]['date'];
                        }
                    }
                    $i += 1;
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
            
            if(isset($dataPoints[0]) || count($dataPoints) != 0){
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
                    if($dataPoints[$i]['y'] != 0){
                        $evolutionGlobale = round($evolutionGlobale * (1+round(($dataPoints[$i]['y']-$dataPoints[$i-1]['y'])/$dataPoints[$i]['y'], 2)),2);
                    }
                }
                
                $evolutionGlobale = ($evolutionGlobale-1)*100;
                
            }
            
        }
        
        require('../views/professeur/stats.php');
    }

}