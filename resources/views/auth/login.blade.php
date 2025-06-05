@extends('layouts.app')

@section('content')
<style>
    * {
        box-sizing: border-box;
    }

    body, html {
        margin: 0;
        padding: 0;
        height: 100%;
        overflow-x: hidden;
        font-family: Arial, sans-serif;
        background-color: black;
    }

    .contenedor-central {
        width: 90%;
        max-width: 1100px;
        margin: 0 auto;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        border-left: 20px solid black;
        border-right: 20px solid black;
        background-image: url("{{ asset('imagenes/fondo.jpg') }}");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: scroll;
        position: relative;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .encabezado {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: linear-gradient(to bottom, rgb(11, 10, 97) 50%, rgb(16, 124, 41) 50%);
        padding: 10px 20px;
        height: 100px;
    }

    .logo-texto {
        display: flex;
        align-items: center;
    }

    .logo-texto img {
        height: 70px;
        margin-right: 15px;
    }

    .nombre-colegio {
        font-size: 24px;
        font-weight: bold;
        color: white;
    }

    .lema {
        font-style: italic;
        font-size: 16px;
        text-align: right;
        color: white;
    }

    .centro {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
    }

    .formulario-login {
        background-color: rgba(209, 199, 199, 0.85);
        padding: 30px 25px;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
        width: 320px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .formulario-login h2 {
        margin-bottom: 20px;
        color: #001f7a;
        font-weight: bold;
    }

    .formulario-login input {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border: 1px solid #bbb;
        border-radius: 6px;
        font-size: 16px;
    }

    .boton-login {
        width: 100%;
        padding: 12px;
        background-color: rgba(11, 10, 97,0.85);
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 18px;
        font-weight: bold;
        cursor: pointer;
        margin-top: 15px;
        transition: background-color 0.3s ease;
    }

    .boton-login:hover {
        background-color: rgba(11, 10, 97, 10);
    }

    .footer {
        text-align: center;
        background-color: rgba(0, 0, 0, 0.7);
        padding: 10px;
        font-size: 14px;
        color: white;
    }


    @media (max-width: 600px) {
        .nombre-colegio {
            font-size: 18px;
        }

        .lema {
            font-size: 14px;
        }

        .formulario-login {
            width: 90%;
            padding: 25px 15px;
        }

        .encabezado {
            height: 70px;
            padding: 8px 15px;
        }
    }
</style>

<div class="contenedor-central">
    <div class="encabezado">
        <div class="logo-texto">
            <img src="{{ asset('imagenes/escudocolegio.png') }}" alt="Escudo Colegio">
            <div class="nombre-colegio">
                <div>Colegio</div>
                <div>31 de Octubre "C"</div>
            </div>
        </div>
        <div class="lema">
            <div>“Disciplina, estudio y deporte”</div>
            <div>¡Adelante 31 de Octubre!</div>
        </div>
    </div>

    <div class="centro">
        <div class="formulario-login">
            <h2>Iniciar Sesión</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Correo electrónico">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <button type="submit" class="boton-login">Ingresar</button>
            </form>
        </div>
    </div>

    <div class="footer">
        © 2025
    </div>
</div>
@endsection