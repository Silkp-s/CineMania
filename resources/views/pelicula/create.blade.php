@extends('layouts.principal')
@section('title','PeliculaCrear')
@section('content')
<div class="container">
    <h1>Crear Nueva Sala</h1>
    <form action="{{ route('store.peliculas') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="ciudad">ID Salas</label>
            <select name="sala_id" id="sala_id" class="form-control" required>
                <option value="" disabled selected>Seleccione una sala</option>
                @foreach ($salas as $sala)
                    <option value="{{ $sala->id }}">{{ $sala->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="idioma">Idioma de la pelicula</label>
            <input type="string" name="idioma" id="idioma" class="form-control" value="{{ old('idioma') }}" required>
        </div>
        <div class="form-group">
            <label for="pg">Clasificacion</label>
            <input type="integer" name="pg" id="pg" class="form-control" value="{{ old('pg') }}" required>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre Pelicula</label>
            <input type="string" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required>
        </div>
        <button type="submit" class="btn btn-primary my-2">Crear Sala</button>
        <a href="{{ route('index.peliculas') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection