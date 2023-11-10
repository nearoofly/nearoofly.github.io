<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faire un don</title>
    <link rel="stylesheet" href="styles.css"> <!-- Liez une feuille de style CSS si nécessaire -->
</head>
<body>
    <h1>Faire un don</h1>
     <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Intégration Stripe pour traiter le paiement
        require 'vendor/autoload.php'; // Assurez-vous d'avoir installé la bibliothèque Stripe (composer require stripe/stripe-php)
        \Stripe\Stripe::setApiKey('pk_live_51NID2BAGHCS2IVlyKTnlpEsDpVM20wph80XFEG24VnSlh2JSp1OqHFlutrBHiPxcoOIhYAQdoklbBMRQws3cRC3U00tsrEOTxW');

        try {
            $intent = \Stripe\PaymentIntent::create([
                'amount' => 7 * 100, // Le montant est fixé à 7 euros (en cents)
                'currency' => 'EUR',
            ]);

            // Afficher un message de confirmation
            echo "Merci pour votre don de 7 € !";
        } catch (Exception $e) {
            echo "Une erreur s'est produite lors du traitement de votre paiement : " . $e->getMessage();
        }
    }
    ?>

    <form method="post">
        <button type="submit">Faire un don de 7 €</button>
    </form>
    
    
    
    
    
    
    
    
    
    <p>Vous pouvez soutenir ce projet en faisant un don de 7 euros.</p>

    <!-- Formulaire de don avec Stripe -->
    <form action="process_payment.php" method="post" id="payment-form">
        <label for="cardholder">Nom du titulaire de la carte :</label>
        <input type="text" id="cardholder" name="cardholder" required>
        
        <label for="cardnumber">Numéro de carte de crédit :</label>
        <div id="card-element">
            <!-- Un conteneur pour les informations de carte -->
        </div>
        <div id="card-errors" role="alert"></div>

        <input type="hidden" id="amount" name="amount" value="700"> <!-- Montant en centimes (7 euros) -->
        <button type="submit">Faire un don de 7 €</button>
    </form>
    

<form method="post">
    <label for="montant">Montant du don (en euros) :</label>
    <input type="number" id="montant" name="montant" required>
    <button type="submit">Faire un don</button>
</form>


    <p>Merci pour votre générosité !</p>

    <!-- Scripts pour Stripe -->
    <script src="https://js.stripe.com/v3/"></script>
    <script src="stripe_donate.js"></script> <!-- Vous devrez créer ce fichier JavaScript -->

</body>
</html>
