<!DOCTYPE html>
<html>

<head>
    <title>Restablecimiento de Contraseña</title>
    @vite('resources/css/style.css')
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            background: #F3F3F3;
        }

        div {
            background: #fff;
            padding: 2rem;
            width: 60vw;
        }

        .boton {
            background-color: #007bff;
            padding: 1em;
            cursor: pointer;
            color: #bebebe;
            text-decoration: none
        }

        .boton:hover {
            background: #449eff;
            color: #fff;
        }

        img {
            width: 15vw;
        }
        a{
            word-wrap: break-word;
            word-break: break-all;
            overflow-wrap: break-word;
            white-space: normal;
        }
        a:last-child:hover{
            color: #449eff
        }
    </style>
</head>

<body>
    <img src="{{ Vite::asset('resources/img/Logo-2.0.ico') }}" alt="">
    <div>
        <h1>¡Hola!</h1>
        <p>Recibes este correo electrónico porque recibimos una solicitud de restablecimiento de contraseña para tu
            cuenta.
        </p><br>
        <a class="boton" href="{{ $resetUrl }}">Restablecer Contraseña</a><br><br>
        <p>Este enlace de restablecimiento de contraseña caducará en 60 minutos.</p>
        <p>Si no solicitaste un restablecimiento de contraseña, no es necesario realizar ninguna otra acción.</p>
        <p>Saludos,<br> FarmFusion</p>
        <hr>
        <p>Si tienes problemas para hacer clic en el botón "Restablecer contraseña", copia y pega la siguiente URL en tu
            navegador web: <a href="{{ $resetUrl }}">{{ $resetUrl }}</a></p>
    </div>
</body>

</html>
