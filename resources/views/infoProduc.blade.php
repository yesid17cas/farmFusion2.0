@extends('partials.layout')

@section('content')
<main>
    <div class="informacion">
        <!-- Usamos la imagen dinámica del producto -->
        <img src="{{ asset('images/' . $producto->image) }}" alt="{{ $producto->name }}" class="informacion__img" />
        <div class="informacion__datos">
            <b>
                <!-- Nombre y precio del producto dinámico -->
                {{ $producto->name }} <br />
                ${{ number_format($producto->price, 0, ',', '.') }}
            </b>
            <p>
                <!--descripción del producto -->
                
                <b> Descripción </b><br />
                {{ $producto->descrition }}
            </p>
            <div class="botonesInfo">
                <button class="informacion__boton">
                    <a href="{{ route('carrito') }}">Agregar a carrito</a>
                </button>
                <button class="informacion__boton"><a href="#">Comprar</a></button>
            </div>
        </div>
    </div>
</main>
@endsection

@section('style')
@vite('resources/css/infoProduc.css')
@endsection
