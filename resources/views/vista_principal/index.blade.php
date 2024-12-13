@extends('layouts.app')

@section('content')
<style>
    /* Estilos personalizados */
    body {
        background-color: #121212;
        font-family: 'Roboto', sans-serif;
        color: #eaeaea;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }
    
    /* Navbar */
    .navbar {
        background-color: #1f1f1f;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }
    .navbar .navbar-brand {
        color: #e50914 !important;
        font-weight: bold;
    }
    .navbar .nav-link {
        color: #eaeaea !important;
        font-weight: bold;
    }
    .navbar .nav-link:hover {
        color: #e50914 !important;
    }
    .navbar-toggler-icon {
        background-color: #e50914;
    }

    /* Banner promocional */
    .promo-banner {
        background: linear-gradient(135deg, #c4001d, #a30017);
        color: white;
        padding: 60px 0;
        text-align: center;
        border-radius: 10px;
        margin: 40px 0;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }
    .promo-banner h3 {
        font-size: 2.5rem;
        font-weight: bold;
    }
    .promo-banner p {
        font-size: 1.2rem;
        margin-bottom: 20px;
    }
    .btn-red {
        background-color: #c4001d;
        color: white;
        border-radius: 8px;
        padding: 14px 28px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }
    .btn-red:hover {
        background-color: #a30017;
    }

    /* Títulos */
    h2 {
        color: #e50914;
        font-weight: bold;
        text-transform: uppercase;
        margin-bottom: 40px;
        font-size: 2.5rem;
        text-align: center;
    }

    /* Tarjetas de películas */
    .card.movie-card {
        border: none;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card.movie-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 16px 32px rgba(0, 0, 0, 0.4);
    }
    .card.movie-card img {
        height: 350px;
        object-fit: cover;
        border-radius: 12px 12px 0 0;
    }
    .card-body {
        background-color: #222;
        padding: 20px;
        text-align: center;
    }
    .card-body h5 {
        font-size: 1.3rem;
        font-weight: bold;
        color: #e50914;
        margin-bottom: 15px;
    }
    .card-body button {
        font-size: 1rem;
        padding: 12px 30px;
        border-radius: 8px;
        background-color: #e50914;
        color: white;
        border: none;
        transition: background-color 0.3s ease;
    }
    .card-body button:hover {
        background-color: #a30017;
    }
</style>

<div class="container">
    <h1 class="text-center mb-4">Selecciona un Cine</h1>

    <!-- Select para elegir el cine -->
    <div class="form-group">
        <label for="cineSelect">Cine</label>
        <select id="cineSelect" class="form-control">
            <option value="">Selecciona un cine</option>
            @foreach ($cines as $cine)
                <option value="{{ $cine->id }}">{{ $cine->pais }}</option>
            @endforeach
        </select>
    </div>


    <!-- Contenedor para las carteleras -->
    <div id="cartelerasContainer" class="mt-4">
        <!-- Cartelera Semanal -->
<div class="container mt-5">
    <h2 class="mb-4 text-center">Estrenos / Cartelera Semanal</h2>
    <div id="moviesContainer" class="row g-4">
        <!-- Las tarjetas se generarán aquí dinámicamente -->
    </div>
</div>
    </div>
    <div id="cartelerasContainer"></div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
 var reservacionCreateRoute = '{{ route("reservacion.create") }}';
    // Cuando se cambie el select del cine
    $('#cineSelect').change(function() {
        var cineId = $(this).val();

        if(cineId) {
            // Hacer una solicitud AJAX para obtener las carteleras
            $.ajax({
    url: '{{ route('cartelerasdelCine') }}', // Ruta para obtener las carteleras
    type: 'POST',
    data: {
        cine_id: cineId, // ID del cine seleccionado
        _token: '{{ csrf_token() }}' // Token CSRF
    },
    success: function(response) {
        // Limpiar el contenedor de películas
        $('#moviesContainer').empty();

        if (response.length > 0) {
            // Generar tarjetas para cada película en la cartelera
            response.forEach(function(cartelera) {
                cartelera.peliculas.forEach(function(pelicula) {
                    var movieCard = `
                        <div class="col-md-3">
                            <div class="card movie-card">
                                <img src="{{ asset('img/4.png') }}" alt="${pelicula.nombre}">
                                <div class="card-body">
                                    <h5 class="card-title">${pelicula.nombre}</h5>
                                    <button class="btn btn-red" onclick="window.location='${reservacionCreateRoute}?pelicula_id=${pelicula.id}'">Reservar</button>
                                </div>
                            </div>
                        </div>
                    `;
                    $('#moviesContainer').append(movieCard); // Agregar la tarjeta al contenedor
                });
            });
        } else {
            $('#moviesContainer').html('<p class="text-center">No hay películas disponibles en esta cartelera.</p>');
        }
    },
    error: function(xhr, status, error) {
        console.error('Error al cargar las películas:', error);
    }
});


        } else {
            $('#cartelerasContainer').empty(); // Limpiar si no se ha seleccionado cine
        }
    });
</script>

@endsection
