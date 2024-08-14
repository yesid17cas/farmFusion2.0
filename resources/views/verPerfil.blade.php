@extends('partials.layout')

@section('content')
<div class="containerPerfil mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            <div class="card p-4">
                <div class="text-center">
                    <img
                        src="/img/Agricultora.jpg"
                        alt="Foto de perfil"
                        class="profile-img" />
                </div>
                <div class="text-center mt-3">
                    <h5 class="mt-2 mb-0">Valery Montoya</h5>
                    <span class="Rol">Agricultor(a)</span>
                    <div class="px-4 mt-2">
                        <p class="description">
                            🌾 Hola, soy una agricultora apasionada del hermoso campo
                            colombiano. Desde pequeña, he estado inmersa en la
                            agricultura, cultivando con amor y dedicación los frutos que
                            alimentan a mi comunidad. Mi finca es un reflejo de mi
                            esfuerzo y compromiso con la tierra, donde cultivo desde
                            frutas y verduras frescas hasta hierbas aromáticas que
                            enriquecen la cocina local.
                        </p>
                    </div>
                    <div class="buttons mt-3">
                        <a href="#" class="btn btn-primary"><i class="fa-solid fa-user"></i> Mis datos</a>
                        <a href="#" class="btn btn-primary"><i class="fa-solid fa-shield-alt"></i> Seguridad</a>
                        <a href="#" class="btn btn-primary"><i class="fa-solid fa-credit-card"></i> Tarjetas</a>
                        <a href="#" class="btn btn-primary"><i class="fa-solid fa-map-marker-alt"></i> Direcciones</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/perfil.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
@endsection