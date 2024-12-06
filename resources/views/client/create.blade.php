@extends('layouts.app')
@section('title', 'clientesCrear')
@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Crear Nuevo Cliente</h1>

    <form action="{{ route('store.clientes') }}" method="POST" class="bg-dark p-4 rounded shadow">
        @csrf

        <div class="form-group mb-3">
            <label for="nombre" class="form-label text-light">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control custom-input" value="{{ old('nombre') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="mail" class="form-label text-light">Correo Electrónico</label>
            <input type="email" name="mail" id="mail" class="form-control custom-input" value="{{ old('mail') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="contraseña" class="form-label text-light">Contraseña</label>
            <input type="password" name="contraseña" id="contraseña" class="form-control custom-input" required>
        </div>

        <div class="form-group mb-4">
            <label for="edad" class="form-label text-light">Edad</label>
            <input type="number" name="edad" id="edad" class="form-control custom-input" value="{{ old('edad') }}" required>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-custom">Crear Cliente</button>
            <a href="{{ route('index.clientes') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>

<style>
/* Estilo del contenedor */
.container {
    max-width: 1000px;
}

/* Estilos generales */
body {
    background-color: #1a1a1a;
    color: #fff;
    font-family: 'Roboto', sans-serif;
}

h1 {
    font-size: 2.2rem;
    font-weight: 700;
    color: #e50914;
}

/* Estilo para los inputs */
.custom-input {
    background-color: #2a2a2a;
    border: 1px solid #444;
    color: #fff;
    border-radius: 8px;
    padding: 10px;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.custom-input:focus {
    border-color: #e50914;
    box-shadow: 0 0 5px #e50914;
    outline: none;
}

/* Estilo para el botón principal */
.btn-custom {
    background-color: #e50914;
    color: #fff;
    font-weight: bold;
    border: none;
    border-radius: 8px;
    padding: 10px 20px;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.btn-custom:hover {
    background-color: #b00710;
    color: #fff;
    transform: scale(1.05); /* Pequeño efecto de zoom */
}

.btn-custom:active {
    background-color: #80050c;
    transform: scale(1); /* Elimina el efecto de zoom al hacer clic */
}

/* Estilo para el botón secundario */
.btn-secondary {
    background-color: #6c757d;
    color: #fff;
    font-weight: bold;
    border: none;
    border-radius: 8px;
    padding: 10px 20px;
    transition: background-color 0.3s ease;
}

.btn-secondary:hover {
    background-color: #5a6268;
}
</style>
@endsection
