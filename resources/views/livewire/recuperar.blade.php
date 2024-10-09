<div>
    <div class="form-container sign-in-container">
        <form method="POST" wire:submit='resetPassword'>
            @csrf

            <input type="hidden" wire:model="token" value="{{ $token }}">

            <label for="email">Correo electronico</label>
            <input id="email" type="email" class=" @error('email') is-invalid @enderror" wire:model="email"
                value="{{ $email ?? old('email') }}" required autocomplete="email" disabled>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <label for="password">Nueva contraseña</label>

            <input id="password" type="password" class="@error('password') is-invalid @enderror" wire:model="password"
                required autocomplete="new-password" autofocus>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="password-confirm">Confirmar contraseña</label>

            <input id="password-confirm" type="password" wire:model="password_confirmation" required
                autocomplete="new-password">
            <button type="submit">
                Restablecer
            </button>

        </form>
    </div>
</div>
