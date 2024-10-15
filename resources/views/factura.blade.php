@extends('partials.layout')

@section('content')
    <div class="invoice-container">
        <header>
            <h1>FarmFusion</h1>
            <p>Directamente del campo a tu mesa</p>
            <div class="invoice-details">
                <p>Factura No: #{{ $output->id }} </p>
                <p>Fecha: {{ $output->created_at->format('d M Y') }} </p>
            </div>
        </header>

        <section class="customer-details">
            <h2>Detalles del Cliente</h2>
            <p><strong>N° Documento: </strong>{{ $output->user_DocId }} </p>
            <p><strong>Nombre:</strong> {{ $output->user->name }} {{ $output->user->lastname }} </p>
            <p><strong>Correo:</strong> {{ $output->user->email }} </p>
        </section>

        <section class="invoice-items">
            <h2>Productos</h2>
            <table>
                <thead>
                    <tr>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario (COP)</th>
                        <th>Total (COP)</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalcost = 0;
                    @endphp
                    @foreach ($output->productsoutput as $products)
                        <tr>
                            @php
                                $totalcost += $products->amount * $products->products->price; // Acumula el costo total
                            @endphp
                            <td>{{ $products->products->name }} </td>
                            <td>{{ $products->amount }} </td>
                            <td>${{ $products->products->price }}</td>
                            <td>${{ $products->products->price * $products->amount }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>

        <section class="totals">
            <p><strong>Subtotal:</strong> ${{$totalcost}} COP</p>
            <p><strong>Envio:</strong> ${{ $output->pay - $totalcost}} COP</p>
            <p><strong>Total:</strong> ${{$output->pay}} COP</p>
        </section>

        <footer>
            <p>Gracias por apoyar a los agricultores locales.</p>
            <p>FarmFusion - farmfusion8@gmail.com</p>
        </footer>
    </div>
@endsection

@section('style')
    @vite('resources/css/factura.css')
@endsection
