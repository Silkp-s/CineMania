@extends('layouts.app')
@section('title','peliculaver')
@section('content')
@section('content')
<div class="container">
    <h1>Detalles de la pelicula</h1>
    <ul>
        <li><strong>ID:</strong> {{ $pelicula->id }}</li>
        <li><strong>ID de la sala :</strong> {{ $pelicula->sala_id}}</li>
        <li><strong>Idioma:</strong> {{ $pelicula->idioma }}</li>
        <li><strong>Nombre Pelicula:</strong> {{ $pelicula->nombre }}</li>
        <li><strong>Clasificacion:</strong> {{ $pelicula->pg }}</li>
    </ul>
    <a href="{{ route('index.peliculas') }}" class="btn btn-secondary">Volver a la lista</a>
</div>
@endsection
@endsection