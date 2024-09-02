@extends('partials.layout') <!-- Asegúrate de que esta vista base está configurada correctamente -->

@section('content')
<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <div class="containerForm">
        <div class="row input-container">
            <div class="col-xs-12">
                <div class="styled-input wide">
                    <input type="text" name="name" required />
                    <label>Nombre del producto</label> 
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="styled-input">
                    <input type="text" id="price" name="price" required />
                    <label>Precio (COP)</label> 
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="styled-input" style="float:right;">
                    <input type="number" id="exits" name="exits" required min="0" step="1" />
                    <label>Existencias</label> 
                </div>
            </div>
            <div class="col-xs-12">
                <div class="styled-input wide">
                    <textarea name="descrition" required></textarea>
                    <label>Descripción</label>
                </div>
            </div>
            <div class="col-xs-12">
                <button type="submit" class="btn-lrg submit-btn">Cargar producto</button>
            </div>
        </div>
    </div>
</form>
@endsection

@section('style')
    @vite('resources/css/formProduc.css')
@endsection
