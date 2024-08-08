@extends('partials.layout')

@section('content')
<div class="containerCatalogo">

    <h3 class="title"> vegetales y verduras frescas </h3>

    <div class="products-container">
        <a href="InfoProduc.html">
            <div class="product" data-name="p-1">
                <img src="{{asset('img/1.png')}}" alt="">
                <h3>Fresas</h3>
                <div class="price">$5.000</div>
            </div>
        </a>

        <div class="product" data-name="p-2">
            <img src="{{asset('img/2.png')}}" alt="">
            <h3>Cebollas</h3>
            <div class="price">$4.000</div>
        </div>

        <div class="product" data-name="p-3">
            <img src="{{asset('img/3.png')}}" alt="">
            <h3>Tomates</h3>
            <div class="price">$2.00</div>
        </div>

        <div class="product" data-name="p-4">
            <img src="{{asset('img/4.png')}}" alt="">
            <h3>Berenjenas</h3>
            <div class="price">$2.00</div>
        </div>

        <div class="product" data-name="p-5">
            <img src="{{asset('img/5.png')}}" alt="">
            <h3>Brócoli</h3>
            <div class="price">$6.000</div>
        </div>

        <div class="product" data-name="p-6">
            <img src="{{asset('img/6.png')}}" alt="">
            <h3>Papa capira </h3>
            <div class="price">$2.000</div>
        </div>

    </div>

</div>
@endsection


@section('style')
<link rel="stylesheet" href="{{asset('css/catalogo.css')}}">
@endsection