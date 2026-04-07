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
            <!-- Sidebar -->
            <aside class="w-64 bg-gradient-to-b from-blue-900 to-blue-800 text-white shadow-lg">
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

                <nav class="mt-8">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 px-6 py-3 hover:bg-blue-700 transition-colors @if(request()->routeIs('dashboard')) bg-blue-700 @endif">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9M9 21h6a2 2 0 002-2V9a2 2 0 00-2-2H9a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <span>Dashboard</span>
                    </a>

                    <!-- Sección de Inventario -->
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 10h4a2 2 0 012 2v4a2 2 0 01-2 2h-4M9 10H5a2 2 0 00-2 2v4a2 2 0 002 2h4m0-12V5a2 2 0 012-2h4a2 2 0 012 2v4m-6 0h6"></path>
                            </svg>
                            <span class="text-sm">Materias Primas</span>
                        </a>
                    </div>

                    <!-- Sección de Personas -->
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-sm">Clientes</span>
                        </a>
                    </div>

                    <!-- Sección de Negocio -->
                    <div class="mt-6">
                        <p class="px-6 text-xs font-semibold text-blue-300 uppercase tracking-wide">Negocio</p>
                        <a href="{{ route('proveedores.index') }}" class="flex items-center space-x-3 px-6 py-2 mt-2 hover:bg-blue-700 transition-colors @if(request()->routeIs('proveedores.*')) bg-blue-700 @endif">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-sm">Proveedores</span>
                        </a>
                    </div>

                    <!-- Sección de Reportes -->
                    <div class="mt-6">
                        <p class="px-6 text-xs font-semibold text-blue-300 uppercase tracking-wide">Reportes</p>
                        <a href="{{ route('export.complete') }}" class="flex items-center space-x-3 px-6 py-2 mt-2 hover:bg-blue-700 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <span class="text-sm">Descargar PDF</span>
                        </a>
                    </div>
                </nav>

                <!-- User Section at bottom -->
                <div class="absolute bottom-0 left-0 right-0 bg-blue-800 border-t border-blue-700">
                    <div class="p-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3 flex-1">
                                <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center">
                                    <span class="text-sm font-bold">{{ substr(auth()->user()->name, 0, 1) }}</span>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-semibold truncate">{{ auth()->user()->name }}</p>
                                    <p class="text-xs text-blue-300 truncate">{{ auth()->user()->role->name ?? 'Sin rol' }}</p>
                                </div>
                            </div>
                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="text-blue-300 hover:text-white transition-colors" title="Cerrar sesión">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Main Content -->
            <div class="flex-1 flex flex-col overflow-hidden">
                <!-- Header -->
                <header class="bg-white shadow-sm border-b border-gray-200">
                    <div class="max-w-full mx-auto py-4 px-6">
                        <h1 class="text-2xl font-semibold text-gray-900">{{ $header ?? 'Panel de Control' }}</h1>
                    </div>
                </header>

                <!-- Content -->
                <main class="flex-1 overflow-y-auto p-6">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
