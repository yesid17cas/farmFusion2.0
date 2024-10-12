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
            <p>Existencias: {{$producto->exits}} </p>
            <p>
                <!--descripción del producto -->
                
                <b> Descripción </b><br />
                {{ $producto->descrition }}
            </p>
            <div class="botonesInfo">
                <form action="{{ route('carrito.agregar', ['id' => $producto->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="informacion__boton-agregar">Agregar a carrito</button>
                </form>
                <button class="informacion__boton"><a href="#">Comprar</a></button>
            </div>
        </div>
    </div>
</main>
@endsection

@section('style')
@vite('resources/css/infoProduc.css')
@endsection
