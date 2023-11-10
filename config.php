<?php
$host = "localhost"; // Adresse du serveur MySQL
$dbname = "nom_de_votre_base_de_donnees"; // Nom de la base de données
$username = "votre_nom_utilisateur"; // Nom d'utilisateur MySQL
$password = "votre_mot_de_passe"; // Mot de passe MySQL

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion à la base de données réussie.";
} catch(PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>
