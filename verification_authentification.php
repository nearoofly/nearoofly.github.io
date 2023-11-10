<?php
// Inclure le fichier de connexion à la base de données
include 'connexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_or_email = $_POST['username_or_email'];
    $password = $_POST['password'];

    // Recherche de l'utilisateur dans la base de données par nom d'utilisateur ou e-mail
    $sql = "SELECT * FROM utilisateurs WHERE nom_utilisateur = :username_or_email OR email = :username_or_email";
    $query = $conn->prepare($sql);
    $query->bindParam(':username_or_email', $username_or_email);
    $query->execute();
    $user = $query->fetch();

    if ($user && password_verify($password, $user['mot_de_passe'])) {
        // L'authentification est réussie
        // Vous pouvez démarrer une session ou émettre un jeton d'authentification ici
        echo "Authentification réussie. Utilisateur connecté.";

        // Rediriger l'utilisateur vers une page sécurisée
        header('Location: accueil.php');
        exit();
    } else {
        // L'authentification a échoué
        echo "Échec de l'authentification. Vérifiez vos informations d'identification.";
    }
}
?>







<?php
// Inclure le fichier de vérification de l'authentification (ex : verification_authentification.php)
include 'verification_authentification.php';

// Démarrer une session
session_start();

// Vous pouvez définir des variables de session pour stocker des données sur l'utilisateur authentifié
$_SESSION['utilisateur_id'] = $user['id']; // Stockez l'ID de l'utilisateur, par exemple

// Rediriger l'utilisateur vers une page sécurisée (par exemple, la page d'accueil de l'utilisateur)
header('Location: accueil.php');
exit();
?>
