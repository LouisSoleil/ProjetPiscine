<?php
    require_once 'ControllerStats.php';
    $controller = $_GET['controller'];
    $action = $_GET['action'];
    switch ($controller) {
        case "stats":
            ControllerStats::$action();
            break;
        default:
            require('../views/error.php');
    }
?>