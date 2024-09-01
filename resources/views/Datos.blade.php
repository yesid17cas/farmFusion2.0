@extends('partials.layout')

@section('content')
    <div class="containerDatos mt-5">
        <div class="rowDatos d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card p-4">
                    <div class="rowDatos">
                        <div class="col-md-4 text-center">
                            <div class="profile-section">
                                <img id="profile-img" class="profile-img"
                                    src="{{ Vite::assets('resources/img/Agricultora.jpg') }}" alt="Foto de perfil" />
                                <div class="mt-3">
                                    <input type="file" id="upload-photo" class="form-controlDatos-file" accept="image/*">
                                </div>
                            </div>
                            <br>
                            <div class="mt-3">
                                <span class="font-weight-bold">ValM_33</span><br><br>
                                <span class="text-black-50">ValeryM@gmail.com</span>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-8">
                            <div class="p-3 py-5">
                                <h4 class="text-center">Configurar Mis Datos</h4><br>
                                <div class="rowDatos mt-3">
                                    <div class="col-md-6">
                                        <label class="labels">Nombre</label>
                                        <input type="text" class="form-controlDatos" placeholder="Valery" value="">
                                    </div><br>
                                    <div class="col-md-6">
                                        <label class="labels">Apellido</label>
                                        <input type="text" class="form-controlDatos" placeholder="Montoya"
                                            value="">
                                    </div>
                                </div><br>
                                <div class="rowDatos mt-3">
                                    <div class="col-md-12">
                                        <label class="labels">Teléfono</label>
                                        <input type="tel" class="form-controlDatos" placeholder="3156897236"
                                            value="">
                                    </div><br>
                                    <div class="col-md-6">
                                        <label class="labels">Correo</label>
                                        <input type="email" class="form-controlDatos" placeholder="ValeryM@gmail.com"
                                            value="">
                                    </div><br>
                                    <div class="col-md-12">
                                        <label class="labels">Dirección</label>
                                        <input type="text" class="form-controlDatos" placeholder="Cra 56 # 26-16"
                                            value="">
                                    </div><br>
                                    <div class="col-md-6">
                                        <label class="labels">Municipio</label>
                                        <input type="text" class="form-controlDatos" placeholder="Guarne" value="">
                                    </div><br>
                                    <div class="col-md-6">
                                        <label class="labels">Usuario</label>
                                        <input type="text" class="form-controlDatos" placeholder="ValM_33"
                                            value="">
                                    </div><br>
                                    <div class="mt-5 text-center">
                                        <button class="btn btn-primary profile-button" type="button">Guardar
                                            Cambios</button>
                                    </div><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('upload-photo').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profile-img').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection

@section('style')
    @vite('resources/css/catalogo.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
@endsection
