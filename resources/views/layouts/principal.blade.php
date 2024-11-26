<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield ('title','Default Title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #121212; /* Fondo negro */
            font-family: 'Roboto', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: #eaeaea; /* Texto claro */
        }

        /* Navbar */
        .navbar {
            background-color: #1f1f1f;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        .navbar .navbar-brand, .navbar .nav-link {
            color: #eaeaea ;
        }
        .navbar .nav-link:hover {
            color: #eaeaea ;
        }

        /* Contenedor principal */
        .container {
            flex: 1;
            max-width: 1200px;
        }

        /* Títulos y botones */
        h1 {
            color: #e50914;
            font-weight: 700;
        }

        .btn-custom {
            background-color: #e50914;
            color: white;
            font-weight: bold;
            border-radius: 8px;
            padding: 10px 20px;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #b00610;
        }

        /* Tabla de gestión */
        .table {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .table-striped tbody tr:hover {
            background-color: #f1f1f1;
        }

        .table-dark th, .table-dark td {
            background-color: #343a40;
            color: white;
        }

        /* Footer */
        .footer p {
            font-size: 14px;
        }
        footer {
            background-color: #000;
            color: white;
            text-align: center;
            padding: 15px 0;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
        /* Ajustes para dispositivos móviles */
        @media (max-width: 768px) {
            .table th, .table td {
                font-size: 12px;
            }
        }

        
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">CineMania</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{route('index.salas')}}">Gestión de Salas</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Películas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('index.clientes')}}">Usuarios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Cerrar Sesión</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('index.cines')}}">Cines</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

        <!-- Footer -->
<footer>
    <p style="display: center;">&copy; 2024 CineMania - Donde las películas cobran vida</p>
 </footer>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>