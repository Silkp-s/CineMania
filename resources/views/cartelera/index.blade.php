@extends('layouts.dashboard')
@section('title', 'cartelera')
@section('content')
<div class="container">
    <style>
        /* Estilos generales */
        body {
            background-color: #1a1a1a;
            color: #fff;
            font-family: 'Roboto', sans-serif;
        }
    
        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #e50914;
        }
    
        /* Estilos de la tabla */
        .table-dark {
            border-radius: 8px;
            overflow: hidden;
        }
    
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #2b2b2b;
        }
    
        .table-hover tbody tr:hover {
            background-color: #444;
        }
    
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
    
        /* Botones */
        .btn-custom {
            background-color: #e50914;
            color: white;
            font-weight: bold;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }
    
        .btn-custom:hover {
            background-color: #b00610;
        }
    
        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }
    
        .btn-primary:hover {
            background-color: #0056b3;
        }
    
        .btn-warning {
            background-color: #ffb400;
            border: none;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }
    
        .btn-warning:hover {
            background-color: #cc8e00;
        }
    
        .btn-danger {
            background-color: #dc3545;
            border: none;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }
    
        .btn-danger:hover {
            background-color: #a71d2a;
        }
    
        /* Paginación */
        .pagination .page-item.active .page-link {
            background-color: #e50914;
            border-color: #e50914;
            color: white;
        }
    
        .pagination .page-link {
            color: #e50914;
            background-color: transparent;
            border: 1px solid #e50914;
            border-radius: 8px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
    
        .pagination .page-link:hover {
            color: white;
            background-color: #e50914;
        }
    
        /* Modal */
        .modal-content {
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
        }
    
        .modal-header, .modal-body, .modal-footer {
            color: #fff;
        }
    
        .modal-header {
            background-color: #333;
        }
    
        .modal-body {
            background-color: #222;
        }
    
        .modal-footer {
            background-color: #333;
        }
    </style>

<h1 class="text-center mb-4">Lista de Carteleras</h1>
<a href="{{ route('create.carteleras') }}" class="btn btn-custom mb-3">Agregar Cartelera</a>
<table class="table table-dark table-striped table-hover">
    <thead>
        <tr>
            <th>ID Cartelera</th>
            <th>Ciudad Cine</th>
            <th>peliculas </th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($carteleras as $cartelera)
            <tr>
                <td>{{ $cartelera->id }}</td>
                <td>{{ $cartelera->cine->ciudad }}</td>        
                <td>
                    <ul>
                        @foreach($cartelera->peliculas as $pelicula)
                            <li>{{ $pelicula->nombre }} ({{ $pelicula->idioma }})</li>
                        @endforeach
                    </ul>
                </td>                   
                <td>
                    <a href="{{ route('show.carteleras', $cartelera->id) }}" class="text-light btn btn-outline-secondary">Ver</a>
                    <a href="{{ route('edit.carteleras', $cartelera->id) }}" class="text-light btn btn-outline-success">Editar</a>
                    <button type="button" class="btn btn-outline-danger text-light" data-toggle="modal" data-target="#deleteModal" data-url="{{ route('destroy.carteleras', $cartelera->id) }}">
                        Eliminar
                    </button>
                    
                    <div class="modal fade " id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-black bg-gradient">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar esta cartelera?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form action="{{ route('destroy.carteleras', $cartelera->id) }}", id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">No hay cines registrados.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="d-flex justify-content-center my-4">
    {{ $carteleras->links('pagination::bootstrap-4') }}
</div>

<td>


</td>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection

