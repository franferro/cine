@extends('layouts.app')

@section('title', $pelicula->titulo . ' - Detalles')

@section('content')
<div class="detalle-contenedor card">
    {{-- Encabezado con el título --}}
    <div class="detalle-encabezado">
        <h1>🎬 Detalle de la Película</h1>
    </div>

    <div class="detalle-grid">
        
        {{-- Columna Izquierda: El Cartel --}}
        <div class="detalle-columna-izq">
            <div class="detalle-cartel-wrapper">
                <img src="{{ asset('carteles/' . $pelicula->foto_cartel) }}" 
                     alt="{{ $pelicula->titulo }}" 
                     class="detalle-cartel-img">
                
                <div class="detalle-duracion">
                    <span class="duracion-label">Duración</span>
                    <span class="duracion-valor">⏳ {{ $pelicula->duracion }} min</span>
                </div>
            </div>
        </div>

        {{-- Columna Derecha: Info y Sesiones --}}
        <div class="detalle-columna-der">
            <h2 class="detalle-titulo-pelicula">{{ $pelicula->titulo }}</h2>
            
            <div class="detalle-tags">
                </div>

            <div class="detalle-sinopsis-bloque">
                <h3>Sinopsis</h3>
                <p>{{ $pelicula->sinopsis }}</p>
            </div>

            {{-- Sección de Horarios --}}
            <div class="detalle-sesiones-bloque">
                <h4>🎟️ Selecciona tu sesión:</h4>

                <div class="sesiones-lista">
                    @forelse($pelicula->sesiones->where('hora_inicio', '>=', now()->toDateTimeString()) as $sesion)
                        <div class="sesion-item">
                            <div class="sesion-hora">
                                {{ \Carbon\Carbon::parse($sesion->hora_inicio)->format('H:i') }}
                            </div>
                            
                            <a href="/comprar/{{ $sesion->id_sesion }}" class="btn-comprar-enlace">
                                <button class="btn-comprar">COMPRAR</button>
                            </a>
                        </div>
                    @empty
                        <p class="sesiones-vacias">No hay sesiones programadas para esta película.</p>
                    @endforelse
                </div>
            </div>

            <div class="detalle-volver">
                <a href="/cartelera">⬅ VolVER A LA CARTELERA</a>
            </div>
        </div>
    </div>
</div>
@endsection