<?php

require_once ("Model.php");

abstract class ModelPersonne {

    protected $codeINE;
    protected $nom;
    protected $prenom;
    protected $email;
    protected $mdp;

    public function __construct($codeINE = NULL, $email = NULL, $nom = NULL, $prenom = NULL, $mdp = NULL) {
        if (!is_null($codeINE) && !is_null($email) && !is_null($nom) && !is_null($prenom) && !is_null($mdp)) {
            $this->codeINE = $codeINE;
            $this->email = $email;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->mdp = $mdp;
        }
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @return null
     */
    public function getCodeINE()
    {
        return $this->codeINE;
    }


    public static function chercherPersonne($email) {

        $requete = "SELECT * FROM Personne WHERE email=:email_tag";

        $req_prep = Model::$pdo->prepare($requete);

        $values = array(
            "email_tag" => $email
        );

        $req_prep->execute($values);

        $estEleve = self::estEleve($email);

        if ($estEleve == 0) {
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelProfesseur');
        }
        else {
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelEleve');
        }

        $tab = $req_prep->fetchAll();

        if (empty($tab)) {
            return false;
        }
        else {
            return $tab[0];
        }
    }

    public static function estEleve($email) {

        if (self::mailConform($email) == 0) {
            return -1;
        }

        $pos = stripos($email,"@");
        $sub = substr("$email", $pos+1);
        $res = ($sub == "etu.umontpellier.fr") ? 1 : 0;

        return $res;
    }

    public abstract function save();

    public static function mailConform($email) {
        $pos = stripos($email,"@");
        $sub = substr("$email", $pos+1);
        $res = (($sub == "etu.umontpellier.fr") || $sub == "umontpellier.fr") ? 1 : 0;

        return $res;
    }

    public static function getPasswordByEmail($email) {

        $requete = "SELECT mdp FROM Personne WHERE email = :email_tag";

        $req_prep = Model::$pdo->prepare($requete);

        $values = array(
            "email_tag" => $email
        );

        $req_prep->execute($values);

        return $req_prep->fetchColumn();
    }

    public static function update($data) {

        $values = array();

        $requete = "UPDATE Personne SET";

        foreach ($data as $key => $value) {
            $tag = "$key"."_tag";

            if ($key != "codeINE") {
                $colonne = substr($key,4);
                $requete .= " $colonne = :$tag,";
            }
            $values[$tag] = $value;
        }

        $requete = substr($requete,0,-1);

        $requete .= " WHERE codeINE = :codeINE_tag";

        var_dump($requete);
        var_dump($values);

        try {
            $req_prep = Model::$pdo->prepare($requete);
            $req_prep->execute($values);

        } catch (PDOException $e) {
            return 1;
        }
    }

    public static function updatePhoto() {

    }

}