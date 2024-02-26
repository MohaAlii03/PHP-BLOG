<?php
include 'db_connect.php';

// Assurez-vous d'avoir démarré une session
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id']; // Assurez-vous que l'utilisateur est bien connecté et que la session contient user_id

    // Initialiser le chemin de l'image à un valeur par défaut ou vide
    $imagePath = '';

    // Gestion de l'image
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageName = $_FILES['image']['name'];
        $imageTmpPath = $_FILES['image']['tmp_name'];
        $allow_type=['jpg', 'png', 'jpeg'];
        $imagePath = '/Users/user/Desktop/BachelorDev/php/BlogPHP/app/img/background.jpg' . uniqid() . '-' . $imageName; // Ajouter un identifiant unique pour éviter les conflits de noms
        move_uploaded_file($imageTmpPath, $imagePath);
    }

    try {
        // Préparation de la requête SQL pour insérer l'article
        $stmt = $conn->prepare("INSERT INTO articles (Titre, Contenu, Image, user_id, Date_creation, Derniere_modification) VALUES (?, ?, ?, ?, NOW(), NOW())");
        $stmt->execute([$title, $content, $imagePath, $user_id]);

        // Rediriger vers la page d'accueil après la publication
        header('Location: home.php');
        exit;
    } catch (PDOException $e) {
        // Afficher un message d'erreur
        echo "Erreur lors de la publication : " . $e->getMessage();
        // Loguer l'erreur si nécessaire
        // error_log("Erreur lors de la publication : " . $e->getMessage());
    }
}
?>
