@extends('partials.layout')

@section('content')

    <div class="tarjeta__body">
        <div class="tarjeta__box">
            <div class="tarjeta__mdl">
                <div class="tarjeta__circles">
                    <div class="circle circle-1"></div>
                    <div class="circle circle-2"></div>
                </div>
                <div class="tarjeta__card">
                    <form action="{{ route('tarjetas.store') }}" method="POST" id="form">
                        @csrf
                        <div class="tarjeta__logo">
                            <xml version="1.0" encoding="UTF-8"?>
                                <svg width="48px" height="48px" viewBox="0 0 64 64" version="1.1">
                                    <title>Group</title>
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="Group" fill="#FFFFFF">
                                            <circle id="Oval" cx="16" cy="16" r="16"></circle>
                                            <circle id="Oval" cx="16" cy="48" r="16"></circle>
                                            <circle id="Oval" cx="48" cy="16" r="16"></circle>
                                            <circle id="Oval" cx="48" cy="48" r="16"></circle>
                                        </g>
                                    </g>
                                </svg>
                        </div>
                        <div class="tarjeta__card-number">
                            <label for="card_number">Número de tarjeta</label>
                            <div id="card-number"></div>
                            <span class="tarjeta__underline"></span>
                        </div>
                        <br>
                        <div class="tarjeta__group">
                            <div class="tarjeta__card-name">
                                <label for="full_name">Nombre</label>
                                <input id="full_name" name="full_name" placeholder="Juanita" type="text" required>
                                <span class="tarjeta__underline"></span>
                            </div>
                            <div class="tarjeta__expiration-date">
                                <label for="expiry_date">Fecha Exp</label>
                                <div id="card-Expiry"></div>
                                <span class="tarjeta__underline"></span>
                            </div>
                            <div class="tarjeta__ccv">
                                <label for="cvv">CVV</label>
                                <div id="card-Cvc"></div>
                                <span class="tarjeta__underline"></span>
                            </div>
                        </div>
                        <div id="error-message">
                            <!-- Display error message to your customers here -->
                        </div>
                        <!-- Botón de Guardar -->
                        <div class="tarjeta__save-button">
                            <button type="submit" id="tarjeta_save">Guardar</button>
                        </div>
                    </form>
                    @if (session('mensaje'))
                        <div class="alert alert-success">{{ session('mensaje') }}</div>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <div class="Save">
        <h2>Tus Trajetas Guardadas</h2>
        @if (isset($cards) && $cards->isNotEmpty())
            @foreach ($cards as $card)
                <div class="tarjeta__card">
                    <div class="tarjeta__logo">
                        <xml version="1.0" encoding="UTF-8"?>
                            <svg width="48px" height="48px" viewBox="0 0 64 64" version="1.1">
                                <title>Group</title>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Group" fill="#FFFFFF">
                                        <circle id="Oval" cx="16" cy="16" r="16"></circle>
                                        <circle id="Oval" cx="16" cy="48" r="16"></circle>
                                        <circle id="Oval" cx="48" cy="16" r="16"></circle>
                                        <circle id="Oval" cx="48" cy="48" r="16"></circle>
                                    </g>
                                </g>
                            </svg>
                    </div>
                    <div class="tarjeta__card-number">
                        <label for="card_number">Número de tarjeta</label>
                        <p>**** **** **** {{ $card->digits }} </p>
                    </div>
                    <br>
                    <div class="tarjeta__group">
                        <div class="tarjeta__card-name">
                            <label for="full_name">Nombre</label>
                            <p>{{ $card->name }}</p>
                        </div>
                        <div class="tarjeta__expiration-date">
                            <label for="expiry_date">Fecha Exp</label>
                            <p> {{ $card->expiry_date }} </p>
                        </div>
                        <div class="tarjeta__ccv">
                            <label for="cvv">Tipo</label>
                            <p class="brand"> {{ $card->brand }} </p>
                        </div>
                    </div>
                    <!-- Botón de Eliminar -->
                    <div class="tarjeta__save-button">
                        <form action="{{ route('tarjeta.eliminar', $card->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" id="tarjeta_save">Eliminar</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <p>No hay tarjetas</p>
        @endif
    </div>
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="text-center">
                <i class="fas fa-check-circle check-icon"></i>
                <p>¡Se guardó correctamente!</p>
            </div>
        </div>
    </div>
    
@section('scripts')
    <script>
        function formatCardNumber(input) {
            // Eliminar espacios y añadir espacios cada 4 dígitos
            let value = input.value.replace(/\s+/g, '');
            input.value = value.match(/.{1,4}/g)?.join(' ') || '';
        }

        function formatExpiryDate(input) {
            // Formatear la fecha en MM/YY y permitir borrar
            let value = input.value.replace(/\D/g, '');
            if (value.length > 2) {
                value = value.slice(0, 2) + '/' + value.slice(2);
            }
            input.value = value;
        }
     
        document.addEventListener('DOMContentLoaded', (event) => {
            // Código para el modal

            function abrirmodal() {
                document.querySelector('#tarjeta_save').addEventListener('click', function() {
                    const modal = document.getElementById('editModal');
                    modal.style.display = "block"; // Mostrar el modal
                    document.querySelector('.check-icon').classList.add('animate-check');
                });
           
            }            

            // Cerrar el modal
            document.querySelector('.close').addEventListener('click', function() {
                document.getElementById('tarjeta_save').style.display = "none";
                document.querySelector('.check-icon').classList.remove('animate-check');
            });

            // Cerrar el modal cuando se haga clic fuera de él
            window.onclick = function(event) {
                const modal = document.getElementById('tarjeta_save');
                if (event.target == modal) {
                    modal.style.display = "none";
                    document.querySelector('.check-icon').classList.remove('animate-check');
                }
            }

            document.getElementById('upload-photo').addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('profile-img').src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
        
    </script>
@endsection

@section('javaScript')
    @vite('resources/js/tarjeta.js')
    <script>
        const urlEnv = " {{ route('tarjetas.store') }} "
    </script>
@endsection

@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/tarjeta.css')
    <script src="https://js.stripe.com/v3/"></script>
@endsection
