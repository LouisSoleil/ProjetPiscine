<?php

    require_once 'ControllerPersonne.php';
    require_once 'ControllerToeic.php';

    $controller = $_GET['controller'];
    $action = $_GET['action'];

    switch ($controller) {
        case "personne":
            ControllerPersonne::$action();
            break;
        case "toeic":
            ControllerToeic::$action();
            break;
        default:
            require('../views/error.php');
    }
