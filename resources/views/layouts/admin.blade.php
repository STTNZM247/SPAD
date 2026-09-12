<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel Admin - SPAD')</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('img/logo-s-blanco.svg') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="min-h-screen flex">
        <!-- Sidebar lateral -->
        <aside class="w-64 bg-gray-900 text-white flex flex-col">
            <!-- Cabecera del Sidebar con tu Logo y Título -->
            <div class="p-5 flex items-center space-x-3 border-b border-gray-800">
                <img src="{{ asset('img/logo-s-blanco.svg') }}" class="w-8 h-8 object-contain" alt="Logo SPAD">
                <span class="text-xl font-bold tracking-wider">SPAD</span>
            </div>

            <!-- Navegación -->
            <nav class="flex-1 p-4 space-y-2">
                <!-- Botón de Gestión de Usuarios (Icono centrado arriba y texto abajo) -->
                <a href="{{ route('admin.test-db') }}" class="flex flex-col items-center justify-center p-3 rounded-xl bg-gray-800/60 hover:bg-gray-800 border border-gray-700/50 transition group text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-people-fill mb-1.5 text-cyan-400 group-hover:scale-110 transition-transform" viewBox="0 0 16 16">
                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                    </svg>
                    <span class="text-xs font-medium tracking-wide text-gray-200">Gestión de Usuarios</span>
                </a>
            </nav>

            <!-- Sección inferior: Cerrar Sesión -->
            <div class="p-4 border-t border-gray-800">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 rounded-lg text-red-400 hover:bg-gray-800 transition text-sm font-medium">
                        Cerrar Sesión
                    </button>
                </form>
            </div>
        </aside>

        <!-- Contenido Principal -->
        <div class="flex-1 flex flex-col">
            <!-- Barra superior -->
            <header class="bg-white shadow px-6 py-4 flex justify-between items-center">
                <h1 class="text-xl font-semibold text-gray-800">@yield('header', 'Bienvenido')</h1>
                <span class="text-sm font-medium text-gray-600 bg-gray-100 px-3 py-1 rounded-full border border-gray-200">{{ Auth::user()->nombre ?? 'Administrador' }}</span>
            </header>

            <!-- Cuerpo dinámico de las vistas -->
            <main class="p-6 flex-1">
                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>