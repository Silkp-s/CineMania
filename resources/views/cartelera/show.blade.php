@extends('layouts.dashboard')

@section('title', 'Detalle Cartelera')

@section('content')
<div class="container">
    <h1>Detalle de la Cartelera</h1>
    <h2>Cine:  {{ $cartelera->cine->ciudad}}</h2>  <h2>Pais:  {{ $cartelera->cine->pais}}</h2>

    <h3>Películas:</h3>
    <ul>
        @foreach($cartelera->peliculas as $pelicula)
            <li>{{ $pelicula->nombre }} - Idioma: {{ $pelicula->idioma }} - Clasificación: {{ $pelicula->pg }}</li>
        @endforeach
    </ul>
</div>
@endsection
