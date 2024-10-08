document.addEventListener("DOMContentLoaded", function () {
  let stripe = Stripe("pk_test_51Q70TZJPTjj11sGIWsESON5DDd8zbKh57Y3QDG8xA7dcyfA3oh6hzHQTra7WKWdn1ky2t6nshoFEhgVWkRHB6GpI00boG1q4Cl");
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

    try {
      if (savedCard) {
        fetch('/payment/save', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Token CSRF de Laravel
          },
          body: JSON.stringify({
            payment_method: savedCard // Aquí va el ID del método de pago o el token de la tarjeta guardada
          })
        })
          .then(function (response) {

            return response.json();
          })
          .then((result) => {
            console.log(result)
            if (result.error) {
              document.querySelector('#error-message').textContent = result.error.message;
            } else {
              if (result.paymentIntent.status === 'succeeded') {
                window.location.href = '/factura'
              }
            }
          })
          .catch(function (error) {
            console.error('Error en la solicitud:', error);
          });
      } else {
        fetch('/payment/intent')
          .then((response) => response.json())
          .then((data) => {
            const clientSecret = data.clientSecret;
            stripe.confirmCardPayment(clientSecret, {
              payment_method: {
                card: cardElement,
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
      }
    } catch (error) {
      document.querySelector('#error-message').textContent = 'Error al procesar el pago. Intenta nuevamente.';
    }
  });
});
