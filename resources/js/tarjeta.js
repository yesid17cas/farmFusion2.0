const stripe = Stripe('pk_test_51PwuvPBd00zAvLLvcs61LQ3pR70iOEBTnzUInxPVthKarPlVOtTmqLQfv25DYunihyYWSbbQtmMOxPMIUYUY5O2e00sYniYICy');
const elements = stripe.elements();

// Crear estilos para los campos de la tarjeta (opcional)
const style = {
    base: {
        color: '#000',
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '16px',
        '::placeholder': {
            color: '#000'
        }
    },
    invalid: {
        color: '#fa755a',
        iconColor: '#fa755a'
    }
};

// Crear los campos individuales para el número de tarjeta, fecha de vencimiento y CVC
const cardNumber = elements.create('cardNumber', { style });
const cardExpiry = elements.create('cardExpiry', { style });
const cardCvc = elements.create('cardCvc', { style });

// Montar los campos en el HTML
cardNumber.mount('#card-number');
cardExpiry.mount('#card-expiry');
cardCvc.mount('#card-cvc');

// Escuchar el envío del formulario
const form = document.getElementById('form');
form.addEventListener('submit', async (event) => {
    event.preventDefault();
    const full_name = document.querySelector('#full_name').value

    const { paymentMethod, error } = await stripe.createPaymentMethod({
        type: 'card',
        card: cardNumber,
        billing_details: {
            name: full_name,
        }
    });

    if (error) {
        console.error(error);
        alert('Error: ' + error.message); // Mostrar el mensaje de error al usuario
        return; // Asegúrate de que esto regrese aquí
    }

    // Este bloque es donde se envía la solicitud al servidor
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch(urlEnv, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken, // Laravel CSRF token
        },
        body: JSON.stringify({
            payment_method_id: paymentMethod.id, // Aquí debe estar el ID del método de pago
        }),
    })
        .then((response) => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then((data) => {
            if (data.success) {
                alert('Tarjeta guardada correctamente');
                location.reload()
            } else {
                document.querySelector('#error-message').textContent = 'Hubo un error al guardar la tarjeta'
            }
        })
        .catch((error) => {
            document.querySelector('#error-message').textContent = 'Hubo un error al guardar la tarjeta'
        });
});
