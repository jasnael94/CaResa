<?php
// Informations de connexion
$host = 'localhost'; // Adresse du serveur (localhost pour un serveur local)
$dbname = 'royalride'; // Nom de la base de données
$username = 'root'; // Nom d'utilisateur de la base de données
$password = ''; // Mot de passe de l'utilisateur

try {
    // Création d'une nouvelle instance PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
} catch (PDOException $e) {
    // Message d'erreur en cas de problème de connexion
    die("Erreur de connexion : " . $e->getMessage());
}
?>