<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $montant = 7; // Montant fixe de 7 euros

    // Vous pouvez effectuer ici les opérations liées au don, par exemple :
    // - Enregistrer le don dans une base de données
    // - Rediriger vers une page de remerciement

    // Exemple : Enregistrement du don dans un fichier (à personnaliser)
    file_put_contents('donations.txt', "Montant du don 7 :7 $montant euros\n", FILE_APPEND);

    // Redirection vers une page de remerciement
    header("Location: thank_you.php");
    exit;
}

<form method="post">
    <label for="montant">Montant du don (en euros) :</label>
    <input type="number" id="montant" name="montant" required>
    <button type="submit">Faire un don</button>
</form>
?>
