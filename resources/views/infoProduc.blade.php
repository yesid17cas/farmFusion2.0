@extends('partials.layout')

@section('content')
<main>
    <div class="informacion">
        <img src="images/1.png" alt="Producto" class="informacion__img" />
        <div class="informacion__datos">
            <b>
                Fresas <br />
                $5.000
            </b>
            <p>
                Codigo del producto: 0002412 <br />
                <b> Descripción </b><br />
                Fresas 100% Colombianas
            </p>
            <div class="botonesInfo">
                <button class="informacion__boton">
                    <a href="carrito.html">Agregar a carrito</a>
                </button>
                <button class="informacion__boton"><a href="#">Comprar</a></button>
            </div>
        </div>
    </div>
</main>
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/infoProduc.css')}}">
@endsection