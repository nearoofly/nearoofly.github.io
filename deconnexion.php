<?php
// Démarrez la session
session_start();

// Détruisez la session (déconnexion de l'utilisateur)
session_destroy();

// Redirigez l'utilisateur vers la page de connexion (ou une autre page de votre choix)
header('Location: login.php');
exit();
?>
