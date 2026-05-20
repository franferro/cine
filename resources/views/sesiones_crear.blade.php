@extends('layouts.app')

@section('title', 'Nueva Sesión')

@section('content')
<div class="admin-form-contenedor">
    
    <div class="admin-form-encabezado">
        <h1>📅 Programación</h1>
        <p>Configurar nueva sesión de proyección</p>
    </div>

    {{-- Formulario dentro de tarjeta blanca --}}
    <div class="admin-form-cuerpo">
        <form action="{{ url('/sesiones/guardar') }}" method="POST">
            @csrf
            
            <div class="form-grupo form-espaciado">
                <label>ID de la Película</label>
                <input type="number" name="id_pelicula" required placeholder="Ej: 5" class="form-input input-premium">
            </div>

            <div class="form-grupo form-espaciado">
                <label>Número de Sala</label>
                <input type="number" name="id_sala" required placeholder="Ej: 1" class="form-input input-premium">
            </div>

            <div class="form-grupo form-espaciado-lg">
                <label>Fecha y Hora de Inicio</label>
                <input type="datetime-local" name="hora_inicio" required class="form-input input-premium">
            </div>

            {{-- Botonera final --}}
            <div class="form-acciones-vertical">
                <button type="submit" class="btn-principal">
                    Publicar Sesión
                </button>
                
                <a href="{{ url('/sesiones') }}" class="btn-cancelar">
                    Cancelar
                </a>
            </div>
        </form>
    </div>

</div>
@endsection