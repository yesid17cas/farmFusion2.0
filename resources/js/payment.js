document.addEventListener('DOMContentLoaded', function() {
    const stripe = Stripe('pk_test_51PwuvPBd00zAvLLvcs61LQ3pR70iOEBTnzUInxPVthKarPlVOtTmqLQfv25DYunihyYWSbbQtmMOxPMIUYUY5O2e00sYniYICy');
    const elements = stripe.elements();

    // Crear el campo de la tarjeta
    const cardElement = elements.create('card');
    cardElement.mount('#card-element');

    // Mostrar errores de la tarjeta
    cardElement.on('change', function(event) {
        const errorElement = document.getElementById('card-errors');
        if (event.error) {
            errorElement.textContent = event.error.message;
        } else {
            errorElement.textContent = '';
        }
    });

    // Manejar la presentación del formulario
    const form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        // Comprobar si se seleccionó una tarjeta guardada
        const savedCard = document.getElementById('saved-cards').value;
        if (savedCard) {
            // Enviar el formulario con la tarjeta guardada
            stripeTokenHandler(savedCard);
        } else {
            // Crear un token para una nueva tarjeta
            stripe.createToken(cardElement).then(function(result) {
                if (result.error) {
                    // Mostrar errores
                    const errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Enviar el token al servidor
                    stripeTokenHandler(result.token.id);
                }
            });
        }
    });

    function stripeTokenHandler(token) {
        // Insertar el token en un campo oculto
        const hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token);
        form.appendChild(hiddenInput);

        // Enviar el formulario
        form.submit();
    }
});
