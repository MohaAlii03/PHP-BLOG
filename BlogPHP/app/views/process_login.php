<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Connexion réussie, rediriger vers la page d'accueil
            header('Location: home.php');
            exit;
        } else {
            echo "Identifiants invalides. Veuillez réessayer.";
        }
    } catch (PDOException $e) {
        echo "Erreur de connexion. Veuillez réessayer.";
        // Vous pouvez également loguer l'erreur pour déboguer
        // error_log("Erreur de connexion : " . $e->getMessage());
    }
}
?>
