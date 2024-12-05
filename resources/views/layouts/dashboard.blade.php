<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito|Roboto" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        /* Estilos generales */
        html, body {
            height: 100%; /* Garantiza que ocupen todo el alto de la ventana */
            margin: 0; /* Elimina márgenes */
            display: flex;
            flex-direction: column; /* Hace que los hijos estén en una columna */
        }

        body {
            font-family: 'Nunito', 'Roboto', sans-serif;
            background-color: #121212; /* Fondo oscuro global */
            color: #ffffff; /* Texto blanco predeterminado */
        }

        .d-flex {
            flex: 1; /* Permite que el contenido principal ocupe el espacio restante */
            display: flex;
        }

        /* Navbar */
        .navbar {
            background: rgba(0, 0, 0, 0.9); /* Fondo oscuro */
            border-bottom: 2px solid #e50914; /* Línea roja inferior */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5); /* Sombra */
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            color: #e50914 !important; /* Color rojo */
        }

        /* Sidebar */
        .sidebar {
            height: 100vh;
            background-color: #181818; /* Fondo oscuro */
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 1rem;
            width: 250px;
            overflow-y: auto;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5);
        }

        .sidebar-header {
            text-align: center;
            margin-bottom: 1rem;
            font-size: 1.2rem;
            color: #e50914; /* Color rojo */
            font-weight: bold;
            border-bottom: 1px solid #444;
            padding-bottom: 0.5rem;
        }

        .sidebar a {
            color: #ffffff;
            text-decoration: none;
            margin: 0.5rem 0;
            padding: 0.8rem 1rem;
            display: block;
            font-size: 1rem;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #e50914; /* Fondo rojo */
            color: #ffffff; /* Texto blanco */
        }

        .sidebar a.active {
            background-color: #e50914; /* Fondo rojo para enlaces activos */
            color: #ffffff;
        }

        .sidebar a i {
            margin-right: 10px;
        }

        /* Contenido principal */
        .main-content {
            margin-left: 250px; /* Espacio para el sidebar */
            padding: 2rem;
        }

        /* Header dentro del contenido principal */
        .content-header {
            background-color: #1f1f1f;
            padding: 1rem;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .content-header h1 {
            font-size: 1.5rem;
            color: #e50914;
        }

        .content-header .clock {
            font-size: 1.2rem;
            color: #ffffff;
        }

        .content-header .btn-help {
            background-color: #e50914;
            border: none;
            color: #fff;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .content-header .btn-help:hover {
            background-color: #b2070f;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main-content {
                margin-left: 0;
            }
        }

        /* Footer */
        footer {
            background-color: #000; /* Fondo negro */
            color: white; /* Texto blanco */
            text-align: center;
            padding: 15px 0;
            margin-top: auto; /* Empuja el footer hacia el final */
            width: 100%;
        }
    </style>

    <script>
        // Reloj en tiempo real
        function updateClock() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            document.getElementById('clock').textContent = `${hours}:${minutes}:${seconds}`;
        }
        setInterval(updateClock, 1000);
        window.onload = updateClock;
    </script>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <nav class="sidebar">
            <div class="sidebar-header">
                Cinemania
            </div>
            <a href="{{ route('index.salas') }}" class="{{ request()->routeIs('index.salas') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
            <a href="{{ route('index.salas') }}" class="{{ request()->routeIs('index.salas') ? 'active' : '' }}">
                <i class="bi bi-tv"></i> Gestión de Salas
            </a>
            <a href="{{ route('index.peliculas') }}" class="{{ request()->routeIs('index.peliculas') ? 'active' : '' }}">
                <i class="bi bi-film"></i> Películas
            </a>
            <a href="{{ route('index.clientes') }}" class="{{ request()->routeIs('index.clientes') ? 'active' : '' }}">
                <i class="bi bi-people"></i> Usuarios
            </a>
            <a href="{{ route('index.cines') }}" class="{{ request()->routeIs('index.cines') ? 'active' : '' }}">
                <i class="bi bi-building"></i> Cines
            </a>
            <a href="{{ route('logout') }}" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i> Salir
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <div class="content-header">
                <h1>Bienvenido, {{ Auth::user()->name ?? 'Usuario' }}!</h1>
                <div class="clock" id="clock"></div>
            </div>
            
            <!-- Aquí va el contenido dinámico -->
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 CineManía - Donde las películas cobran vida</p>
    </footer>
</body>
</html>
