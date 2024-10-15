@extends('partials.layout')

@section('content')
    <main class="cart">
        <div class="products">
            <div class="volver">
                <a href="{{ route('catalogo') }}">
                    <i class="fa-solid fa-arrow-left"></i> Continuar comprando
                </a>
            </div>
            <div class="items">
                <b>Carrito de compras</b> <br> <br>
                <p>Tienes {{ count($carrito) }} productos en tu carrito</p>
            </div>

            @foreach ($carrito as $id => $producto)
                <div class="producto">
                    <img src="{{ asset('images/' . $producto['imagen']) }}" alt="{{ $producto['nombre'] }}" />
                    <!-- Cambia 'image' a 'imagen' -->
                    <div class="infoProduc">
                        <b>{{ $producto['nombre'] }}</b> <!-- Cambia 'name' a 'nombre' -->
                        {{-- <p>{{ $producto['nombre'] }}</p> --}}
                    </div>
                    <!-- Control de cantidad con flechas -->
                    <div class="cantidad-control">
                        <!-- Botón para aumentar cantidad -->
                        <form method="POST" action="{{ route('carrito.actualizar', $id) }}">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="accion" value="aumentar">
                            <button type="submit" class="btn-cantidad">
                                <i class="fa-solid fa-chevron-up flecha_arriba"></i> <!-- Flecha hacia arriba -->
                            </button>
                        </form>


                        <p class="cantidad">{{ $producto['cantidad'] }}</p>

                        <!-- Botón para disminuir cantidad -->
                        <form method="POST" action="{{ route('carrito.actualizar', $id) }}">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="accion" value="disminuir">
                            <button type="submit" class="btn-cantidad">
                                <i class="fa-solid fa-chevron-down flecha_abajo"></i><!-- Flecha hacia abajo -->
                            </button>
                        </form>

                    </div>
                    <div class="precio">
                        <b>${{ number_format($producto['precio'] * $producto['cantidad'], 0, ',', '.') }}</b>
                        <!-- Cambia 'price' a 'precio' -->
                        <form method="POST" action="{{ route('carrito.eliminar', $id) }}">
                            @csrf
                            <button type="submit">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                        </form>

                    </div>
                </div>
            @endforeach
        


        </div>

        <div class="pago">
            <b>Forma de pago</b>

            <form id="payment-form" method="POST" action="{{ route('payment.process') }}">
                @csrf

                <!-- Seleccionar tarjeta guardada -->
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <label for="saved-cards">Usar una tarjeta guardada:</label>
                    <select name="saved_card" id="saved-cards" class="form-control">
                        <option value="" disabled selected>Selecciona una tarjeta</option>
                        @if (isset($cards) && $cards->isNotEmpty())
                            @foreach ($cards as $card)
                                <option value="{{ $card->token }}">
                                    {{ $card->name }}
                                    {{ $card->brand }} **** {{ $card->digits }} (Exp:
                                    {{ $card->expiry_date }})
                                </option>
                            @endforeach
                        @endif
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
                        <p>${{ number_format($subtotal, 0, ',', '.') }}</p> <!-- Muestra el subtotal -->
                        <p>${{ number_format($envio, 0, ',', '.') }}</p> <!-- Muestra el costo de envío -->
                        <p>${{ number_format($total, 0, ',', '.') }}</p> <!-- Muestra el total -->
                    </div>
                </div>
                <button class="botonPago" type="submit">
                    <p>${{ number_format($total, 0, ',', '.') }}</p>
                    <p>Comprar <i class="fa-solid fa-arrow-right"></i></p>
                </button>
            </form>
        </div>
    </main>
@endsection

@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/carrito.css')
@endsection

@section('javaScript')
    @vite('resources/js/payment.js')
    <script src="https://js.stripe.com/v3/"></script>
@endsection
