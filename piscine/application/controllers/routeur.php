<?php

    require_once 'ControllerPersonne.php';

    $controller = $_GET['controller'];
    $action = $_GET['action'];

    switch ($controller) {
        case "personne":
            ControllerPersonne::$action();
            break;
    }
?>