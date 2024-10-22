@extends('partials.layout')

@section('content')
    <div class="containerCompras">
        <h1>Mis Ventas</h1>

        @if ($vendidos->isEmpty())
            <p>No has vendido ningún producto todavía.</p>
        @else
            <ul>

                @foreach ($vendidos as $producto)
                    @php
                        $totalAmount = 0;
                        foreach ($producto->productsoutput as $output) {
                            $totalAmount += $output->amount;
                        }
                    @endphp
                    <li>{{ $producto->name }} - Se han hecho {{ $totalAmount }} ventas</li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection

@section('style')
    @vite('resources/css/pedidos.css')
@endsection
