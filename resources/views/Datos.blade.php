@extends('partials.layout')

@section('content')
    <div class="containerDatos mt-5">
        <div class="rowDatos d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card p-4">
                    <div class="rowDatos">

                        {{-- Formulario editar --}}
                        @livewire('informacion')
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
    @livewireStyles
@endsection

@section('javascript')
    @livewireScripts
@endsection
