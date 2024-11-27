@extends('layouts.principal')
@section('title','salasEditar')
@section('content')
<div class="container">
    <h1>Editar Pelicula</h1>

    <!-- Formulario para editar -->
    <form action="{{ route('update.peliculas', $peliculas->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="ciudad">ID Sala</label>
            <select name="sala_id" id="sala_id" class="form-control" required>
                <option value="" disabled selected>Seleccione una Sala</option>
                @foreach ($salas as $sala)
                    <option value="{{ $sala->id }}">{{ $sala->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="idioma">idioma</label>
            <input type="text" name="idioma" id="idioma" class="form-control" value="{{ old('idioma', $peliculas->idioma) }}" required>
        </div>

        <div class="form-group">
            <label for="pg">Categoria</label>
            <input type="text" name="pg" id="pg" class="form-control" value="{{ old('pg', $peliculas->pg) }}" required>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $peliculas->nombre) }}" required>
        </div>
        <button type="submit" class="btn btn-primary my-2">Actualizar Cine</button>
        <a href="{{ route('index.peliculas') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection