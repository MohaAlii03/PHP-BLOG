<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {
        $stmt = $conn->prepare("INSERT INTO utilisateurs (Nom_utilisateur, Mot_de_passe, Email) VALUES (?, ?, ?)");
        $stmt->execute([$nom, $email, $password]);
        // Rediriger vers une page de succès ou afficher un message
        header('Location: home.php');
        exit;
    } catch (PDOException $e) {
        echo "Erreur d'inscription. Veuillez réessayer.";
        // Vous pouvez également loguer l'erreur pour déboguer
        // error_log("Erreur d'inscription : " . $e->getMessage());
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignIn</title>
    <link rel="stylesheet" href="Signin.css">
</head>

<body>
<?php include 'header.php'; ?>


<main>
    <section class="inscription">
        <h2>Sign In</h2>
        <form action="" method="post">
            <label for="nom">Name :</label>
            <input type="text" id="nom" name="nom" required>

            <!-- <label for="prenom">First Name :</label>
            <input type="text" id="prenom" name="prenom" required> -->

            <label for="email">E-mail :</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password :</label>
            <input type="password" id="password" name="password" required>
<!-- 
            <label for="confirm_password">Confirme password :</label>
            <input type="password" id="confirm_password" name="confirm_password" required> -->

            <input type="checkbox" id="accept_conditions" name="accept_conditions" required>
            <label for="accept_conditions">I accept the conditions of use</label>

            <button type="submit">Sign In</button>
        </form>

        <button type="button" onclick="location.href='index.php'">Go back </button>
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
