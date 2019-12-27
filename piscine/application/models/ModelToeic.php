<?php

require_once ('Model.php');

class ModelToeic {

    private $libelleToeic;

    public function __construct($libelleToeic) {
        $this->libelleToeic = $libelleToeic;
    }

    public function save($reponses) {

        $requete = "INSERT INTO Toeic (libelleToeic) "
            . "VALUES (:libelle_toeic_tag)";

        try {
            $req_prep = Model::$pdo->prepare($requete);
            $values = array (
                "libelle_toeic_tag" => $this->libelleToeic
            );

            $req_prep->execute($values);
        } catch (PDOException $e) {
            return 1;
        }

        $idToeic = Model::$pdo->lastInsertId();

        $requete =  "INSERT INTO souspartie (idToeic, idPartie, `type`) VALUES ($idToeic, 1, 'Oral');"
            ."INSERT INTO souspartie (idToeic, idPartie, `type`) VALUES ($idToeic, 2, 'Oral');"
            ."INSERT INTO souspartie (idToeic, idPartie, `type`) VALUES ($idToeic, 3, 'Oral');"
            ."INSERT INTO souspartie (idToeic, idPartie, `type`) VALUES ($idToeic, 4, 'Oral');"
            ."INSERT INTO souspartie (idToeic, idPartie, `type`) VALUES ($idToeic, 5, 'Ecrit');"
            ."INSERT INTO souspartie (idToeic, idPartie, `type`) VALUES ($idToeic, 6, 'Ecrit');"
            ."INSERT INTO souspartie (idToeic, idPartie, `type`) VALUES ($idToeic, 7, 'Ecrit');";

        Model::$pdo->query($requete);

        for ($i = 1; $i <= 200; $i++) {
            if (1 <= $i && $i <= 6) {
                $idPartie = 1;
            }
            elseif (7 <= $i && $i <= 31) {
                $idPartie = 2;
            }
            elseif (32 <= $i && $i <= 70) {
                $idPartie = 3;
            }
            elseif (71 <= $i && $i <= 100) {
                $idPartie = 4;
            }
            elseif (101 <= $i && $i <= 130) {
                $idPartie = 5;
            }
            elseif (131 <= $i && $i <= 146) {
                $idPartie = 6;
            }
            elseif (147 <= $i && $i <= 200) {
                $idPartie = 7;
            }

            $requete = "INSERT INTO question (idQuestion, idToeic, idPartie, reponseJuste) VALUES (:id_question_tag, :id_toeic_tag, :id_partie_tag, :reponse_tag)";

            try {
                $req_prep = Model::$pdo->prepare($requete);

                $values = array (
                    "id_question_tag" => $i,
                    "id_toeic_tag" => $idToeic,
                    "id_partie_tag" => $idPartie,
                    "reponse_tag" => $reponses[$i]
                );

                $req_prep->execute($values);

            } catch (PDOException $e) {
                return 2;
            }
        }
    }

    public static function getToeics() {
        $requete = "SELECT * FROM toeic ORDER BY idToeic";
        $rep = Model::$pdo->query($requete);

        return $rep->fetchAll();
    }

    public static function getToeicsVisibles() {

        $requete = "SELECT * FROM toeic WHERE estVisible = 1 ORDER BY idToeic";
        $rep = Model::$pdo->query($requete);

        return $rep->fetchAll();
    }

    public static function getToeicsInvisibles() {

        $requete = "SELECT * FROM toeic WHERE estVisible = 0 ORDER BY idToeic";
        $rep = Model::$pdo->query($requete);

        return $rep->fetchAll();
    }
}