@extends('partials.layout')

@section('content')
<div class="containerCatalogo">

    <h3 class="title">Vegetales y Verduras Frescas</h3>

    <div class="products-container">
        
        <!-- Primer Producto (posición 1 del array) -->
        @if(isset($productos[0]))
            <a href="{{route('info')}}">
                <div class="product" data-name="p-1">
                    <img src="{{ Vite::asset('resources/img/1.jpg') }}" alt="">
                    <h3>{{ $productos[0]->name }}</h3>
                    <div class="price">${{ number_format($productos[0]->price, 0, ',', '.') }}</div>
                </div>
            </a>
        @endif

        <!-- Segundo Producto (posición 2 del array) -->
        @if(isset($productos[1]))
            <div class="product" data-name="p-2">
                <img src="{{ Vite::asset('resources/img/2.jpg') }}" alt="">
                <h3>{{ $productos[1]->name }}</h3>
                <div class="price">${{ number_format($productos[1]->price, 0, ',', '.') }}</div>
            </div>
        @endif

        <!-- Tercer Producto (posición 3 del array) -->
        @if(isset($productos[2]))
            <div class="product" data-name="p-3">
                <img src="{{ Vite::asset('resources/img/nose') }}" alt="">
                <h3>{{ $productos[2]->name }}</h3>
                <div class="price">${{ number_format($productos[2]->price, 0, ',', '.') }}</div>
            </div>
        @endif

        <!-- Cuarto Producto (posición 4 del array) -->
        @if(isset($productos[3]))
            <div class="product" data-name="p-4">
                <img src="{{ Vite::asset('resources/img/nose') }}" alt="">
                <h3>{{ $productos[3]->name }}</h3>
                <div class="price">${{ number_format($productos[3]->price, 0, ',', '.') }}</div>
            </div>
        @endif

        <!-- Quinto Producto (posición 5 del array) -->
        @if(isset($productos[4]))
            <div class="product" data-name="p-5">
                <img src="{{ Vite::asset('resources/img/nose') }}" alt="">
                <h3>{{ $productos[4]->name }}</h3>
                <div class="price">${{ number_format($productos[4]->price, 0, ',', '.') }}</div>
            </div>
        @endif

    </div>

    <!-- Botón de agregar producto -->
    <div class="button-container">
        <a href="{{ route('products.create') }}" class="add-product-btn"><i class="fa-solid fa-circle-plus"></i></a>
    </div>

</div>
@endsection

@section('style')
@vite('resources/css/catalogo.css')
@endsection
