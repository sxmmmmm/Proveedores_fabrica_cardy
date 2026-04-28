<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Cardy') }} - {{ $pageTitle ?? ($header ?? 'Dashboard') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-pink-300">
        <div class="flex h-screen overflow-hidden">
            {{-- SIDEBAR: flex-col + h-screen para que ocupe toda la altura --}}
            <aside class="w-64 text-white shadow-lg flex flex-col h-screen flex-shrink-0" style="background: linear-gradient(to bottom, #f9a8b8, #fbc8d4);">

                {{-- LOGO + MARCA — fijo arriba, nunca se desplaza --}}
                <div class="flex-shrink-0 px-5 py-4 border-b border-pink-300">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/logocardy.jpg') }}"
                             alt="Logo Cardy"
                             class="rounded-lg object-contain flex-shrink-0"
                             style="height: 48px; width: 48px;">
                        <div class="min-w-0">
                            <h1 class="text-lg font-bold text-white leading-tight">Cardy</h1>
                            <p class="text-[11px] text-pink-100 leading-tight">Fábrica de Calzado</p>
                        </div>
                    </div>
                </div>

                {{-- NAV — ocupa el espacio restante y hace scroll internamente --}}
                <nav class="flex-1 overflow-y-auto py-4 pb-2">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 px-6 py-3 hover:bg-pink-300 transition-colors @if(request()->routeIs('dashboard')) bg-pink-300 border-r-4 @endif" style="@if(request()->routeIs('dashboard')) border-color: #4DC9C2; @endif">
                        <svg class="w-5 h-5 text-pink-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9M9 21h6a2 2 0 002-2V9a2 2 0 00-2-2H9a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <span class="font-medium text-white">Dashboard</span>
                    </a>

                    <div class="mt-6">
                        <p class="px-6 text-xs font-semibold uppercase tracking-wide text-white">Inventario</p>
                        <a href="{{ route('productos.index') }}" class="flex items-center space-x-3 px-6 py-2 mt-2 hover:bg-pink-300 transition-colors @if(request()->routeIs('productos.*')) bg-pink-300 @endif">
                            <svg class="w-4 h-4 text-pink-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m0 0l8-4m8 4v10l-8 4m0-10l-8 4m0-4v10a1 1 0 001 1h14a1 1 0 001-1V7"></path>
                            </svg>
                            <span class="text-sm text-white">Productos</span>
                        </a>
                        <a href="{{ route('materias-primas.index') }}" class="flex items-center space-x-3 px-6 py-2 mt-1 hover:bg-pink-300 transition-colors @if(request()->routeIs('materias-primas.*')) bg-pink-300 @endif">
                            <svg class="w-4 h-4 text-pink-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                            <span class="text-sm text-white">Materias Primas</span>
                        </a>
                    </div>

                    <div class="mt-6">
                        <p class="px-6 text-xs font-semibold uppercase tracking-wide text-white">Personas</p>
                        <a href="{{ route('empleados.index') }}" class="flex items-center space-x-3 px-6 py-2 mt-2 hover:bg-pink-300 transition-colors @if(request()->routeIs('empleados.*')) bg-pink-300 @endif">
                            <svg class="w-4 h-4 text-pink-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 10h4a2 2 0 012 2v4a2 2 0 01-2 2h-4M9 10H5a2 2 0 00-2 2v4a2 2 0 002 2h4m0-12V5a2 2 0 012-2h4a2 2 0 012 2v4m-6 0h6"></path>
                            </svg>
                            <span class="text-sm text-white">Empleados</span>
                        </a>
                        <a href="{{ route('clientes.index') }}" class="flex items-center space-x-3 px-6 py-2 mt-1 hover:bg-pink-300 transition-colors @if(request()->routeIs('clientes.*')) bg-pink-300 @endif">
                            <svg class="w-4 h-4 text-pink-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span class="text-sm text-white">Clientes</span>
                        </a>
                    </div>

                    <div class="mt-6">
                        <p class="px-6 text-xs font-semibold uppercase tracking-wide text-white">Movimientos</p>
                        <a href="{{ route('entradas-materia-prima.index') }}" class="flex items-center space-x-3 px-6 py-2 mt-2 hover:bg-pink-300 transition-colors @if(request()->routeIs('entradas-materia-prima.*')) bg-pink-300 @endif">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            <span class="text-sm text-white">Entrada Materias Primas</span>
                        </a>
                        <a href="{{ route('salidas-materia-prima.index') }}" class="flex items-center space-x-3 px-6 py-2 mt-1 hover:bg-pink-300 transition-colors @if(request()->routeIs('salidas-materia-prima.*')) bg-pink-300 @endif">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                            </svg>
                            <span class="text-sm text-white">Salida Materias Primas</span>
                        </a>
                        <a href="{{ route('salidas-productos.index') }}" class="flex items-center space-x-3 px-6 py-2 mt-1 hover:bg-pink-300 transition-colors @if(request()->routeIs('salidas-productos.*')) bg-pink-300 @endif">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                            <span class="text-sm text-white">Salida Productos</span>
                        </a>
                    </div>

                    <div class="mt-6 border-t border-pink-300 pt-4">
                        <p class="px-6 text-xs font-semibold uppercase tracking-wide text-white">Administración</p>
                        <a href="{{ route('roles.management') }}" class="flex items-center space-x-3 px-6 py-2 mt-2 hover:bg-pink-300 transition-colors @if(request()->routeIs('roles.management')) bg-pink-300 @endif">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                            <span class="text-sm text-white font-medium">Gestión de Roles</span>
                        </a>
                    </div>
                </nav>

                {{-- PERFIL DE USUARIO — fijo en la parte inferior, nunca se desplaza --}}
                <div class="flex-shrink-0 border-t border-pink-300 p-4" style="background: linear-gradient(to bottom, #f9a8b8, #f4a0b2);">
                    <div class="flex items-center justify-between gap-2">
                        <div class="flex items-center gap-2 min-w-0 flex-1">
                            {{-- Avatar con inicial --}}
                            <div class="w-9 h-9 rounded-full flex-shrink-0 flex items-center justify-center border-2 text-white font-bold text-sm"
                                 style="background-color: #4DC9C2; border-color: #3db5ae;">
                                {{ auth()->check() ? strtoupper(substr(auth()->user()->name, 0, 1)) : '?' }}
                            </div>
                            {{-- Datos del usuario --}}
                            <div class="min-w-0 flex-1">
                                <p class="text-sm font-semibold text-white truncate leading-tight">
                                    {{ auth()->user()->name ?? 'Usuario' }}
                                </p>
                                <p class="text-[10px] uppercase font-bold text-pink-100 leading-tight">
                                    {{ auth()->user()->role->name ?? 'Sin rol' }}
                                </p>
                                <p class="text-[10px] text-pink-200 truncate">
                                    {{ auth()->user()->email ?? '' }}
                                </p>
                            </div>
                        </div>
                        {{-- Botón logout --}}
                        <form action="{{ route('logout') }}" method="POST" class="flex-shrink-0">
                            @csrf
                            <button type="submit"
                                    title="Cerrar sesión"
                                    class="text-pink-100 hover:text-white transition-colors p-1 rounded hover:bg-pink-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </aside>

            <div class="flex-1 flex flex-col overflow-hidden min-w-0">
                <header class="flex-shrink-0 bg-white shadow-sm border-b border-gray-200">
                    <div class="max-w-full mx-auto py-4 px-6">
                        <h1 class="text-2xl font-semibold text-gray-900">{{ $header ?? 'Panel de Control' }}</h1>
                    </div>
                </header>
                <main class="flex-1 overflow-y-auto bg-gray-50">
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