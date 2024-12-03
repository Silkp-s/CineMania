@extends('layouts.app')

@section('content')
<style>
    /* Estilos generales */
    body, html {
        font-family: 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
        height: 100%; /* Asegura que body y html ocupen el 100% de la ventana */
        display: flex;
        flex-direction: column; /* Organiza el contenido en columna (header, contenido, footer) */
        background: linear-gradient(180deg, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.7)),
                    url('https://via.placeholder.com/1920x1080?text=Fondo+Cine'); /* Cambia esta URL */
        background-size: cover;
        background-position: center;
        color: #ffffff;
    }

    .content-wrapper {
        flex: 1; /* Hace que este contenedor ocupe el espacio disponible */
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: calc(100vh - 56px); /* Ajusta por la altura del navbar si existe */
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

    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 12px;
        margin-bottom: 15px;
        border: 1px solid #444;
        border-radius: 8px;
        font-size: 16px;
        background-color: #fff;
        color: #000;
    }

    input[type="email"]:focus,
    input[type="password"]:focus {
        border-color: #e50914;
        outline: none;
        background-color: #fff;
        color: #000;
        box-shadow: 0 0 5px rgba(229, 9, 20, 0.5);
    }

    button {
        width: 100%;
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

    button:hover {
        background: #b00610;
    }

    .secondary {
        margin-top: 20px;
        font-size: 14px;
        color: #d3d3d3;
    }

    .secondary a {
        color: #e50914;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .secondary a:hover {
        color: #b00610;
    }
</style>

<div class="content-wrapper">
    <div class="register-container">
        <h1>{{ __('Inicia Sesion') }}</h1>
        <p>Inicia sesión para disfrutar del mejor contenido cinematográfico</p>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('E-Mail Address') }}">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('Password') }}">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    {{ __('Recuerdame') }}
                </label>
            </div>

            <button type="submit">
                {{ __('Iniciar Sesion') }}
            </button>

            @if (Route::has('password.request'))
                <div class="secondary">
                    <a href="{{ route('password.request') }}">{{ __('Olvidaste Tu Contraseña?') }}</a>
                </div>
            @endif
        </form>
    </div>
</div>


@endsection