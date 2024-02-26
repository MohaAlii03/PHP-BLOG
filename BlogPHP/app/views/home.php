<?php
// Assurez-vous d'inclure votre fichier de connexion ici
include 'db_connect.php';

// Démarrez la session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <section class="blog-post">
            <h2>Blog Post</h2>

            <!-- Affichage des articles avec titres, contenus et images -->
            <?php
// Remplacez "votre_requete_sql" par la requête SQL pour récupérer les articles de votre base de données
$sql = "SELECT * FROM articles";
$result = $conn->query($sql);

if ($result && $result->rowCount() > 0) {
    foreach ($result as $row) {
        echo '<article>';
        echo '<h3>' . htmlspecialchars($row['Titre'] ?? '') . '</h3>';
        echo '<p>' . htmlspecialchars($row['Contenu'] ?? '') . '</p>';
        // Affichage de l'image s'il y en a une
        if (!empty($row['Image'])) {
            echo '<img src="' . htmlspecialchars($row['Image']) . '" alt="Image">';
        }

        // Bouton de suppression
        echo '<a href="process_delete.php?article_id=' . urlencode($row['ID_artcile'] ?? '') . '" onclick="return confirm(\'Are you sure you want to delete this post?\')">Delete</a>';

        echo '</article>';
    }
} else {
    echo '<p>Aucun article trouvé.</p>';
}

?>
            
        </section>
    </main>
</body>
</html>
