<!DOCTYPE html>
<html>
<head>
    <title>Faire un don</title>
    <script src="stripe_donate.js"></script> <!-- Incluez le fichier JavaScript -->
</head>
<body>
    <h1>Faire un don</h1>

    <form method="post" action="donate.php">
        <label for="montant">Montant du don (en euros) :</label>
        <span class="montant">7 €</span>
        <button type="submit" class="bouton-don">Faire un don de 7 euros</button>
        <button type="submit" class="bouton-envoyez">Envoyez</button>
    </form>
</body>
</html>
