<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/login.css')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h1>Registrarse</h1>
                <span>Utiliza tu correo electrónico para registrarte</span>
                <input id="name" type="text" placeholder="Nombre" class="@error('name') is-invalid @enderror"
                    value="{{ old('name') }}" required autocomplete="name" />
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="email" placeholder="Email" id="email-register" @error('email') is-invalid @enderror
                    name="email" value="{{ old('email') }}" required autocomplete="email" />
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="password" placeholder="contraseña" id="password-register"
                    class="@error('password') is-invalid @enderror" name="password" required
                    autocomplete="new-password" />
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input id="password-confirm" type="password" placeholder="Confirmar Contraseña" name="password_confirmation" required autocomplete="new-password">
                <button>Regístrate</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <h1>Iniciar sesión</h1>
                <span>Usa tu cuenta</span>
                <input type="email" placeholder="Email" id="email"
                    class="@error('email') is-invalid @enderror"value="{{ old('email') }}" required
                    autocomplete="email" autofocus />
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="password" placeholder="contraseña" id="password"
                    class="@error('password') is-invalid @enderror" required autocomplete="current-password" />
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <a href="{{ route('recuperar') }}">Olvidaste tu contraseña?</a>
                <button type="submit">Iniciar sesión</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Bienvenidos a FarmFusion!</h1>
                    <p>¡Bienvenido a nuestro mercado en línea, donde la calidad de la tierra se encuentra con la
                        comodidad de tu pantalla! Estamos encantados de ofrecerte una experiencia de compra agrícola sin
                        igual.</p>
                    <button class="ghost" id="signIn">Iniciar Sesión</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Bienvenido a FarmFusion!</h1>

                    <button class="ghost" id="signUp">Registrarse</button>
                </div>
            </div>
        </div>
    </div>

    <footer>

    </footer>
    @vite('resources/js/script.js')
</body>

</html>