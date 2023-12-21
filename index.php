<!-- Fichier: index.php -->
<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: inscription.html");
    exit();
}
?>

<!-- Le reste du contenu de votre page index.php -->

<!-- Lien vers la page externe -->
<a href="https://kokochanel.github.io/Hdessawvideos" class="website-button" target="_blank">Accéder à la page externe</a>
