<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CineManía') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito|Roboto" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        /* Estilos globales */
        body {
            font-family: 'Nunito', 'Roboto', sans-serif;
            background-color: #121212;
            color: #fff;
            margin: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .navbar {
            background: rgba(0, 0, 0, 0.9);
            border-bottom: 2px solid #e50914;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            color: #e50914 !important;
        }

        .sidebar {
            height: 100vh;
            width: 250px;
            background-color: #181818;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 1rem;
            overflow-y: auto;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5);
        }

        .sidebar-header {
            text-align: center;
            font-size: 1.2rem;
            color: #e50914;
            font-weight: bold;
            border-bottom: 1px solid #444;
            padding-bottom: 0.5rem;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            padding: 0.8rem 1rem;
            display: block;
            font-size: 1rem;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .sidebar a:hover, .sidebar a.active {
            background-color: #e50914;
            color: #fff;
        }

        .sidebar a i {
            margin-right: 10px;
        }

        .main-content {
            margin-left: 250px;
            padding: 2rem;
        }

        footer {
            background-color: #000;
            color: #fff;
            text-align: center;
            padding: 1rem 0;
            margin-top: auto;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <nav class="sidebar">
        <div class="sidebar-header">Cinemanía</div>
        <a href="#" class="{{ request()->routeIs('index.salas') ? 'active' : '' }}">
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

        <a href="{{ route('index.carteleras') }}" class="{{ request()->routeIs('index.carteleras') ? 'active' : '' }}">
            <i class="bi bi-film"></i> Carteleras
        </a>

        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-right"></i> Salir
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </nav>

    <!-- Contenido principal -->
    <div class="main-content">
        <header class="content-header">
        </header>
        <main>
            @yield('content')
        </main>
    </div>

    <!-- Footer -->
    <footer>
        &copy; 2024 CineManía - Donde las películas cobran vida
    </footer>
</body>
</html>
