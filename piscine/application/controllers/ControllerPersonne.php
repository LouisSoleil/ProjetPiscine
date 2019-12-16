<?php

require_once ('../models/ModelPersonne.php');
require_once ('../models/ModelClasse.php');

class ControllerPersonne {

    public static function search() {

        $personne = ModelPersonne::chercherPersonne("guillaume.dufour@etu.umontpellier.fr");

        require ('../views/personne.php');
    }

    public static function createEleve() {
        $liste_classes = ModelClasse::getSections();
        $liste_groupes = ModelClasse::getGroupes();

        require ('../views/createEleve.php');
    }

    public static function createProfesseur() {
        require ('../views/createProfesseur.php');
    }

    public static function createdEleve() {

    }

    public static function createdProfesseur() {

    }

    public static function connect() {
        require ('../views/connexion.php');
    }
}