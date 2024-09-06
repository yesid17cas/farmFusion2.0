@extends('partials.layout')

@section('content')
<main>
    <div class="informacion">
        <img src="{{Vite::asset('resources/img/1.jpg')}}" alt="Producto" class="informacion__img" />
        <div class="informacion__datos">
            <b>
                Papa <br />
                $24.000
            </b>
            <p>
                Codigo del producto: 0002412 <br />
                <b> Descripción </b><br />
                Papa recien cultivada
            </p>
            <div class="botonesInfo">
                <button class="informacion__boton">
                    <a href="{{route('carrito')}}">Agregar a carrito</a>
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