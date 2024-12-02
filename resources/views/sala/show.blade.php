@extends('layouts.app')
@section('title','salaCrear')
@section('content')
@section('content')
<div class="container">
    <h1>Detalles de la Sala</h1>
    <ul>
        <li><strong>ID:</strong> {{ $sala->id }}</li>
        <li><strong>Capacidad de la sala:</strong> {{ $sala->capacidad }}</li>
        <li><strong>Numero de sala:</strong> {{ $sala->nsala }}</li>
        <li><strong>ID del Cine:</strong> {{ $sala->cine_id }}</li>
    </ul>
    <a href="{{ route('index.salas') }}" class="btn btn-secondary">Volver a la lista</a>
</div>
@endsection
@endsection