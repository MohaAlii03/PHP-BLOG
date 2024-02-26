<?php
include 'db_connect.php';

if (isset($_GET['article_id'])) {
    $article_id = $_GET['article_id'];

    try {
        $stmt = $conn->prepare("DELETE FROM Articles WHERE ID_article = ?");
        $stmt->execute([$article_id]);

        // Redirection vers la page home après la suppression
        header('Location: home.php');
        exit;
    } catch (PDOException $e) {
        // Log des erreurs
        error_log("Error deleting post: " . $e->getMessage());

        // Afficher un message d'erreur
        echo "Error deleting post. Please try again.";
    }
} else {
    // Redirection vers la page home si l'ID du post n'est pas spécifié
    header('Location: home.php');
    exit;
}
?>
