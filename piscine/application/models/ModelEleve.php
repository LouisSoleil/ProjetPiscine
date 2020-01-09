<?php

require_once ('ModelClasse.php');

class ModelEleve extends ModelPersonne {

    private $classe;
    private $annee;
    private $groupe;

    public function __construct($codeINE = NULL, $email = NULL, $nom = NULL, $prenom = NULL, $password = NULL, $classe = NULL, $annee = NULL, $groupe = NULL) {
        parent::__construct($codeINE, $email, $nom, $prenom, $password);
        $this->classe = $classe;
        $this->annee = $annee;
        $this->groupe = $groupe;
    }

    public function save() {

        $idClasse = ModelClasse::getIdClasse($this->classe, $this->annee);
        $numGroupe = ModelClasse::getNumGroupeByLibelle($this->groupe);

        $requete = "INSERT INTO Personne (codeIne, nom, prenom, email, mdp, numGroupe, idClasse) "
            . "VALUES (:codeINE_tag, :nom_tag, :prenom_tag, :email_tag, :mdp_tag, :numGroupe_tag, :id_classe_tag)";

        try {
            $req_prep = Model::$pdo->prepare($requete);
            $values = array (
                "codeINE_tag" => $this->codeINE,
                "nom_tag" => $this->nom,
                "prenom_tag" => $this->prenom,
                "email_tag" => $this->email,
                "mdp_tag" => $this->mdp,
                "numGroupe_tag" => $numGroupe,
                "id_classe_tag" => $idClasse
            );

            $req_prep->execute($values);
        } catch (PDOException $e) {
            return 1;
        }
    }

}
