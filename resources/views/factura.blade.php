@extends('partials.layout')

@section('content')
<div class="invoice-container">
    <header>
        <h1>FarmFusion</h1>
        <p>Directamente del campo a tu mesa</p>
        <div class="invoice-details">
            <p>Factura No: #00123</p>
            <p>Fecha: 06/09/2024</p>
        </div>
    </header>
    
    <section class="customer-details">
        <h2>Detalles del Cliente</h2>
        <p><strong>NIT:</strong> 15435864</p>
        <p><strong>Nombre:</strong> Juan Pérez</p>
        <p><strong>Dirección:</strong> Calle 123, Guarne</p>
        <p><strong>Teléfono:</strong> 321 654 9870</p>
        <p><strong>Correo:</strong> Juanp@gmail.com</p>
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
                <tr>
                    <td>Aguacates Orgánicos</td>
                    <td>5</td>
                    <td>$4,000</td>
                    <td>$20,000</td>
                </tr>
                <tr>
                    <td>Lechuga Fresca</td>
                    <td>3</td>
                    <td>$2,500</td>
                    <td>$7,500</td>
                </tr>
                <tr>
                    <td>Tomates Rojos</td>
                    <td>2</td>
                    <td>$3,000</td>
                    <td>$6,000</td>
                </tr>
            </tbody>
        </table>
    </section>

    <section class="totals">
        <p><strong>Subtotal:</strong> $33,500 COP</p>
        <p><strong>IVA (19%):</strong> $6,365 COP</p>
        <p><strong>Total:</strong> $39,865 COP</p>
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