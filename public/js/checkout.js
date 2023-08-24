$(document).ready(function() {

    var stripe = Stripe($('#stripe-form').data('stripe-public-key'));
    
    
    // Create an instance of Elements
    var elements = stripe.elements();
    
    
    // Create an instance of the card Element
    var card = elements.create('card');
    
    // Add an instance of the card Element into the `card-element` div
    card.mount('#card-element');
    
    // Handle real-time validation errors from the card Element
    card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });
    
    // Handle form submission
    $('#stripe-form').submit(function(event) {
        event.preventDefault();
    
        stripe.createToken(card).then(function(result) {
            if (result.error) {
                // Inform the user if there was an error
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                $('#stripe-form').append('<input type="hidden" name="stripeToken" value="' + result.token.id + '">');
                $('#stripe-form').get(0).submit();
            }
        });
    });
    });