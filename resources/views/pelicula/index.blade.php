@extends('layouts.dashboard')
@section('title','pelicula')
@section('content')
<h1>Lista de peliculas</h1>
<a href="{{ route('create.peliculas') }}" class="btn btn-custom mb-3">Agregar pelicula</a>
<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>ID sala Emision</th>
            <th>Clasificacion</th>
            <th>idioma</th>
            <th>imagen</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($peliculas as $pelicula)
            <tr>
                <td>{{ $pelicula->id }}</td>
                <td>{{ $pelicula->nombre }}</td>
                <td>{{ $pelicula->sala_id }}</td>
                <td>{{ $pelicula->pg }}</td>
                <td>{{ $pelicula->idioma }}</td>
                <td>{{ $pelicula->image}}</td>
                <td> 
                <a href="{{ route('show.peliculas', $pelicula->id)}}" class="btn btn-sm btn-primary">Ver</a>
                <a href="{{ route('edit.peliculas', $pelicula->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" data-url="{{ route('destroy.peliculas', $pelicula->id) }}">
                        Eliminar
                    </button>
                    
                    <!-- Modal de Confirmación -->
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
                ¿Estás seguro de que deseas eliminar esta pelicula?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form action="{{ route('destroy.peliculas', $pelicula->id) }}", id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>

</div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">No hay Peliculas registradas.</td>
            </tr>
        @endforelse
    </tbody>
</table>
<div class="d-flex justify-content-center my-4">
    {{ $peliculas->links('pagination::bootstrap-4') }}
</div>


<script>
     document.addEventListener('DOMContentLoaded', function () {
        var deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            // Botón que activó el modal
            var button = event.relatedTarget;
            // URL pasada por data-url
            var url = button.getAttribute('data-url');
            // Configurar el atributo action del formulario
            var form = document.getElementById('deleteForm');
            form.action = url;
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>


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

@endsection
