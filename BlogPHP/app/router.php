<?php
// router.php

// Charger les classes nécessaires
require_once 'controllers/HomeController.php';
require_once 'controllers/AuthController.php';

// Définir une fonction pour gérer les routes
function route($controller, $action) {
    switch ($controller) {
        case 'home':
            $homeController = new HomeController();
            if ($action === 'index') {
                $homeController->index();
            } else {
                // Gérer d'autres actions du contrôleur Home si nécessaire
            }
            break;

        case 'auth':
            $authController = new AuthController();
            if ($action === 'login') {
                $authController->login();
            } elseif ($action === 'authenticate') {
                $authController->authenticate();
            } elseif ($action === 'logout') {
                $authController->logout();
            } else {
                // Gérer d'autres actions du contrôleur Auth si nécessaire
            }
            break;

        default:
            // Gérer d'autres contrôleurs si nécessaire
            break;
    }
}

// Récupérer les paramètres de l'URL
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Appeler la fonction de routage
route($controller, $action);
