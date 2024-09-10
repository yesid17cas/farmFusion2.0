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
                <form action="{{ route('tarjetas.store') }}" method="POST">
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
                        <input id="card_number" name="card_number" placeholder="1234 1234 1234 1234" type="text" required maxlength="19" oninput="formatCardNumber(this)">
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
                            <input id="expiry_date" name="expiry_date" type="text" maxlength="5" required oninput="formatExpiryDate(this)">
                            <span class="tarjeta__underline"></span>
                        </div>
                        <div class="tarjeta__ccv">
                            <label for="cvv">CVV</label>
                            <input id="cvv" name="cvv" placeholder="123" type="text" maxlength="3" required>
                            <span class="tarjeta__underline"></span>
                        </div>
                    </div>
                    <!-- Botón de Guardar -->
                    <div class="tarjeta__save-button">
                        <button type="submit" id="tarjeta_save" onclick="alert('tarjeta guardada correctamente')">Guardar</button>
                    </div>
                </form>
            </div>
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
</script>
@endsection

@endsection

@section('style')
@vite('resources/css/tarjeta.css')
@endsection
