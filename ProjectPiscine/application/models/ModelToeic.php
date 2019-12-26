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