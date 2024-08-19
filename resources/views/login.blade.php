<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/login.css')}}"">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
  
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="#">
			<h1>Registrarse</h1>
			<span>Utiliza tu correo electrónico para registrarte</span>
			<input type="text" placeholder="Nombre" />
			<input type="email" placeholder="Email" />
			<input type="password" placeholder="contraseña" />
			<button>Regístrate</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="#">
			<h1>Iniciar sesión</h1>
			<span>Usa tu cuenta</span>
			<input type="email" placeholder="Email" />
			<input type="password" placeholder="contraseña" />
			<a href="{{route('recuperar')}}">Olvidaste tu contraseña?</a>
			<button><a href="inicio.html">Iniciar sesión</a></button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Bienvenidos a FarmFusion!</h1>
				<p>¡Bienvenido a nuestro mercado  en línea, donde la calidad de la tierra se encuentra con la comodidad de tu pantalla! Estamos encantados de ofrecerte una experiencia de compra agrícola sin igual.</p>
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
<script src="{{asset('js/script.js')}}"></script>
</body>
</html>