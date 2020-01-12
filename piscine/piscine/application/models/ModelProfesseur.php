<?php

require_once ('Model.php');

class ModelProfesseur extends ModelPersonne {

    public function __construct($codeINE = NULL, $email = NULL, $nom = NULL, $prenom = NULL, $mdp = NULL) {
        parent::__construct($codeINE, $email, $nom, $prenom, $mdp);
    }

    public function save() {

        $requete = "INSERT INTO Personne (codeIne, nom, prenom, email, mdp) "
            . "VALUES (:codeINE_tag, :nom_tag, :prenom_tag, :email_tag, :mdp_tag)";

        try {
            $req_prep = Model::$pdo->prepare($requete);
            $values = array (
                "codeINE_tag" => $this->codeINE,
                "nom_tag" => $this->nom,
                "prenom_tag" => $this->prenom,
                "email_tag" => $this->email,
                "mdp_tag" => $this->mdp
            );

            $req_prep->execute($values);
        } catch (PDOException $e) {
            return 1;
        }
    }
}