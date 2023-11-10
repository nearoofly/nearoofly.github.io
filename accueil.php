<?php
// Démarrez la session pour accéder aux données de session
session_start();

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['utilisateur_id'])) {
    // Redirigez l'utilisateur vers la page de connexion s'il n'est pas connecté
    header('Location: login.php');
    exit();
}

// Si l'utilisateur est connecté, récupérez des informations spécifiques à l'utilisateur depuis la session
$utilisateur_id = $_SESSION['utilisateur_id'];

// Vous pouvez également récupérer davantage d'informations sur l'utilisateur à partir de la base de données si nécessaire

// Affichez le contenu de la page d'accueil
?>
<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
</head>
<body>
    <h1>Bienvenue sur la page d'accueil</h1>
    <p>Vous êtes connecté en tant qu'utilisateur ID <?php echo $utilisateur_id; ?></p>
    <!-- Ajoutez d'autres éléments HTML en fonction de vos besoins -->
    <a href="deconnexion.php">Déconnexion</a>
</body>
</html>
