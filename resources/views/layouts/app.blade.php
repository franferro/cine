<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cine Premium</title>
    
    <link rel="stylesheet" href="{{ asset('css/global.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/vistas.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}?v={{ time() }}">
</head>
<body>
<header>
    <div class="logo">
        <h2 class="logo-texto">CINE <span class="logo-destaque">TW</span></h2>
    </div>

    <nav class="nav-top">
        <div class="user-info user-sesion">
            
            @if(Session::has('usuario_dni'))
                <span class="saludo-texto">Hola, </span>
                <span class="saludo-nombre">{{ Session::get('usuario_nombre') }}</span>
                
                <span class="avatar-inicial">
                    {{ substr(Session::get('usuario_nombre'), 0, 1) }}
                </span>

                <a href="{{ url('/logout-manual') }}" class="btn-salir">Salir</a>
            
            @else
                <a href="{{ url('/login') }}">Iniciar Sesión</a>
            @endif
            
        </div>
    </nav>
</header>

    <div class="wrapper">
        <input type="checkbox" id="menuToggle" class="menu-checkbox" style="display: none;">

        <label for="menuToggle" class="btn-menu-movil"></label>

        <aside class="sidebar">
            <a href="{{ url('/inicio') }}">🏠 Inicio</a>
            <a href="{{ url('/sesiones') }}">📅 Sesiones</a>
            <a href="{{ url('/cartelera') }}">🎬 Cartelera</a>
            <a href="{{ url('/estrenos') }}">❗ Estrenos</a>
            <a href="{{ url('/reservas') }}">🎟️ Mis Reservas</a>
            <a href="{{ url('/perfil') }}">👤 Perfil</a>
            @if(Session::get('usuario_dni') === '12345678Z')
                <a href="{{ url('/cartelera/crear') }}" class="btn-admin-header">➕ Nueva Película</a>
                <a href="{{ url('/sesiones/crear') }}" class="btn-admin-header">➕ Nueva Sesión</a>
            @endif
        </aside>

        <main>
            @yield('content')
        </main>
    </div>

    <footer>
        <p>Cine Trigger Warning - 2026</p>
        <a href="contacto.php">Contacto</a> | 
        <a href="{{ asset('como_se_hizo.pdf') }}" target="_blank">Informe PDF</a>
    </footer>
</body>
</html>