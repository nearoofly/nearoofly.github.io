<?php
// Connexion à votre base de données (vous devrez configurer la connexion à votre base de données)
$host = "localhost:5000/";
$dbname = "nom_de_votre_base_de_donnees";
$username = "votre_nom_d_utilisateur";
$password = "votre_mot_de_passe";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

// Récupérez les données du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT); // Hachage du mot de passe

    // Insertion des données dans la base de données
    $sql = "INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe) VALUES (:nom, :prenom, :email, :mot_de_passe)";
    $query = $conn->prepare($sql);
    $query->bindParam(':nom', $nom);
    $query->bindParam(':prenom', $prenom);
    $query->bindParam(':email', $email);
    $query->bindParam(':mot_de_passe', $mot_de_passe);

    // Exécution de la requête
    if ($query->execute()) {
        echo "Inscription réussie !";
    } else {
        echo "Erreur lors de l'inscription.";
    }
}

// Fermer la connexion à la base de données
$conn = null;
?>
