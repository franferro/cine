@extends('layouts.app')

@section('title', 'Añadir Nueva Película')

@section('content')
<div class="admin-form-contenedor panel-ancho">
    
    {{-- Encabezado Estilo TW --}}
    <div class="admin-form-encabezado">
        <h1>🎥 Panel de Control</h1>
        <p>Añadir nueva pieza a la cartelera</p>
    </div>

    {{-- Formulario dentro de tarjeta blanca --}}
    <div class="admin-form-cuerpo">
        <form action="/cartelera/guardar" method="POST">
            @csrf
            
            <div class="form-grupo form-espaciado">
                <label>Título de la Obra</label>
                <input type="text" name="titulo" required placeholder="Ej: Pulp Fiction" class="form-input input-premium">
            </div>
            
            <div class="form-grupo form-espaciado">
                <label>Sinopsis / Argumento</label>
                <textarea name="sinopsis" rows="4" placeholder="Escribe aquí de qué trata la película..." class="form-input input-premium textarea-premium"></textarea>
            </div>
            
            <div class="form-grid-2 form-espaciado-lg">
                <div class="form-grupo">
                    <label>Duración (min)</label>
                    <input type="number" name="duracion" placeholder="120" class="form-input input-premium">
                </div>
                
                <div class="form-grupo">
                    <label>Archivo Cartel</label>
                    <input type="text" name="foto_cartel" placeholder="ej: matrix.jpg" class="form-input input-premium">
                </div>
            </div>
            
            {{-- Botones del final --}}
            <div class="form-acciones-vertical">
                <button type="submit" class="btn-principal">
                    💾 GUARDAR EN BASE DE DATOS
                </button>
                
                <a href="/cartelera" class="btn-cancelar">
                    ❌ CANCELAR Y VOLVER
                </a>
            </div>
        </form>
    </div>
</div>
@endsection