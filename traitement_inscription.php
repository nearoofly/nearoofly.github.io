<?php
// Connexion à la base de données (remplacez les informations par les vôtres)
$host = "localhost";
$dbname = "nom_de_votre_base_de_donnees";
$username = "votre_nom_utilisateur";
$password = "votre_mot_de_passe";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

// Récupérez les données du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Insérez les données dans la base de données
    $sql = "INSERT INTO utilisateurs (nom_utilisateur, email, mot_de_passe) VALUES (:username, :email, :password)";
    $query = $conn->prepare($sql);
    $query->bindParam(':username', $username);
    $query->bindParam(':email', $email);
    $query->bindParam(':password', $password);

    if ($query->execute()) {
        echo "Inscription réussie !";
    } else {
        echo "Erreur lors de l'inscription.";
    }
}

// Fermez la connexion à la base de données
$conn = null;
?>
