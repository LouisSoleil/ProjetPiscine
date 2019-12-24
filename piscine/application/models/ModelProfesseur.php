<?php

class ModelProfesseur extends ModelPersonne {

    public function __construct($codeINE = NULL, $email = NULL, $nom = NULL, $prenom = NULL, $password = NULL) {
        parent::__construct($codeINE, $email, $nom, $prenom, $password);
    }

    public function save() {

        $requete = "INSERT INTO Personne (codeIne, nom, prenom, email, mdp, numGroupe, idClasse) "
            . "VALUES (:codeINE_tag, :nom_tag, :prenom_tag, :email_tag, :mdp_tag, NULL, NULL)";

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