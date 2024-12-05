@extends('layouts.app')

@section('title', 'Crear Nueva Cartelera')

@section('content')
<div class="container">
    <h1 class="mb-4">Crear Nueva Cartelera</h1>

    <!-- Formulario para crear una nueva cartelera -->
    <form action="{{ route('store.carteleras') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="cine_id">Cine</label>
            <select name="cine_id" id="cine_id" class="form-control" required>
                @foreach($cines as $cine)
                    <option value="{{ $cine->id }}">{{ $cine->ciudad }} - {{ $cine->nombre }}</option>
                @endforeach
            </select>
        </div>

        <!-- Sección para agregar las películas -->
        <div id="peliculas-container">
            <div class="form-group">
                <label for="pelicula_id[]">Película</label>
                <select name="peliculas_id[]" class="form-control" required>
                    @foreach($peliculas as $pelicula)
                        <option value="{{ $pelicula->id }}">{{ $pelicula->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="button" id="add-pelicula" class="btn btn-info mb-3">Agregar Película</button>

        <button type="submit" class="btn btn-success">Guardar Cartelera</button>
    </form>
</div>

<!-- Script para agregar dinámicamente nuevas películas -->
<script>
    document.getElementById('add-pelicula').addEventListener('click', function() {
        var container = document.getElementById('peliculas-container');
        var newSelect = document.createElement('div');
        newSelect.classList.add('form-group');
        newSelect.innerHTML = `
            <label for="pelicula_id[]">Película</label>
            <select name="peliculas_id[]" class="form-control" required>
                @foreach($peliculas as $pelicula)
                    <option value="{{ $pelicula->id }}">{{ $pelicula->nombre }}</option>
                @endforeach
            </select>
        `;
        container.appendChild(newSelect);
    });
</script>
@endsection
