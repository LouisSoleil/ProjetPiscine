<?php

require_once('Model.php');

class ModelClasse {

    private $libelle;
    private $annee;

    public function __construct($libelle = NULL, $annee = NULL) {
        if (!is_null($libelle) && !is_null($annee)) {
            $this->libelle = $libelle;
            $this->annee = $annee;
        }
    }

    public static function getSections() {
        $requete = "SELECT DISTINCT libelleClasse FROM classe ORDER BY libelleClasse";
        $rep = Model::$pdo->query($requete);
        $i = 0;

        while ($data = $rep->fetch()) {
            $res[$i] = $data['libelleClasse'];
            $i++;
        }

        return $res;
    }

    public static function getGroupes() {
        $requete = "SELECT numGroupe, libelleGroupe FROM groupe ORDER BY numGroupe";
        $rep = Model::$pdo->query($requete);
        $i = 0;

        while ($data = $rep->fetch()) {
            $res[$i] = $data['numGroupe']." - ".$data['libelleGroupe'];
            $i++;
        }

        return $res;
    }
}
