document.addEventListener("DOMContentLoaded", function () {
  let stripe = Stripe("pk_test_51PwuvPBd00zAvLLvcs61LQ3pR70iOEBTnzUInxPVthKarPlVOtTmqLQfv25DYunihyYWSbbQtmMOxPMIUYUY5O2e00sYniYICy");
  let elements = stripe.elements();
  const form = document.getElementById('payment-form');

  let style = {
    base: {
      iconColor: '#666EE8',
      color: '#31325F',
      fontWeight: 400,
      fontFamily: 'Helvetica, Arial, sans-serif',
      fontSize: '16px',
      '::placeholder': {
        color: '#CFD7DF',
      },
    },
    invalid: {
      iconColor: '#fa755a',
      color: '#fa755a',
    },
  };

  let cardElement = elements.create('card', { style: style });
  cardElement.mount('#card-element');

  form.addEventListener('submit', async (event) => {
    event.preventDefault();

    const savedCard = document.querySelector('select[name="saved_card"]').value;
    const paymentMethod = savedCard ? { id: savedCard } : { card: cardElement };

    try {
      fetch('/payment/intent')
        .then((response) => response.json())
        .then((data) => {
          const clientSecret = data.clientSecret;

          stripe.confirmCardPayment(clientSecret, {
            payment_method: {
              card: cardElement,
              billing_details: {
                name: 'Nombre del Cliente',
              },
            },
          }).then((result) => {
            if (result.error) {
              document.querySelector('#error-message').textContent = result.error.message;
            } else {
              if (result.paymentIntent.status === 'succeeded') {
                window.location.href = '/factura'
              }
            }
          });
        });

    } catch (error) {
      document.querySelector('#error-message').textContent = 'Error al procesar el pago. Intenta nuevamente.';
    }
  });
});
