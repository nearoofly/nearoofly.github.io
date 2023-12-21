<?php
session_start();

// Vérification si la méthode est POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Connexion à la base de données (modifier avec vos paramètres de connexion)
    $servername = "localhost";
    $db_username = "votre_nom_utilisateur";
    $db_password = "votre_mot_de_passe";
    $dbname = "nom_de_votre_base_de_donnees";

    // Connexion à la base de données
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Vérification de la connexion à la base de données
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Requête SQL pour insérer l'utilisateur dans la base de données
    $sql = "INSERT INTO utilisateurs (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Redirection après l'inscription réussie
        header("Location: connexion.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
