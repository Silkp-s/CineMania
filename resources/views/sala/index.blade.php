@extends('layouts.principal')
@section('title','clientes')
@section('content')
<h1>Lista de Salas</h1>
<a href="{{ route('create.salas') }}" class="btn btn-custom mb-3">Agregar sala</a>
<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>ID cine</th>
            <th>número de sala</th>
            <th>capacidad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($salas as $sala)
            <tr>
                <td>{{ $sala->id }}</td>
                <td>{{ $sala->cine_id }}</td>
                <td>{{ $sala->nsalas }}</td>
                <td>{{ $sala->capacidad }}</td>
                <td>
                   
                    <a href="{{ route('show.salas', $sala->id)}}" class="btn btn-sm btn-primary">Ver</a>
                    <a href="{{ route('edit.salas', $sala->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" data-url="{{ route('destroy.salas', $sala->id) }}">
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
                <form action="{{ route('destroy.salas', $sala->id) }}", id="deleteForm" method="POST">
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
                <td colspan="5" class="text-center">No hay Salas registradas.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="d-flex justify-content-center my-4">
    {{ $salas->links() }}
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

@endsection
