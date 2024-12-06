@extends('layouts.dashboard')
@section('title', 'Detalles del Cine')
@section('content')
<div class="container my-5 d-flex justify-content-center align-items-center">
    <div class="details-card p-5 rounded shadow-lg">
        <h1 class="text-center mb-4 title">🎥 Detalles del Cine 🎥</h1>
        <div class="details-info p-3">
            <p><strong>ID:</strong> <span>{{ $cine->id }}</span></p>
            <p><strong>Ciudad:</strong> <span>{{ $cine->ciudad }}</span></p>
            <p><strong>País:</strong> <span>{{ $cine->pais }}</span></p>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('index.cines') }}" class="btn btn-return">⬅ Volver a la Lista</a>
        </div>
    </div>
</div>

<style>
    /* Estilos globales */
    body {
        background: linear-gradient(to right, #141e30, #243b55);
        color: #ffffff;
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
    }

    /* Contenedor principal */
    .details-card {
        background: linear-gradient(135deg, #1f1c2c, #928dab);
        max-width: 600px;
        width: 100%;
        color: #fff;
        border-radius: 15px;
        box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.5);
        text-align: center;
    }

    .title {
        font-size: 2.5rem;
        color: #e50914;
        font-weight: 700;
        text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
    }

    /* Detalles */
    .details-info {
        background: rgba(0, 0, 0, 0.6);
        border-radius: 10px;
        padding: 20px;
        box-shadow: inset 0px 4px 10px rgba(255, 255, 255, 0.1);
    }

    .details-info p {
        font-size: 1.2rem;
        margin: 15px 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .details-info p:last-child {
        border-bottom: none;
    }

    .details-info strong {
        color: #f3a712;
        font-size: 1.3rem;
    }

    .details-info span {
        font-size: 1.3rem;
        color: #ffffff;
        font-weight: bold;
        text-shadow: 0px 2px 4px rgba(0, 0, 0, 0.5);
    }

    /* Botón */
    .btn-return {
        display: inline-block;
        background: #e50914;
        color: #fff;
        padding: 12px 30px;
        font-size: 1.2rem;
        font-weight: 600;
        text-decoration: none;
        border-radius: 25px;
        transition: all 0.3s ease;
        box-shadow: 0px 8px 15px rgba(229, 9, 20, 0.4);
    }

    .btn-return:hover {
        background: #c40812;
        transform: translateY(-3px);
        box-shadow: 0px 12px 20px rgba(229, 9, 20, 0.6);
    }
</style>
@endsection
