<?php

require_once('Model.php');

class ModelClasse {

    /*private $libelle;
    private $annee;

    public function __construct($libelle = NULL, $annee = NULL) {
        if (!is_null($libelle) && !is_null($annee)) {
            $this->libelle = $libelle;
            $this->annee = $annee;
        }
    }*/

    public static function getSections() {
        $requete = "SELECT DISTINCT libelleClasse FROM classe ORDER BY libelleClasse";
        $rep = Model::$pdo->query($requete);

        return $rep->fetchAll(PDO::FETCH_COLUMN, 0);
    }

    public static function getGroupes() {
        $requete = "SELECT numGroupe, libelleGroupe FROM groupe ORDER BY numGroupe";
        $rep = Model::$pdo->query($requete);
        $i = 0;

        while ($data = $rep->fetch()) {
            $res[$i] = /*$data['numGroupe']." - ".*/$data['libelleGroupe'];
            $i++;
        }

        return $res;
    }

    public static function getIdClasse($libelleClasse,$annee) {
        $requete = "SELECT idClasse FROM classe WHERE libelleClasse = :libelle_classe_tag AND annee = :annee_tag";

        $req_prep = Model::$pdo->prepare($requete);

        $values = array (
            "libelle_classe_tag" => $libelleClasse,
            "annee_tag" => $annee
        );

        $req_prep->execute($values);

        return $req_prep->fetchColumn();
    }

    public static function getClasseByCodeINE($codeINE) {
        $requete = "SELECT c.libelleClasse, c.annee FROM Classe c JOIN Personne p ON p.idClasse = c.idClasse WHERE p.codeINE = :code_ine_tag";

        $req_prep = Model::$pdo->prepare($requete);

        $values = array (
            "code_ine_tag" => $codeINE
        );

        $req_prep->execute($values);
        $res = $req_prep->fetchAll();

        return $res[0]['libelleClasse'].$res[0]['annee'];
    }

    public static function getGroupeById($codeINE) {
        $requete = "SELECT g.numGroupe, g.libelleGroupe FROM Groupe g JOIN Personne p ON p.numGroupe = g.numGroupe WHERE p.codeINE = :code_ine_tag";

        $req_prep = Model::$pdo->prepare($requete);

        $values = array (
            "code_ine_tag" => $codeINE
        );

        $req_prep->execute($values);
        $res = $req_prep->fetchAll();

        return $res[0]['libelleGroupe'];
    }

    public static function getNumGroupeByLibelle($libelle) {

        $requete = "SELECT numGroupe FROM Groupe WHERE libelleGroupe = :libelle_tag";

        try {
            $req_prep = Model::$pdo->prepare($requete);

            $values = array (
                "libelle_tag" => $libelle
            );

            $req_prep->execute($values);

        } catch (PDOException $e) {
            return 1;
        }

        return $req_prep->fetchAll()[0]['numGroupe'];
    }
}
