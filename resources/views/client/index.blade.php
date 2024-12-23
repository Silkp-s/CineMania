@extends('layouts.dashboard')
@section('title', 'clientes')
@section('content')

<h1>Lista de Clientes</h1>
<a href="{{ route('create.clientes') }}" class="btn btn-custom mb-3">Agregar Cliente</a>
<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Edad</th>
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
                    <a href="{{ route('show.clientes', $client->id) }}" class="text-light btn btn-outline-secondary">Ver</a>
                    <a href="{{ route('edit.clientes', $client->id) }}" class="text-light btn btn-outline-success">Editar</a>
                    <button type="button" class="btn btn-outline-danger text-light"  data-toggle="modal" data-target="#deleteModal" data-url="{{ route('destroy.clientes', $client->id) }}">
                        Eliminar
                    </button>
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
    {{ $clients->links('pagination::bootstrap-4') }}
</div>

<!-- Modal de Confirmación -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-black bg-gradient">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar este cliente?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form action="{{ route('destroy.clientes', $client->id) }}" id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var url = button.getAttribute('data-url');
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

/* Botón personalizado para agregar cliente */
.btn-custom {
    background-color: #e50914;
    color: #fff;
    font-weight: bold;
    border: none;
    border-radius: 8px;
    padding: 10px 20px;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.btn-custom:hover {
    background-color: #b00710;
    color: #fff;
    transform: scale(1.05); /* Pequeño efecto de zoom */
}

.btn-custom:active {
    background-color: #80050c;
    transform: scale(1); /* Elimina el efecto de zoom al hacer clic */
}

/* Estilos de la tabla */
.table-dark {
    border-radius: 8px;
    overflow: hidden;
}

.table th, .table td {
    text-align: center;
    vertical-align: middle;
}

/* Botones de acciones */
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
.page-item {
    margin: 0 0.25rem;
}

.page-item .page-link {
    color: #e50914;
    background-color: transparent;
    border: 1px solid #e50914;
    border-radius: 8px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.page-item .page-link:hover {
    color: white;
    background-color: #e50914;
}

.page-item.active .page-link {
    background-color: #e50914;
    border-color: #e50914;
    color: white;
}
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
