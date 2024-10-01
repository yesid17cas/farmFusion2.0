<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{Vite::asset('resources/img/Logo-2.0.ico')}}" rel="icon" />
    @vite('resources/css/login.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>FarmFusion</title>
</head>

<body>

    <div class="container" id="container">
        <a href="{{ route('home') }}" class="btn-back"><i class="fa-solid fa-chevron-left"></i>Regresar</a>
        <div class="form-container sign-up-container">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h1>Registrarse</h1>
                <span>Utiliza tu correo electrónico para registrarte</span>
                {{-- Campo DocId --}}
                <input id="DocId" name="DocId" type="number" placeholder="Numero Documento"
                    class="@error('DocId') is-invalid @enderror" value="{{ old('DocId') }}" required
                    autocomplete="DocId" />
                @error('DocId')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                {{-- Campo nombre --}}
                <input id="name" name="name" type="text" placeholder="Nombre"
                    class="@error('name') is-invalid @enderror" value="{{ old('name') }}" required
                    autocomplete="name" />
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                {{-- Campo apellido --}}
                <input id="lastname" name="lastname" type="text" placeholder="Apellidos"
                    class="@error('lastname') is-invalid @enderror" value="{{ old('lastname') }}" required
                    autocomplete="lastname" />
                @error('lastname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
                {{-- Campo Email --}}
                <input type="email" placeholder="Email" id="email-register" @error('email') is-invalid @enderror
                    name="email" value="{{ old('email') }}" required autocomplete="email" />
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                {{-- Campo contraseña --}}
                <input type="password" placeholder="contraseña" id="password-register"
                    class="@error('password') is-invalid @enderror" name="password" required
                    autocomplete="new-password" />
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input id="password-confirm" type="password" placeholder="Confirmar Contraseña"
                    name="password_confirmation" required autocomplete="new-password">
                <button>Regístrate</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <h1>Iniciar sesión</h1>
                <span>Usa tu cuenta</span>
                <input type="email" name="email" placeholder="Email" id="email"
                    class="@error('email') is-invalid @enderror"value="{{ old('email') }}" required
                    autocomplete="email" autofocus />
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="password" name="password" placeholder="contraseña" id="password"
                    class="@error('password') is-invalid @enderror" required autocomplete="current-password" />
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <a href="{{ route('password.request') }}">Olvidaste tu contraseña?</a>
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
