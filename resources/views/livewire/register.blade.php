<div class="form-container sign-up-container">
    <form wire:submit="createUser">
        <h1>Registrarse</h1>
        <span>Utiliza tu correo electrónico para registrarte</span>
        {{-- Campo DocId --}}
        <input id="DocId" wire:model="DocId" type="number" placeholder="Numero Documento" value="{{ old('DocId') }}"
            required autocomplete="DocId" />
        @error('DocId')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        {{-- Campo nombre --}}
        <input id="name" wire:model="name" type="text" placeholder="Nombre" value="{{ old('name') }}" required
            autocomplete="name" />
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        {{-- Campo apellido --}}
        <input id="lastname" wire:model="lastname" type="text" placeholder="Apellidos" value="{{ old('lastname') }}"
            required autocomplete="lastname" />
        @error('lastname')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        {{-- Campo Email --}}
        <input type="email" placeholder="Email" id="email-register" wire:model="email" value="{{ old('email') }}"
            required autocomplete="email" />
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        {{-- Campo contraseña --}}
        <input type="password" placeholder="contraseña" id="password-register" wire:model="password" required
            autocomplete="new-password" />
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <input id="password-confirm" type="password" placeholder="Confirmar Contraseña"
            wire:model="password_confirmation" required autocomplete="new-password">
        <button type="submit">Regístrate</button>
    </form>
</div>
