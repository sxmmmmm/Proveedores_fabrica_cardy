<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Cardy') }} - {{ $header ?? 'Dashboard' }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="flex h-screen">
            <aside class="w-64 bg-gradient-to-b from-blue-900 to-blue-800 text-white shadow-lg relative flex flex-col">
                <div class="p-6">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center font-bold text-lg">
                            C
                        </div>
                        <div>
                            <h1 class="text-xl font-bold">Cardy</h1>
                            <p class="text-xs text-blue-200">Gestión de Fábrica</p>
                        </div>
                    </div>
                </div>

                <nav class="mt-4 flex-1 overflow-y-auto">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 px-6 py-3 hover:bg-blue-700 transition-colors @if(request()->routeIs('dashboard')) bg-blue-700 @endif">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9M9 21h6a2 2 0 002-2V9a2 2 0 00-2-2H9a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <span>Dashboard</span>
                    </a>

                    <div class="mt-6">
                        <p class="px-6 text-xs font-semibold text-blue-300 uppercase tracking-wide">Inventario</p>
                        <a href="{{ route('productos.index') }}" class="flex items-center space-x-3 px-6 py-2 mt-2 hover:bg-blue-700 transition-colors @if(request()->routeIs('productos.*')) bg-blue-700 @endif">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m0 0l8-4m8 4v10l-8 4m0-10l-8 4m0-4v10a1 1 0 001 1h14a1 1 0 001-1V7"></path>
                            </svg>
                            <span class="text-sm">Productos</span>
                        </a>

                        <a href="{{ route('materias-primas.index') }}" class="flex items-center space-x-3 px-6 py-2 mt-2 hover:bg-blue-700 transition-colors @if(request()->routeIs('materias-primas.*')) bg-blue-700 @endif">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                            <span class="text-sm">Materias Primas</span>
                        </a>
                    </div>

                    <div class="mt-6">
                        <p class="px-6 text-xs font-semibold text-blue-300 uppercase tracking-wide">Personas</p>
                        <a href="{{ route('empleados.index') }}" class="flex items-center space-x-3 px-6 py-2 mt-2 hover:bg-blue-700 transition-colors @if(request()->routeIs('empleados.*')) bg-blue-700 @endif">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 10h4a2 2 0 012 2v4a2 2 0 01-2 2h-4M9 10H5a2 2 0 00-2 2v4a2 2 0 002 2h4m0-12V5a2 2 0 012-2h4a2 2 0 012 2v4m-6 0h6"></path>
                            </svg>
                            <span class="text-sm">Empleados</span>
                        </a>

                        <a href="{{ route('clientes.index') }}" class="flex items-center space-x-3 px-6 py-2 mt-2 hover:bg-blue-700 transition-colors @if(request()->routeIs('clientes.*')) bg-blue-700 @endif">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span class="text-sm">Clientes</span>
                        </a>
                    </div>

                    {{-- SECCIÓN ADMINISTRACIÓN - AHORA SIEMPRE VISIBLE --}}
                    <div class="mt-6 border-t border-blue-700 pt-4">
                        <p class="px-6 text-xs font-semibold text-orange-300 uppercase tracking-wide">Administración</p>
                        
                        <a href="{{ route('users.index') }}" class="flex items-center space-x-3 px-6 py-2 mt-2 hover:bg-blue-700 transition-colors @if(request()->routeIs('users.index')) bg-blue-700 @endif">
                            <svg class="w-4 h-4 text-orange-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                            <span class="text-sm">Lista de Usuarios</span>
                        </a>

                        <a href="{{ route('users.create') }}" class="flex items-center space-x-3 px-6 py-2 mt-1 hover:bg-blue-700 transition-colors @if(request()->routeIs('users.create')) bg-blue-700 @endif">
                            <svg class="w-4 h-4 text-orange-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                            <span class="text-sm">Crear Nuevo Usuario</span>
                        </a>
                    </div>
                </nav>

                <div class="bg-blue-800 border-t border-blue-700">
                    <div class="p-4">
                        <div class="flex items-center justify-between group">
                            <div class="flex items-center space-x-3 flex-1 min-w-0">
                                <div class="w-9 h-9 bg-blue-500 rounded-full flex items-center justify-center border-2 border-blue-400">
                                    <span class="text-sm font-bold">{{ auth()->check() ? strtoupper(substr(auth()->user()->name, 0, 1)) : '?' }}</span>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-semibold truncate leading-tight">{{ auth()->user()->name ?? 'Invitado' }}</p>
                                    <p class="text-[10px] text-blue-300 uppercase tracking-tighter font-bold">
                                        {{ auth()->user()->role->name ?? 'Sin rol' }}
                                    </p>
                                    <p class="text-[10px] text-blue-400 truncate">{{ auth()->user()->email ?? '' }}</p>
                                </div>
                            </div>
                            <form action="{{ route('logout') }}" method="POST" class="ml-2">
                                @csrf
                                <button type="submit" class="text-blue-300 hover:text-red-400 transition-colors p-1" title="Cerrar sesión">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </aside>

            <div class="flex-1 flex flex-col overflow-hidden">
                <header class="bg-white shadow-sm border-b border-gray-200">
                    <div class="max-w-full mx-auto py-4 px-6">
                        <h1 class="text-2xl font-semibold text-gray-900">{{ $header ?? 'Panel de Control' }}</h1>
                    </div>
                </header>

                <main class="flex-1 overflow-y-auto p-6 bg-gray-50">
                    @if(isset($slot))
                        {{ $slot }}
                    @else
                        @yield('content')
                    @endif
                </main>
            </div>
        </div>
    </body>
</html>