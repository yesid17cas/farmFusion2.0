@extends('partials.layout')

@section('content')
<div class="containerCatalogo">

    <h3 class="title"> Vegetales y Verduras Frescas </h3>

    <div class="products-container">
        
        <!-- Primer Producto (posición 1 del array) -->
        @if(isset($productos[0]))
            <a href="InfoProduc.html">
                <div class="product" data-name="p-1">
                    <img src="{{ asset('img/1.jpg') }}" alt="">
                    <h3>{{ $productos[0]->nombre }}</h3>
                    <div class="price">${{ number_format($productos[0]->precio, 0, ',', '.') }}</div>
                </div>
            </a>
        @endif

        <!-- Segundo Producto (posición 2 del array) -->
        @if(isset($productos[1]))
            <div class="product" data-name="p-2">
                <img src="{{ asset('img/2.jpg') }}" alt="">
                <h3>{{ $productos[1]->nombre }}</h3>
                <div class="price">${{ number_format($productos[1]->precio, 0, ',', '.') }}</div>
            </div>
        @endif

        <!-- Tercer Producto (posición 3 del array) -->
        @if(isset($productos[2]))
            <div class="product" data-name="p-3">
                <img src="{{ asset('img/3.jpg') }}" alt="">
                <h3>{{ $productos[2]->nombre }}</h3>
                <div class="price">${{ number_format($productos[2]->precio, 0, ',', '.') }}</div>
            </div>
        @endif

        <!-- Cuarto Producto (posición 4 del array) -->
        @if(isset($productos[3]))
            <div class="product" data-name="p-4">
                <img src="{{ asset('img/4.jpg') }}" alt="">
                <h3>{{ $productos[3]->nombre }}</h3>
                <div class="price">${{ number_format($productos[3]->precio, 0, ',', '.') }}</div>
            </div>
        @endif

        <!-- Quinto Producto (posición 5 del array) -->
        @if(isset($productos[4]))
            <div class="product" data-name="p-5">
                <img src="{{ asset('img/5.jpg') }}" alt="">
                <h3>{{ $productos[4]->nombre }}</h3>
                <div class="price">${{ number_format($productos[4]->precio, 0, ',', '.') }}</div>
            </div>
        @endif

    </div>

</div>
@endsection

@section('style')
<link rel="stylesheet" href="{{ asset('css/catalogo.css') }}">
@endsection
