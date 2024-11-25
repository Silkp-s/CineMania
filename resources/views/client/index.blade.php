@extends('layouts.principal')
@section('title','clientes')
@section('content')
<h1>Lista de Clientes</h1>
<a href="{{ route('create.clientes') }}" class="btn btn-custom mb-3">Agregar Cliente</a>
<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{ $client->nombre }}</td>
                <td>{{ $client->mail }}</td>
                <td>{{ $client->edad }}</td>
                <td>
                   
                    <a href="{{ route('show.clientes', $client->id)}}" class="btn btn-sm btn-primary">Ver</a>
                    <a href="{{ route('edit.clientes', $client->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">No hay clientes registrados.</td>
            </tr>
        @endforelse
    </tbody>
</table>
<div class="d-flex justify-content-center my-4">
    {{ $clients->links() }}
</div>

@endsection
