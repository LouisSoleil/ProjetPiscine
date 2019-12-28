<?php

session_start();

require_once ('../models/ModelPersonne.php');
require_once ('../models/ModelEleve.php');
require_once ('../models/ModelProfesseur.php');
require_once ('../models/ModelClasse.php');

class ControllerPersonne {

    /*public static function search() {

        $personne = ModelPersonne::chercherPersonne("guillaume.dufour@etu.umontpellier.fr");

        require ('../views/personne.php');
    }*/

    public static function createEleve() {
        $liste_classes = ModelClasse::getSections();
        $liste_groupes = ModelClasse::getGroupes();

        require('../views/eleve/create.php');
    }

    public static function createProfesseur() {
        require('../views/professeur/create.php');
    }

    public static function createdEleve() {

        if ($_POST['password'] != $_POST['password_confirm']) {
            self::createEleve();
        }
        else {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $eleve = new ModelEleve($_POST['codeINE'], $_POST['email'], $_POST['nom'], $_POST['prenom'], $password, $_POST['classe'], $_POST['annee'], $_POST['groupe']);
            $cr = $eleve->save();

            if ($cr == 1) {
                self::createEleve();
            }
            else {
                self::connect();
            }
        }
    }

    public static function createdProfesseur() {

        if ($_POST['password'] != $_POST['password_confirm']) {
            self::createProfesseur();
        }
        else {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $professeur = new ModelProfesseur($_POST['codeINE'], $_POST['email'], $_POST['nom'], $_POST['prenom'], $password);
            $cr = $professeur->save();

            if ($cr == 1) {
                header('Location: routeur.php?controller=personne&&action=createProfesseur');
            }
            else {
                self::connect();
            }
        }
    }

    public static function connect() {
        require ('../views/connexion.php');
    }

    public static function connected() {
        $personne = ModelPersonne::chercherPersonne($_POST['email']);

        if (!$personne) {
            header('Location: routeur.php?controller=personne&&action=connect');
        }
        else {
            if (is_null($personne)) {
                header('Location: routeur.php?controller=personne&&action=connect');
            }
            else {
                if (password_verify($_POST['password'], $personne->getMdp())) {
                    //session_start();
                    $_SESSION['nom'] = $personne->getNom();
                    $_SESSION['prenom'] = $personne->getPrenom();
                    $_SESSION['codeINE'] = $personne->getCodeINE();
                    $_SESSION['email'] = $_POST['email'];

                    var_dump($_SESSION['nom']);
                    var_dump($_SESSION['codeINE']);

                    if (ModelPersonne::estEleve($_SESSION['email']) == 1) {
                        require ('../views/eleve/accueil.php');
                    }
                    else {
                        require ('../views/professeur/accueil.php');
                    }
                }
                else {
                    header('Location: routeur.php?controller=personne&&action=connect');
                }
            }
        }
    }
}

//session_destroy();