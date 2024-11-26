@extends('layouts.principal')
@section('title','clientesEditar')
@section('content')
<div class="container">
    <h1>Editar Cliente</h1>

    <!-- Formulario para editar -->
    <form action="{{ route('update.clientes', $client->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $client->nombre) }}" required>
        </div>

        <div class="form-group">
            <label for="mail">Correo Electrónico</label>
            <input type="email" name="mail" id="mail" class="form-control" value="{{ old('mail', $client->mail) }}" required>
        </div>

        <div class="form-group">
            <label for="contraseña">Contraseña</label>
            <input type="password" name="contraseña" id="contraseña" class="form-control">
            <small class="text-muted">Deja en blanco si no deseas cambiar la contraseña</small>
        </div>

        <div class="form-group">
            <label for="edad">Edad</label>
            <input type="number" name="edad" id="edad" class="form-control" value="{{ old('edad', $client->edad) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
        <a href="{{ route('index.clientes') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection