@extends('partials.layout')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="tarjeta__body">
    <div class="tarjeta__box">
        <div class="tarjeta__mdl">
            <div class="tarjeta__circles">
                <div class="circle circle-1"></div>
                <div class="circle circle-2"></div>
            </div>
            <div class="tarjeta__card">
                <form>
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
                        <label>Número de tarjeta</label>
                        <input id="tarjeta__card-number" placeholder="1234 1234 1234 1234" type="text" required
                            maxlength="19">
                        <span class="tarjeta__underline"></span>
                    </div>
                    <br>
                    <div class="tarjeta__group">
                        <div class="tarjeta__card-name">
                            <label>Nombre</label>
                            <input id="tarjeta__card-name" placeholder="Juanita" type="text" required>
                            <span class="tarjeta__underline"></span>
                        </div>
                        <div class="tarjeta__expiration-date">
                            <label>Fecha exp</label>
                            <input id="tarjeta__card-exp" placeholder="10/25" type="text" maxlength="5" required>
                            <span class="tarjeta__underline"></span>
                        </div>
                        <div class="tarjeta__ccv">
                            <label>CVV</label>
                            <input id="tarjeta__card-ccv" placeholder="123" type="text" maxlength="3" required>
                            <span class="tarjeta__underline"></span>
                        </div>
                    </div>
                    <!-- Botón de Guardar -->
                    <div class="tarjeta__save-button">
                        <button type="submit">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- <script src="./js/script.js"></script> -->
@endsection


@section('style')
<link rel="stylesheet" href="{{asset('css/tarjeta.css')}}">
@endsection