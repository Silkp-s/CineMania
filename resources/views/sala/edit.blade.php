@extends('layouts.dashboard')
@section('title','salasEditar')
@section('content')
<div class="container">
    <h1>Editar Sala</h1>

    <!-- Formulario para editar -->
    <form action="{{ route('update.salas', $sala->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="ciudad">ID Cine</label>
            <select name="cine_id" id="cine_id" class="form-control" required>
                <option value="" disabled selected>Seleccione un cine</option>
                @foreach ($cines as $cine)
                    <option value="{{ $cine->id }}">{{ $cine->id }} - {{ $cine->ciudad }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nsala">Numero de sala</label>
            <input type="integer" name="nsala" id="nsala" class="form-control" value="{{ old('nsala', $sala->nsalas) }}" required>
        </div>

        <div class="form-group">
            <label for="capacidad">Capacidad</label>
            <input type="text" name="capacidad" id="capacidad" class="form-control" value="{{ old('capacidad', $sala->capacidad) }}" required>
        </div>
        <button type="submit" class="btn btn-primary my-2">Actualizar Sala</button>
        <a href="{{ route('index.salas') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection