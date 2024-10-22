<div>
    {{-- Formulario solo lectura --}}
    <form action="" class="lectura {{ $lectura ? '' : 'hidden' }}">
        <div class="col-md-4 text-center">
            <div class="profile-section position-relative">
                @if ($image)
                    <!-- Vista previa de la imagen seleccionada -->
                    <img id="profile-img" class="profile-img" src="{{ $image->temporaryUrl() }}" alt="Foto de perfil" />
                @else
                    <!-- Imagen actual o imagen por defecto -->
                    <img id="profile-img" class="profile-img"
                        src="{{ $datos->image ? asset('storage/images/' . $datos->image) : Vite::asset('resources/img/Agricultora.jpg') }}"
                        alt="Foto de perfil" />
                @endif
            </div>
            <br>
        </div>
        <br>
        <div class="col-md-8">
            <div class="p-3 py-5">
                <h4 class="text-center">Mis Datos</h4><br>
                <div class="rowDatos mt-3">
                    <div class="col-md-6">
                        <label class="labels">Nombre</label><br>
                        <label class="info">{{ $datos->name }}</label>
                    </div><br>
                    <div class="col-md-6">
                        <label class="labels">Apellido</label><br>
                        <label for="" class="info">{{ $datos->lastname }}</label>
                    </div>
                </div><br>
                <div class="col-md-6">
                    <label class="labels">Correo</label><br>
                    <label for="" class="info">{{ $datos->email }}</label>
                </div><br>
            </div>
        </div>
        <button class="btn btn-primary profile-button" type="button" wire:click="toggleForm">Editar</button>
    </form>

    <form wire:submit.prevent='editar' class="editar {{ $formVisible ? '' : 'hidden' }}">
        <div class="col-md-4 text-center">
            <div class="profile-section position-relative">
                @if ($image)
                    <!-- Vista previa de la imagen seleccionada -->
                    <img id="profile-img" class="profile-img" src="{{ $image->temporaryUrl() }}" alt="Foto de perfil" />
                @else
                    <!-- Imagen actual o imagen por defecto -->
                    <img id="profile-img" class="profile-img"
                        src="{{ $datos->image ? asset('storage/images/' . $datos->image) : Vite::asset('resources/img/Agricultora.jpg') }}"
                        alt="Foto de perfil" />
                @endif
                <input type="file" id="upload-photo" class="form-controlDatos-file" accept="image/*"
                    style="display: none;" wire:model='image'>
                <label for="upload-photo" class="edit-icon">
                    <i class="fas fa-pencil-alt"></i>
                </label>
            </div>
            <br>
        </div>
        <br>
        <div class="col-md-8">
            <div class="p-3 py-5">
                <h4 class="text-center">Mis Datos</h4><br>
                <div class="rowDatos mt-3">
                    <div class="col-md-6">
                        <label class="labels">Nombre</label><br>
                        <input type="text" class="form-controlDatos" placeholder="Nombre" wire:model='name'>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div><br>
                    <div class="col-md-6">
                        <label class="labels">Apellido</label><br>
                        <input type="text" class="form-controlDatos" placeholder="Apellido" wire:model='lastname'>
                        @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div><br>
                <div class="col-md-6">
                    <label class="labels">Correo</label><br>
                    <input type="email" class="form-controlDatos" placeholder="Correo" wire:model='email'>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div><br>
                <div class="mt-5 text-center">
                    <button class="btn btn-primary profile-button edit-btn" type="submit">Guardar datos</button>
                </div><br>
            </div>
        </div>
    </form>
</div>
