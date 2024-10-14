@extends('partials.layout')

@section('content')
    <div class="containerDatos mt-5">
        <div class="rowDatos d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card p-4">
                    <div class="rowDatos">
                        <div class="col-md-4 text-center">
                            <div class="profile-section position-relative" onclick="document.getElementById('upload-photo').click();">
                                <img id="profile-img" class="profile-img"
                                    src="{{ Vite::asset('resources/img/Agricultora.jpg') }}" alt="Foto de perfil" />
                                <input type="file" id="upload-photo" class="form-controlDatos-file" accept="image/*" style="display: none;">
                                <label for="upload-photo" class="edit-icon">
                                    <i class="fas fa-pencil-alt"></i>
                                </label>
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
                                        <input type="text" class="form-controlDatos" placeholder="Montoya" value="">
                                    </div>
                                </div><br>
                                <div class="rowDatos mt-3">
                                    <div class="col-md-12">
                                        <label class="labels">Teléfono</label>
                                        <input type="tel" class="form-controlDatos" placeholder="3156897236" value="">
                                    </div><br>
                                    <div class="col-md-6">
                                        <label class="labels">Correo</label>
                                        <input type="email" class="form-controlDatos" placeholder="ValeryM@gmail.com" value="">
                                    </div><br>
                                    <div class="col-md-12">
                                        <label class="labels">Dirección</label>
                                        <input type="text" class="form-controlDatos" placeholder="Cra 56 # 26-16" value="">
                                    </div><br>
                                    <div class="col-md-6">
                                        <label class="labels">Municipio</label>
                                        <input type="text" class="form-controlDatos" placeholder="Guarne" value="">
                                    </div><br>
                                    <div class="col-md-6">
                                        <label class="labels">Usuario</label>
                                        <input type="text" class="form-controlDatos" placeholder="ValM_33" value="">
                                    </div><br>
                                    <div class="mt-5 text-center">
                                        <button class="btn btn-primary profile-button edit-btn" type="button">Guardar Cambios</button>
                                    </div><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="text-center">
                <i class="fas fa-check-circle check-icon"></i>
                <p>¡Se guardó correctamente!</p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            // Código para el modal
            document.querySelectorAll('.edit-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const modal = document.getElementById('editModal');
                    modal.style.display = "block"; // Mostrar el modal
                    document.querySelector('.check-icon').classList.add('animate-check');
                });
            });

            // Cerrar el modal
            document.querySelector('.close').addEventListener('click', function() {
                document.getElementById('editModal').style.display = "none";
                document.querySelector('.check-icon').classList.remove('animate-check');
            });

            // Cerrar el modal cuando se haga clic fuera de él
            window.onclick = function(event) {
                const modal = document.getElementById('editModal');
                if (event.target == modal) {
                    modal.style.display = "none";
                    document.querySelector('.check-icon').classList.remove('animate-check');
                }
            }

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
        });
    </script>
@endsection

@section('style')
    @vite('resources/css/datos.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
@endsection
