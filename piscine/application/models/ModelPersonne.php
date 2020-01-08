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

    public static function update($codeINE, $new_codeINE, $new_email, $new_nom, $new_prenom, $new_password = NULL, $new_classe = NULL, $new_annee = NULL, $new_groupe = NULL) {
        
        
        $requete = "UPDATE Personne SET codeINE = :new_codeINE_tag, email = :new_email_tag, nom = :new_nom_tag, prenom = :new_prenom_tag";
        
        if (!is_null($new_password)) {
            $requete .= ",password = :new_password_tag";
        }
        if (!is_null($new_classe)) {
            $requete .= ",classe = :new_classe_tag";
        }
        if (!is_null($new_annee)) {
            $requete .= ",annee = :new_annee_tag";
        }
        if (!is_null($new_groupe)) {
            $requete .= ",groupe = :new_groupe_tag";
        }
        
        $requete .= "WHERE codeINE = :codeINE_tag";

        $req_prep = Model::$pdo->prepare($requete);

        $values = array(
            "codeINE_tag" => $codeINE,
            "new_codeINE_tag" => $new_codeINE,
            "new_email_tag" => $new_email,
            "new_nom_tag" => $new_nom,
            "new_prenom_tag" => $new_prenom
        );

        if (!is_null($new_password)) {
            $values['new_password_tag'] = $new_password;
        }
        if (!is_null($new_classe)) {
            $values['new_classe_tag'] = $new_classe;
        }
        if (!is_null($new_annee)) {
            $values['new_annee_tag'] = $new_annee;
        }
        if (!is_null($new_groupe)) {
            $values['new_groupe_tag'] = $new_groupe;
        }

        $req_prep->execute($values);
    }
}