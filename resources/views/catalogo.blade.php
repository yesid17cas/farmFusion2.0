@extends('partials.layout')

@section('content')
    <div class="containerCatalogo">
        <h3 class="title">Vegetales y Verduras Frescas</h3>
        <form method="GET" action="{{ route('catalogo') }}">
            <select name="unidad" onchange="this.form.submit()">
                <option disabled selected>Selecciona una unidad de medida</option>
                <option value="">Todos</option>
                <option value="kilos">Kilogramos</option>
                <option value="unidad">Unidad</option>
                <option value="libra">Libra</option>
                <option value="gramos">Gramos</option>
                <!-- Agrega más opciones según tus unidades de medida -->
            </select>
        </form>

        <div class="products-container">
            <!-- Mostrar todos los productos -->
            @if ($productos->isEmpty())
                <p>No hay productos vendidos por {{$unidad}}</p>
            @else
                @foreach ($productos as $producto)
                    <a href="{{ route('products.show', $producto->id) }}">
                        <div class="product" data-name="p-{{ $producto->id }}">
                            <img src="{{ asset('images/' . $producto->image) }}" alt="{{ $producto->name }}">
                            <h3>{{ $producto->name }}</h3>
                            <div class="price">${{ number_format($producto->price, 0, ',', '.') }}</div>
                        </div>
                    </a>
                @endforeach
            @endif

        </div>

    </div>
@endsection

@section('style')
    @vite('resources/css/catalogo.css')
@endsection
