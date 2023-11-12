<?php
// Connexion à votre base de données (vous devrez configurer la connexion à votre base de données)
$host = "localhost";
$dbname = "https://wharkly47.github.io/";
$username = "Wharkly47";
$password = "Wharkly47";

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
        echo "Inscription réussie !";
    } else {
        echo "Erreur lors de l'inscription.";
    }
}

// Fermer la connexion à la base de données
$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>

    <h2>Inscription</h2>

    <!-- Formulaire d'inscription -->
    <form action="traitement_inscription.php" method="post">
        <!-- Ajoutez ici les champs nécessaires pour l'inscription -->
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>

        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required>

        <!-- Ajoutez d'autres champs ici si nécessaire -->

        <!-- Bouton de soumission du formulaire -->
        <button type="submit">S'inscrire</button>
    </form>

</body>
</html>
