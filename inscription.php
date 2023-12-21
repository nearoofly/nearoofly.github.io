<?php
// Connexion à la base de données (à adapter avec vos informations de connexion)
$servername = "localhost";
$username = "votre_nom_utilisateur";
$password = "votre_mot_de_passe";
$dbname = "votre_base_de_donnees";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Hasher le mot de passe (pour des raisons de sécurité)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Requête pour insérer l'utilisateur dans la base de données
    $sql = "INSERT INTO utilisateurs (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        // Rediriger vers la page d'accueil après l'inscription réussie
        header("Location: index.html");
        exit();
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
