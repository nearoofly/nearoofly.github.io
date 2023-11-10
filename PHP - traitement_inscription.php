<?php
// Connexion à votre base de données (vous devrez configurer la connexion à votre base de données)
$host = "localhost";
$dbname = "votre_base_de_donnees";
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
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hachage du mot de passe

    // Insertion des données dans la base de données
    $sql = "INSERT INTO utilisateurs (nom_utilisateur, email, mot_de_passe) VALUES (:username, :email, :password)";
    $query = $conn->prepare($sql);
    $query->bindParam(':username', $username);
    $query->bindParam(':email', $email);
    $query->bindParam(':password', $password);

    // Exécution de la requête
    if ($query->execute()) {
        // Rediriger l'utilisateur vers une page de confirmation, page d'accueil, etc.
        header('Location: confirmation.php');
        exit();
    } else {
        echo "Erreur lors de l'inscription.";
    }
}

// Fermer la connexion à la base de données
$conn = null;
?>
