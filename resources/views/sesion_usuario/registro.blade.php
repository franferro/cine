@extends('layouts.app')

@section('title', 'Registro de Usuario')

@section('content')
<div class="auth-contenedor">
    <div class="card auth-card registro-card">
        <div class="auth-cabecera">
            <h2>📝 Nueva Cuenta</h2>
            <p>Únete a Cine TW para gestionar tus reservas</p>
        </div>

        <form action="{{ url('/registro') }}" method="POST" class="auth-formulario">
            @csrf
            
            <div class="form-grid-2">
                <div class="form-grupo">
                    <label>DNI</label>
                    <input type="text" name="dni" maxlength="9" placeholder="77777777A" required class="form-input" value="{{ old('dni') }}">
                    {{-- Alerta de DNI repetido --}}
                    @error('dni')
                        <div style="color: #dc3545; font-size: 0.85em; margin-top: 5px;">⚠️ {{ $message }}</div>
                    @enderror
                </div>
                <div class="form-grupo">
                    <label>Usuario</label>
                    <input type="text" name="username" maxlength="10" placeholder="Máx. 10 letras" required class="form-input" value="{{ old('username') }}">
                </div>
            </div>

            <div class="form-grupo">
                <label>Correo Electrónico</label>
                <input type="email" name="email" required placeholder="tuemail@ejemplo.com" class="form-input" value="{{ old('email') }}">
                {{-- Alerta de Email repetido --}}
                @error('email')
                    <div style="color: #dc3545; font-size: 0.85em; margin-top: 5px;">⚠️ {{ $message }}</div>
                @enderror
            </div>

            <div class="form-grupo">
                <label>Contraseña</label>
                <input type="password" name="password" maxlength="25" required placeholder="••••••••" class="form-input">
            </div>

            <button type="submit" class="btn-principal">Crear Cuenta</button>
        </form>

        <div class="auth-pie">
            <a href="{{ url('/login') }}" class="enlace-volver">⬅️ Volver al inicio de sesión</a>
        </div>
    </div>
</div>
@endsection