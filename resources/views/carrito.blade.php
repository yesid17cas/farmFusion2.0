@extends('partials.layout')

@section('content')
    <main class="cart">
        <div class="products">
            <div class="volver">
                <a href="catalogo.html">
                    <i class="fa-solid fa-arrow-left"></i> Continuar comprando
                </a>
            </div>
            <div class="items">
                <b>Carrito de compras</b>
                <p>Tienes # productos en tu carrito</p>
            </div>
            <div class="producto">
                <img src="{{ Vite::asset('resources/img/1.jpg') }}" alt="producto" />
                <div class="infoProduc">
                    <b>Papa</b>
                    <p>Papa fresca</p>
                </div>
                <p class="cantidad">2</p>
                <div class="precio">
                    <b>$24.000</b>
                    <i class="fa-regular fa-trash-can"></i>
                </div>
            </div>
        </div>
        <div class="pago">
            <b>Forma de pago</b>

            <form id="payment-form" method="POST" action="{{ route('payment.process') }}">
                @csrf

                <!-- Seleccionar tarjeta guardada -->
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <label for="saved-cards">Usar una tarjeta guardada:</label>
                    @php
                        $cards = $cards ?? collect(); // Asegura que $cards sea una colección vacía si no se define
                    @endphp
                    <select name="saved_card" id="saved-cards" class="form-control">
                        <option value="">Selecciona una tarjeta</option>
                        @foreach ($cards as $card)
                            <option value="{{ $card->stripe_token }}">
                                {{ $card->brand }} **** {{ $card->last_four }} (Exp:
                                {{ $card->expiry_date->format('m/Y') }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <p>- O -</p>

                <!-- Stripe Elements para nueva tarjeta -->
                
                    <div id="card-element">
                      <!-- Elements will create form elements here -->
                    </div>
                    <div id="error-message">
                      <!-- Display error message to your customers here -->
                    </div>

                <div class="infoPrecio">
                    <div>
                        <p>Subtotal</p>
                        <p>Envío</p>
                        <p>Total</p>
                    </div>
                    <div>
                        <p>$30000</p>
                        <p>$20</p>
                        <p>$3020</p>
                    </div>
                </div>
                <button class="botonPago" type="submit" id="submit">
                    <p>3020</p>
                    <p>Comprar <i class="fa-solid fa-arrow-right"></i></p>
                </button>
            </form>
        </div>
    </main>
@endsection

@section('style')
    @vite('resources/css/carrito.css')
@endsection

@section('javaScript')
    @vite('resources/js/payment.js')
    <script src="https://js.stripe.com/v3/"></script>
@endsection
