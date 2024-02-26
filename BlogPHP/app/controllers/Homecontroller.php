<?php
class HomeController {
    public function index() {
        include 'views/header.php';
        echo 'Bienvenue sur la page d\'accueil!';
        // include 'views/footer.php';
    }
}
