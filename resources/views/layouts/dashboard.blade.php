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
        body {
            font-family: 'Nunito', 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #121212; /* Fondo oscuro global */
            color: #ffffff; /* Texto blanco predeterminado */
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
    </style>
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
        </nav>


    </div>
</body>
</html>
