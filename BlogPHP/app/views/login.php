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
            // Connexion réussie, vous pouvez rediriger vers la page d'accueil ou autre
            echo "Connexion réussie!";
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posting</title>
    <link rel="stylesheet" href="login.css">
    <?php include 'header.php'; ?>

</head>

<body>


<main>
    <section class="login">
        <h2>Login</h2>
        <form>
            <label for="username">Email:</label>
            <input type="text" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>

            <!-- Ajout du bouton d'inscription
            <button type="button" onclick="location.href='inscription.php'">Inscription</button> -->
            <!-- Ajoutez ceci à votre fichier HTML où vous avez le bouton d'inscription -->
            <button type="button" onclick="window.location.href='Signin.php'">Sign In</button>
        </form>
    </section>
</main>

<script>
    document.getElementById('home').addEventListener('click', function() {
        alert('You clicked Home');
    });

    document.getElementById('about').addEventListener('click', function() {
        alert('You clicked About');
    });

    document.getElementById('contact').addEventListener('click', function() {
        alert('You clicked Contact');
    });
</script>

</body>

</html>
