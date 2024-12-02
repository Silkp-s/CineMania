@extends('layouts.app')
@section('title','clientesCrear')
@section('content')
<div class="container">
    <h1>Crear Nuevo Cliente</h1>

    <form action="{{ route('store.clientes') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required>
        </div>

        <div class="form-group">
            <label for="mail">Correo Electrónico</label>
            <input type="email" name="mail" id="mail" class="form-control" value="{{ old('mail') }}" required>
        </div>

        <div class="form-group">
            <label for="contraseña">Contraseña</label>
            <input type="password" name="contraseña" id="contraseña" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="edad">Edad</label>
            <input type="number" name="edad" id="edad" class="form-control" value="{{ old('edad') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Crear Cliente</button>
        <a href="{{ route('index.clientes') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection