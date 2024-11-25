@extends('layouts.principal')
@section('title','clientesCrear')
@section('content')
<h1>Listeilor show</h1>

@section('content')
<div class="container">
    <h1>Detalles del Cliente</h1>
    <ul>
        <li><strong>ID:</strong> {{ $client->id }}</li>
        <li><strong>Nombre:</strong> {{ $client->nombre }}</li>
        <li><strong>Email:</strong> {{ $client->mail }}</li>
        <li><strong>Edad:</strong> {{ $client->edad }}</li>
    </ul>
    <a href="{{ route('index.clientes') }}" class="btn btn-secondary">Volver a la lista</a>
</div>
@endsection
@endsection