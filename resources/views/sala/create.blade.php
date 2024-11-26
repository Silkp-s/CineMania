@extends('layouts.principal')
@section('title','salaCrear')
@section('content')
<div class="container">
    <h1>Crear Nueva Sala</h1>
    <form action="{{ route('store.salas') }}" method="POST">
        @csrf
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
            <label for="nsalas">numero de sala</label>
            <input type="integer" name="nsalas" id="nsalas" class="form-control" value="{{ old('nsalas') }}" required>
        </div>
        <div class="form-group">
            <label for="capacidad">Capacidad  de sala</label>
            <input type="integer" name="capacidad" id="capacidad" class="form-control" value="{{ old('capacidad') }}" required>
        </div>
        <button type="submit" class="btn btn-primary my-2">Crear Sala</button>
        <a href="{{ route('index.salas') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection