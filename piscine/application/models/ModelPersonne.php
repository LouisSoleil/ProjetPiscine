<?php

require_once ("Model.php");

class ModelPersonne {

    private $email;
    private $nom;
    private $prenom;
    private $password;

    public function __construct($email = NULL, $nom = NULL, $prenom = NULL, $password = NULL) {
        if (!is_null($email) && !is_null($nom) && !is_null($prenom) && !is_null($password)) {
            $this->email = $email;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->password = $password;
        }
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getEmail() {
        return $this->email;
    }

    public static function chercherPersonne($email) {

        $requete = "SELECT email, nom, prenom FROM Personne WHERE email=:email_tag";

        $req_prep = Model::$pdo->prepare($requete);

        $values = array(
            "email_tag" => $email
        );

        $req_prep->execute($values);

        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelPersonne');
        $tab = $req_prep->fetchAll();

        if (empty($tab)) {
            return false;
        }
        else {
            return $tab[0];
        }
    }

    public function existe() {
        $requete = "INSERT INTO ";
    }

    public function save() {

        $requete = "INSERT INTO ";

    }
}