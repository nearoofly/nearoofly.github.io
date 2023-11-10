<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h1>Inscription</h1>
    <form action="inscription.php" method="POST">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" name="username" required><br><br>

        <label for="email">Adresse e-mail :</label>
        <input type="email" name="email" required><br><br>

        <label for="password">Mot de passe :</label>
        <input type="password" name="password" required><br><br>

        <button type="submit">S'inscrire</button>
    </form>
</body>
</html>
