<?php

    require_once 'ControllerPersonne.php';
    require_once 'ControllerToeic.php';
    require_once 'ControllerStats.php';

    $controller = $_GET['controller'];
    $action = $_GET['action'];

    switch ($controller) {
        case "personne":
            ControllerPersonne::$action();
            break;
        case "toeic":
            ControllerToeic::$action();
            break;
        case "stats":
            ControllerStats::$action();
            break;
        default:
            require('../views/error.php');
    }
