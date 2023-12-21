<!-- Fichier: inscription.php -->
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Insérez ici le code pour enregistrer les utilisateurs dans votre base de données
    
    header("Location: index.php");
    exit();
}
?>
