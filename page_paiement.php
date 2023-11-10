<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Paiement</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
    <div class="payment-form">
        <h2>Payer 5 euros pour accéder à plus de vidéos</h2>
        <form action="process_payment.php" method="post" id="payment-form">
            <label for="cardholder">Nom du titulaire de la carte :</label>
            <input type="text" id="cardholder" name="cardholder" required>
            <label for="cardnumber">Numéro de carte de crédit :</label>
            <div id="card-element">
                <!-- Conteneur pour les informations de la carte -->
            </div>
            <div id="card-errors" role="alert"></div>
            <input type="hidden" id="amount" name="amount" value="500"> <!-- Montant en centimes (5 euros) -->
            <button type="submit">Payer</button>
        </form>
    </div>

    <script>
        var stripe = Stripe('pk_live_51NID2BAGHCS2IVlyKTnlpEsDpVM20wph80XFEG24VnSlh2JSp1OqHFlutrBHiPxcoOIhYAQdoklbBMRQws3cRC3U00tsrEOTxW'); // Remplacez par votre clé API Stripe publique
        var elements = stripe.elements();

        var style = {
            base: {
                fontSize: '16px',
                color: '#32325d',
            },
        };

        var card = elements.create('card', { style: style });
        card.mount('#card-element');

        card.addEventListener('change', function (event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        var form = document.getElementById('payment-form');

        form.addEventListener('submit', function (event) {
            event.preventDefault();

            stripe.createToken(card).then(function (result) {
                if (result.error) {
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    stripeTokenHandler(result.token);
                }
            });
        });

        function stripeTokenHandler(token) {
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            form.submit();
        }
    </script>
</body>
</html>
