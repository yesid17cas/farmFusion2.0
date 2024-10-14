@extends('partials.layout')

@section('content')
    <div class="containerCompras">
        <h1>Mis ordenes</h1>

        @if ($pedidos->isEmpty())
        <p>No tienes ninugna orden.</p>
        @else
        <table class="table">
            <thead>
                <tr>
                    <th>Orden ID</th>
                    <th>Total a pagar</th>
                    <th>Creado en</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedidos as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>${{ $order->pay }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>
                            <a href="{{ route('pedidos.show', $order->id) }}" class="btn btn-info btn-sm"><i class="fa-regular fa-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
@endsection

@section('style')
    @vite('resources/css/pedidos.css')
@endsection
