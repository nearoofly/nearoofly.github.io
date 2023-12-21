// Inclure la bibliothèque Stripe.js
var stripe = Stripe('pk_live_ 0000000000000 '); // Remplacez par votre clé publique Stripe

// Créer un élément de carte
var elements = stripe.elements();
var card = elements.create('card');

// Attacher l'élément de carte au formulaire
card.mount('#card-element');

// Gérer la soumission du formulaire
var form = document.getElementById('payment-form');
var errorElement = document.getElementById('card-errors');

form.addEventListener('submit', function (event) {
    event.preventDefault();

    stripe.createToken(card).then(function (result) {
        if (result.error) {
            // Gérer les erreurs de validation de la carte
            errorElement.textContent = result.error.message;
        } else {
            // Le jeton a été créé avec succès, vous pouvez l'envoyer au serveur pour traitement
            var token = result.token;

            // Envoyer le jeton et le montant au serveur pour traiter le paiement
            fetch('/process-payment', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    token: token.id,
                    montant: 700 // Le montant est en cents (7 euros = 700 cents)
                })
            })
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                // Traiter la réponse du serveur (confirmation du paiement, etc.)
                if (data.success) {
                    // Rediriger l'utilisateur vers une page de confirmation ou de remerciement
                    window.location.href = '/confirmation';
                } else {
                    // Gérer les erreurs ou afficher un message d'erreur
                    errorElement.textContent = data.error;
                }
            });
        }
    });
});
