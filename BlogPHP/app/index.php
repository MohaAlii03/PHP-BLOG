<?php
// index.php
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
require_once 'router.php';


// Ajoutez les routes pour le contrôleur Auth
if ($controller === 'auth') {
    $authController = new AuthController();
    if ($action === 'login') {
        $authController->login();
        exit();
    } elseif ($action === 'authenticate') {
        $authController->authenticate();
        exit();
    } elseif ($action === 'logout') {
        $authController->logout();
        exit();
    }
}


include 'controllers/' . ucfirst($controller) . 'Controller.php';

$controllerClassName = ucfirst($controller) . 'Controller';
$controllerInstance = new $controllerClassName();

$controllerInstance->$action();
?>