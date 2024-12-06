@extends('layouts.app')
@section('title', 'Editar Cartelera')
@section('content')
<div class="container">
    <h1>Editar Cartelera</h1>

    <!-- Formulario de edición de cartelera -->
    <form action="{{ route('update.carteleras', $cartelera->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="cine_id">Cine</label>
            <select name="cine_id" id="cine_id" class="form-control" disabled>
                <option value="{{ $cartelera->cine->id }}" selected>{{ $cartelera->cine->nombre }} ({{ $cartelera->cine->ciudad }})</option>
            </select>
        </div>

        <div class="form-group">
            <label for="peliculas">Películas</label>
            <ul>
                @foreach($peliculas as $pelicula)
                    <li>
                        <input type="checkbox" name="peliculas[]" value="{{ $pelicula->id }}"
                               @if($cartelera->peliculas->contains($pelicula)) checked @endif>
                        {{ $pelicula->nombre }} - Idioma: {{ $pelicula->idioma }} - Clasificación: {{ $pelicula->pg }}
                    </li>
                @endforeach
            </ul>
        </div>

        <button type="submit" class="btn btn-custom">Actualizar Cartelera</button>
    </form>
</div>
@endsection
