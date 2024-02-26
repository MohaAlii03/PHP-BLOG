<?php
// Informations de connexion à la base de données
$servername = "Admin";
$username = "root";
$password = "root";
$dbname = "BlogPerso";
$host = 'localhost';
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("La connexion à la base de données a échoué : " . $e->getMessage());
}
?>