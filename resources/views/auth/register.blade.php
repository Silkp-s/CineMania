@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="flex: 1; height: auto; padding: 20px;">
    <div class="register-container">
        <h1>{{ __('Crear Cuenta') }}</h1>
        <p>Regístrate para empezar a disfrutar de nuestras películas</p>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name">{{ __('Nombre') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">{{ __('Correo') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">{{ __('Contraseña') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password-confirm">{{ __('Repite la Contraseña') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>

            <button type="submit" class="btn btn-primary w-100">
                {{ __('Registrarse') }}
            </button>
        </form>
    </div>
</div>
<footer class="footer">
    <p>&copy; 2024 CineManía - Donde las películas cobran vida</p>
</footer>
<style>
    /* Estilos generales */
    body, html {
        font-family: 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
        height: 100%; /* Asegura que body y html ocupen toda la ventana */
        display: flex;
        flex-direction: column; /* Estructura en columna: header, contenido, footer */
        background: linear-gradient(180deg, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.7)),
                    url('https://via.placeholder.com/1920x1080?text=Fondo+Cine'); /* Cambia la URL de fondo */
        background-size: cover;
        background-position: center;
        color: #ffffff;
    }

    .container {
        flex: 1; /* Asegura que el contenedor ocupa todo el espacio disponible */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .register-container {
        width: 400px;
        padding: 40px;
        background-color: rgba(0, 0, 0, 0.8);
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
        text-align: center;
    }

    .register-container h1 {
        font-size: 32px;
        color: #e50914;
        margin-bottom: 20px;
        font-weight: 700;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-size: 14px;
        color: #d3d3d3;
        margin-bottom: 8px;
        text-align: left;
    }

    .form-control {
        width: 100%;
        padding: 12px;
        border: 1px solid #444;
        border-radius: 8px;
        font-size: 16px;
        background-color: #333;
        color: #fff;
        outline: none;
    }

    .form-control:focus {
        border-color: #e50914;
        box-shadow: 0 0 5px rgba(229, 9, 20, 0.5);
    }

    .invalid-feedback {
        color: #e50914;
        font-size: 14px;
        margin-top: 5px;
        text-align: left;
    }

    .btn-primary {
        padding: 12px;
        background: #e50914;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .btn-primary:hover {
        background: #b00610;
    }

    .footer {
        background-color: #000;
        color: white;
        text-align: center;
        padding: 15px 0;
        width: 100%;
        position: fixed;
        bottom: 0;
        left: 0;
    }

    .footer p {
        margin: 0;
        font-size: 14px;
    }
</style>
@endsection
