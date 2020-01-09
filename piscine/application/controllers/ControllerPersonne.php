<?php

session_start();

require_once ('../models/ModelPersonne.php');
require_once ('../models/ModelEleve.php');
require_once ('../models/ModelProfesseur.php');
require_once ('../models/ModelClasse.php');

class ControllerPersonne {

    public static function createEleve() {

        $liste_classes = ModelClasse::getSections();
        $liste_groupes = ModelClasse::getGroupes();

        unset($erreurs);

        if (!isset($_POST['forminscription_eleve'])) {
            require ('../views/eleve/create.php');
        }
        else {
            $erreurs = array();

            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $ine = htmlspecialchars($_POST['codeINE']);
            $email = htmlspecialchars($_POST['email']);
            $pwd = $_POST['password'];
            $pwdBis = $_POST['password_confirm'];

            if (!preg_match("/^[a-zA-Z]+-?[a-zA-Z]+$/", $nom)) {
                $erreurs['nom'] = "Erreur dans la saisie du nom";
            } else {
                $nom = strtoupper($nom);
            }

            if (!preg_match("/^[a-zA-Z]+-?[a-zA-Z]+$/", $prenom)) {
                $erreurs['prenom'] = "Erreur dans la saisie du prénom";
            } else {
                $prenom = ucfirst($prenom);
            }

            if (strlen($ine) != 11) {
                $erreurs['codeINE'] = "Le code INE n'a pas le bon nombre de caractères (11 caractères requis)";
            }

            if (!preg_match("/^[a-z]+-?[a-z]+\.[a-z]+-?[a-z]+@etu\.umontpellier\.fr$/", $email)) {
                $erreurs['email'] = "L'adresse mail n'est pas de la bonne forme";
            } else {
                $personne = ModelPersonne::chercherPersonne($email);

                if ($personne) {
                    $erreurs['email'] = "Ce mail est déjà affilié à un compte";
                }
            }

            if ($pwd != $pwdBis)
            {
                $erreurs['pwd'] = "Vos mots de passe ne correspondent pas";
            } else {
                $pwd = password_hash($pwd, PASSWORD_DEFAULT);
            }

            if (empty($erreurs)) {
                $eleve = new ModelEleve($ine, $email, $nom, $prenom, $pwd, $_POST['classe'], $_POST['annee'], $_POST['groupe']);
                $cr = $eleve->save();

                if ($cr == 1) {
                    $erreurs['codeINE'] = "Ce codeINE existe déjà";
                    require ('../views/eleve/create.php');
                }
                else {
                    header('Location: routeur.php?controller=personne&&action=connect');
                }

            }
            else {
                require ('../views/eleve/create.php');
            }
        }

    }

    public static function createProfesseur() {

        unset($erreurs);

        if (!isset($_POST['forminscription_prof'])) {
            require('../views/professeur/create.php');
        }
        else {
            $erreurs = array();

            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $ine = htmlspecialchars($_POST['codeINE']);
            $email = htmlspecialchars($_POST['email']);
            $pwd = $_POST['password'];
            $pwdBis = $_POST['password_confirm'];

            if (!preg_match("/^[a-zA-Z]+-?[a-zA-Z]+$/", $nom)) {
                $erreurs['nom'] = "Erreur dans la saisie du nom";
            } else {
                $nom = strtoupper($nom);
            }

            if (strlen($nom) > 255) {
                $erreurs['nom'] = ((isset($erreurs['nom'])) ? $erreurs['nom'] : "")."<br>"."Le nom saisi est trop long";
            }


            if (!preg_match("/^[a-zA-Z]+-?[a-zA-Z]+$/", $prenom)) {
                $erreurs['prenom'] = "Erreur dans la saisie du prénom";
            } else {
                $prenom = ucfirst($prenom);
            }

            if (strlen($prenom) > 255) {
                $erreurs['prenom'] = ((isset($erreurs['prenom'])) ? $erreurs['prenom'] : "")."<br>"."Le prénom saisi est trop long";
            }

            if (strlen($ine) != 11) {
                $erreurs['codeINE'] = "Le code INE n'a pas le bon nombre de caractères (11 caractères requis)";
            }

            if (!preg_match("/^[a-z]+-?[a-z]+\.[a-z]+-?[a-z]+@umontpellier\.fr$/", $email)) {
                $erreurs['email'] = "L'adresse mail n'est pas de la bonne forme";
            } else {
                $personne = ModelPersonne::chercherPersonne($email);

                if ($personne) {
                    $erreurs['email'] = "Ce mail est déjà affilié à un compte";
                }
            }

            if ($pwd != $pwdBis)
            {
                $erreurs['pwd'] = "Vos mots de passe ne correspondent pas";
            } else {
                $pwd = password_hash($pwd, PASSWORD_DEFAULT);
            }

            if (empty($erreurs)) {
                $professeur = new ModelProfesseur($ine, $email, $nom, $prenom, $pwd);
                $cr = $professeur->save();

                if ($cr == 1) {
                    $erreurs['codeINE'] = "Ce codeINE existe déjà";
                    require('../views/professeur/create.php');
                }
                else {
                    header('Location: routeur.php?controller=personne&&action=connect');
                }
            }
            else {
                require('../views/professeur/create.php');
            }
        }
    }

    public static function connect() {

        unset($erreurs);

        if (!isset($_POST['formconnexion'])) {
            require('../views/connexion.php');
        }
        else {

            $erreurs = array();
            $personne = ModelPersonne::chercherPersonne($_POST['email']);

            if (!$personne) {
                $erreurs['email'] = "Ce mail n'existe pas";
                require('../views/connexion.php');
            }
            else {
                if (password_verify($_POST['password'], $personne->getMdp())) {

                    $_SESSION['nom'] = $personne->getNom();
                    $_SESSION['prenom'] = $personne->getPrenom();
                    $_SESSION['codeINE'] = $personne->getCodeINE();
                    $_SESSION['email'] = $_POST['email'];

                    if (ModelPersonne::estEleve($_SESSION['email']) == 1) {
                        $_SESSION['classe'] = ModelClasse::getClasseByCodeINE($_SESSION['codeINE']);
                        $_SESSION['groupe'] = ModelClasse::getGroupeById($_SESSION['codeINE']);
                        var_dump($_SESSION);

                        require ('../views/eleve/accueil.php');
                    }
                    else {
                        var_dump($_SESSION);
                        require ('../views/professeur/accueil.php');
                    }
                }
                else {
                    $erreurs['pwd'] = "Mot de passe incorrect";
                    require('../views/connexion.php');
                }
            }
        }
    }

    public static function profil() {
        if (isset($_SESSION['email'])) {
            if (ModelPersonne::estEleve($_SESSION['email']) == 1) {
                require('../views/eleve/profil.php');
            }
            else {
                require ('../views/professeur/profil.php');
            }
        }
        else {
            require ('../views/error.php');
        }
    }

    public static function deconnect() {

        if (!empty($_SESSION)) {
            session_destroy();
            header('Location: routeur.php?controller=personne&&action=connect');
        }
        else {
            require ('../views/error.php');
        }
    }

    public static function update2() {

        if (!isset($_POST['formupdate'])) {
            require ('../views/eleve/profil_modify.php');
        }
        else {
            $taillemax = 2097152;
            $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');

            if ($_FILES['photo']['size'] <= $taillemax) {
                $extensionUpload = strtolower(substr(strrchr($_FILES['photo']['name'],'.'),1));

                if (in_array($extensionUpload, $extensionsValides)) {
                    $chemin = "../../membres/photos/".$_SESSION['codeINE']/*.".".$extensionUpload*/;
                    $resultat = move_uploaded_file($_FILES['photo']['tmp_name'],$chemin);

                    if ($resultat) {
                        header('Location: routeur.php?controller=personne&&action=profil');
                    }
                    else {
                        $erreur = "Erreur 3";
                    }
                }
                else {
                    $erreur = "Erreur 2";
                }
            }
            else {
                $erreur = "Erreur 1";
            }
        }
    }

    public static function update() {

        $liste_classes = ModelClasse::getSections();
        $liste_groupes = ModelClasse::getGroupes();

        unset($erreurs);

        if (!isset($_POST['formupdate'])) {
            if (ModelPersonne::estEleve($_SESSION['email']) == 1)
                require('../views/eleve/profil_modify2.php');
            else {
                require('../views/professeur/profil_modify.php');
            }
        }
        else {

            $estEleve = ModelPersonne::estEleve($_SESSION['email']) == 1;

            $erreurs = array();

            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $ine = htmlspecialchars($_POST['codeINE']);
            $email = htmlspecialchars($_POST['email']);

            if ($estEleve) {
                $pattern = "/^[a-z]+-?[a-z]+\.[a-z]+-?[a-z]+@etu\.umontpellier\.fr$/";
            }
            else {
                $pattern="/^[a-z]+-?[a-z]+\.[a-z]+-?[a-z]+@umontpellier\.fr$/";
            }

            if (!preg_match("/^[a-zA-Z]+-?[a-zA-Z]+$/", $nom) && $nom) {
                $erreurs['nom'] = "Erreur dans la saisie du nom";
            } else {
                $nom = strtoupper($nom);
            }

            if (strlen($nom) > 255) {
                $erreurs['nom'] = ((isset($erreurs['nom'])) ? $erreurs['nom'] : "")."<br>"."Le nom saisi est trop long";
            }

            if (!preg_match("/^[a-zA-Z]+-?[a-zA-Z]+$/", $prenom)) {
                $erreurs['prenom'] = "Erreur dans la saisie du prénom";
            } else {
                $prenom = ucfirst($prenom);
            }

            if (strlen($prenom) > 255) {
                $erreurs['prenom'] = ((isset($erreurs['prenom'])) ? $erreurs['prenom'] : "")."<br>"."Le prénom saisi est trop long";
            }

            if (strlen($ine) != 11) {
                $erreurs['codeINE'] = "Le code INE n'a pas le bon nombre de caractères (11 caractères requis)";
            }

            if (!preg_match($pattern, $email)) {
                $erreurs['email'] = "L'adresse mail n'est pas de la bonne forme";
            } else {
                $personne = ModelPersonne::chercherPersonne($email);
                if ($personne && $personne->getCodeINE() != $_SESSION['codeINE']) {
                    $erreurs['email'] = "Ce mail est déjà affilié à un compte";
                }
            }

            if ($_POST['mdp_actuel'] != '' && $_POST['changer_mdp'] != '' && $_POST['confirmer_nv_mdp'] != '') {
                $pwd_actuel = $_POST['mdp_actuel'];
                $pwd = $_POST['changer_mdp'];
                $pwdBis = $_POST['confirmer_nv_mdp'];
                if (!password_verify($pwd_actuel, ModelPersonne::getPasswordByEmail($_SESSION['email']))) {
                    $erreurs['pwd'] = "Votre mot de passe actuel ne correspond pas";
                } else {
                    if ($pwd != $pwdBis) {
                        $erreur['pwd'] = "Vos nouveaux mots de passes ne correspondent pas";
                    } else {
                        $pwd = password_hash($pwd, PASSWORD_DEFAULT);
                    }
                }
            }
            if (empty($erreurs)) {

                $data = array(
                    'codeINE' => $_SESSION['codeINE'],
                    'new_codeINE' => $ine,
                    'new_nom' => $nom,
                    'new_prenom' => $prenom,
                    'new_email' => $email
                );

                if (isset($pwd)) {
                    $data['new_mdp'] = $pwd;
                }

                if ($estEleve) {
                    $idClasse = ModelClasse::getIdClasse($_POST['classe'], $_POST['annee']);
                    $data['new_idClasse'] = $idClasse;
                    $numGroupe = ModelClasse::getNumGroupeByLibelle($_POST['groupe']);
                    $data['new_numGroupe'] = $numGroupe;
                }


                $cr = ModelPersonne::update($data);


                if ($cr == 1) {
                    $erreurs['divers'] = "Une erreur est survenue";

                    if ($estEleve) {
                        require('../views/eleve/profil_modify2.php');
                    }
                    else {
                        require('../views/professeur/profil_modify2.php');
                    }


                }
                else {
                    self::majSession($data);
                    header('Location: routeur.php?controller=personne&&action=profil');
                }
            }
            else {
                if ($estEleve) {
                    require('../views/eleve/profil_modify2.php');
                }
                else {
                    require('../views/professeur/profil_modify.php');
                }
            }
        }
    }

    public static function majSession($data) {

        if (isset($data['new_nom'])) $_SESSION['nom'] = $data['new_nom'];
        if (isset($data['new_prenom'])) $_SESSION['prenom'] = $data['new_prenom'];
        if (isset($data['new_codeINE'])) {
            rename("../../membres/photos/".$_SESSION['codeINE'],"../../membres/photos/".$data['new_codeINE']);
            $_SESSION['codeINE'] = $data['new_codeINE'];
        }
        if (isset($data['new_email'])) $_SESSION['email'] = $data['new_email'];
        if (isset($data['new_idClasse'])) $_SESSION['classe'] = ModelClasse::getClasseByCodeINE($_SESSION['codeINE']);
        if (isset($data['new_numGroupe'])) $_SESSION['groupe'] = ModelClasse::getGroupeById($_SESSION['codeINE']);
    }
}

//session_destroy();