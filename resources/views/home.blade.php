@extends('layouts.app')

@section('content')
<div class="container">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinemanía - Cartelera</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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
        footer {
        background-color: #000;
        color: white;
        text-align: center;
        padding: 15px 0;
        width: 100%;
        position: sticky; /* Hace que el footer se mantenga visible */
        bottom: 0; /* Lo ancla a la parte inferior del contenedor */
    }
        /* Ajustes para dispositivos móviles */
        @media (max-width: 768px) {
            .promo-banner {
                padding: 30px 15px;
            }
            .promo-banner h3 {
                font-size: 2rem;
            }
            h2 {
                font-size: 2rem;
            }
            .card-body h5 {
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Promociones -->
    <div class="container">
        <div class="promo-banner">
            <h3>¿Todavía no eres parte de ManiaClub?</h3>
            <p>Únete ahora y paga menos en entradas.</p>
            <a href="#" class="btn btn-red">Conoce más aquí</a>
        </div>
    </div>

    <!-- Cartelera Semanal -->
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Estrenos / Cartelera Semanal</h2>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="card movie-card">
                    <img src="1.jpg" class="card-img-top" alt="Gladiador">
                    <div class="card-body">
                        <h5 class="card-title">Gladiador</h5>
                        <button class="btn btn-red">Ver Horarios</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card movie-card">
                    <img src="2.png" class="card-img-top" alt="Wicked">
                    <div class="card-body">
                        <h5 class="card-title">Wicked</h5>
                        <button class="btn btn-red">Ver Horarios</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card movie-card">
                    <img src="3.png" class="card-img-top" alt="Traje Rojo">
                    <div class="card-body">
                        <h5 class="card-title">Traje Rojo</h5>
                        <button class="btn btn-red">Ver Horarios</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card movie-card">
                    <img src="4.png" class="card-img-top" alt="Venom">
                    <div class="card-body">
                        <h5 class="card-title">Venom</h5>
                        <button class="btn btn-red">Ver Horarios</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<br>
<br>    
    <!-- Footer -->
    <footer>
        <p>&copy; 2024 CineMania. Donde las películas cobran vida.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

@endsection
