<?php
require 'controller/Controller.php';

session_start();


$page = $_GET['action'] ?? 'home';
$controller = new Controller();

switch ($page) {
    case 'home':
        $controller->home();
        break;
    case 'login':
        $controller->login();
        break;
    case 'new':
        $controller->newWebinar();
        break;
    default:
        $controller->home();
}