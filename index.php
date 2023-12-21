<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: connexion.html");
    exit();
}
?>

<!-- Contenu de la page principale -->
<a href="https://nearoofly.github.io/Hdessawvideos" class="website-button" target="_blank">Accéder à la page externe</a>
