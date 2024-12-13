@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Reservar hora para: {{ $pelicula->nombre }}</h1>
    <form action="{{ route('reservacion.store') }}" method="POST">
        @csrf
        <input type="" name="pelicula_id" value="{{ $pelicula->id }}">
        <button type="submit" class="btn btn-primary mt-3">Reservar</button>
    </form>
</div>
@endsection
