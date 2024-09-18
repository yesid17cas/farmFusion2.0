@extends('partials.layout')

@section('content')
<div class="containerCatalogo">
    <h3 class="title">Vegetales y Verduras Frescas</h3>

    <div class="products-container">
        <!-- Mostrar todos los productos -->
        @foreach($productos as $producto)
            <a href="{{ route('info', ['id' => $producto->id]) }}">
                <div class="product" data-name="p-{{ $producto->id }}">
                    <img src="{{ Vite::asset('resources/img/' . $producto->image) }}" alt="">
                    <h3>{{ $producto->name }}</h3>
                    <div class="price">${{ number_format($producto->price, 0, ',', '.') }}</div>
                </div>
            </a>
        @endforeach
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
