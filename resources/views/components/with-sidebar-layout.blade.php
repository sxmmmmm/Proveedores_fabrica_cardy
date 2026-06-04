<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Cardy') }} - {{ $header ?? 'Panel de Control' }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            * { box-sizing: border-box; }
            body {
                margin: 0;
                padding: 0;
                overflow: hidden;
            }

            /* ── Sidebar ── */
            .sidebar {
                position: fixed;
                left: 0;
                top: 0;
                width: 256px;
                height: 100vh;
                display: flex;
                flex-direction: column;
                z-index: 1000;
                background: linear-gradient(180deg, #D11A7A 0%, #E05C7A 100%);
            }

            /* ── Nav scrolls independently ── */
            .sidebar-nav {
                flex: 1;
                overflow-y: auto;
                scrollbar-width: thin;
                scrollbar-color: rgba(255,255,255,0.25) transparent;
            }
            .sidebar-nav::-webkit-scrollbar { width: 3px; }
            .sidebar-nav::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.25); border-radius: 2px; }

            /* ── User footer ── */
            .sidebar-user-footer {
                flex-shrink: 0;
                border-top: 1px solid rgba(255,255,255,0.15);
                background-color: rgba(0,0,0,0.18);
                padding: 12px 16px;
            }

            .main-content {
                margin-left: 256px;
                height: 100vh;
                display: flex;
                flex-direction: column;
            }
            .header { flex-shrink: 0; }
            .content { flex: 1; overflow-y: auto; }

            .sidebar-link-active {
                background-color: rgba(20, 184, 166, 0.25) !important;
                border-left: 3px solid #14B8A6;
                padding-left: calc(1.5rem - 3px) !important;
            }
            .sidebar-link-hover:hover {
                background-color: rgba(255, 255, 255, 0.12);
            }

            [x-cloak] { display: none !important; }
        </style>
    </head>
    <body class="font-sans antialiased bg-gray-50">
        <!-- Sidebar -->
        <aside class="sidebar text-white shadow-lg">
            <div class="p-6 border-b" style="border-bottom-color: rgba(255, 255, 255, 0.15); flex-shrink: 0;">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center font-bold text-lg" style="color: #D11A7A;">
                        C
                    </div>
                    <div>
                        <h1 class="text-xl font-bold">Cardy</h1>
                        <p class="text-xs opacity-80">Fábrica de Zapatos</p>
                    </div>
                </div>
            </div>

            <nav class="sidebar-nav mt-4">
                <a href="{{ route('dashboard') }}"
                   class="flex items-center space-x-3 px-6 py-3 transition-colors
                          @if(request()->routeIs('dashboard')) sidebar-link-active @else sidebar-link-hover @endif">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9M9 21h6a2 2 0 002-2V9a2 2 0 00-2-2H9a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span>Dashboard</span>
                </a>

                <!-- Inventario (admin) -->
                @if(auth()->user()->isAdmin())
                <div class="mt-6">
                    <p class="px-6 text-xs font-semibold opacity-70 uppercase tracking-wide">Inventario</p>
                    <a href="{{ route('productos.index') }}"
                       class="flex items-center space-x-3 px-6 py-2 mt-2 transition-colors
                              @if(request()->routeIs('productos.*')) sidebar-link-active @else sidebar-link-hover @endif">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M20 7l-8-4-8 4m0 0l8-4m8 4v10l-8 4m0-10l-8 4m0-4v10a1 1 0 001 1h14a1 1 0 001-1V7"/>
                        </svg>
                        <span class="text-sm">Productos</span>
                    </a>
                    <a href="{{ route('materias-primas.index') }}"
                       class="flex items-center space-x-3 px-6 py-2 mt-1 transition-colors
                              @if(request()->routeIs('materias-primas.*')) sidebar-link-active @else sidebar-link-hover @endif">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                        </svg>
                        <span class="text-sm">Materias Primas</span>
                    </a>
                </div>
                @endif

                <!-- Personas -->
                <div class="mt-6">
                    <p class="px-6 text-xs font-semibold opacity-70 uppercase tracking-wide">Personas</p>
                    <a href="{{ route('empleados.index') }}"
                       class="flex items-center space-x-3 px-6 py-2 mt-2 transition-colors
                              @if(request()->routeIs('empleados.*')) sidebar-link-active @else sidebar-link-hover @endif">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 10h4a2 2 0 012 2v4a2 2 0 01-2 2h-4M9 10H5a2 2 0 00-2 2v4a2 2 0 002 2h4m0-12V5a2 2 0 012-2h4a2 2 0 012 2v4m-6 0h6"/>
                        </svg>
                        <span class="text-sm">Empleados</span>
                    </a>
                    @if(auth()->user()->isAdmin())
                    <a href="{{ route('clientes.index') }}"
                       class="flex items-center space-x-3 px-6 py-2 mt-1 transition-colors
                              @if(request()->routeIs('clientes.*')) sidebar-link-active @else sidebar-link-hover @endif">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <span class="text-sm">Clientes</span>
                    </a>
                    @endif
                </div>

                <!-- Inventario para empleado -->
                @if(auth()->user()->isEmployee())
                <div class="mt-6">
                    <p class="px-6 text-xs font-semibold opacity-70 uppercase tracking-wide">Inventario</p>
                    <a href="{{ route('materias-primas.index') }}"
                       class="flex items-center space-x-3 px-6 py-2 mt-2 transition-colors
                              @if(request()->routeIs('materias-primas.*')) sidebar-link-active @else sidebar-link-hover @endif">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                        </svg>
                        <span class="text-sm">Materias Primas</span>
                    </a>
                </div>
                @endif

                <!-- Negocio (admin) -->
                @if(auth()->user()->isAdmin())
                <div class="mt-6">
                    <p class="px-6 text-xs font-semibold opacity-70 uppercase tracking-wide">Negocio</p>
                    <a href="{{ route('proveedores.index') }}"
                       class="flex items-center space-x-3 px-6 py-2 mt-2 transition-colors
                              @if(request()->routeIs('proveedores.*')) sidebar-link-active @else sidebar-link-hover @endif">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-sm">Proveedores</span>
                    </a>
                </div>

                <!-- Movimientos (admin) -->
                <div class="mt-6">
                    <p class="px-6 text-xs font-semibold opacity-70 uppercase tracking-wide">Movimientos</p>
                    <a href="{{ route('entradas-materia-prima.index') }}"
                       class="flex items-center space-x-3 px-6 py-2 mt-2 transition-colors
                              @if(request()->routeIs('entradas-materia-prima.*')) sidebar-link-active @else sidebar-link-hover @endif">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        <span class="text-sm">Entrada Mat. Primas</span>
                    </a>
                    <a href="{{ route('salidas-materia-prima.index') }}"
                       class="flex items-center space-x-3 px-6 py-2 mt-1 transition-colors
                              @if(request()->routeIs('salidas-materia-prima.*')) sidebar-link-active @else sidebar-link-hover @endif">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                        </svg>
                        <span class="text-sm">Salida Mat. Primas</span>
                    </a>
                    <a href="{{ route('salidas-productos.index') }}"
                       class="flex items-center space-x-3 px-6 py-2 mt-1 transition-colors
                              @if(request()->routeIs('salidas-productos.*')) sidebar-link-active @else sidebar-link-hover @endif">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                        <span class="text-sm">Salida Productos</span>
                    </a>
                </div>

                <!-- Administración (admin) -->
                <div class="mt-6">
                    <p class="px-6 text-xs font-semibold opacity-70 uppercase tracking-wide">Administración</p>
                    <a href="{{ route('roles.management') }}"
                       class="flex items-center space-x-3 px-6 py-2 mt-2 transition-colors
                              @if(request()->routeIs('roles.*') || request()->routeIs('users.*')) sidebar-link-active @else sidebar-link-hover @endif">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                        </svg>
                        <span class="text-sm">Gestión de Roles</span>
                    </a>
                </div>

                <!-- Reportes (admin) -->
                <div class="mt-6 pb-32">
                    <p class="px-6 text-xs font-semibold opacity-70 uppercase tracking-wide">Reportes</p>
                    <a href="{{ route('export.complete') }}"
                       class="flex items-center space-x-3 px-6 py-2 mt-2 transition-colors sidebar-link-hover">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <span class="text-sm">Descargar PDF</span>
                    </a>
                </div>
                @endif

            </nav>

            <!-- User footer -->
            <div class="sidebar-user-footer">
                <div class="flex items-center gap-3">
                    <div style="width:36px;height:36px;min-width:36px;border-radius:50%;background:#14B8A6;border:2px solid rgba(255,255,255,0.4);display:flex;align-items:center;justify-content:center;font-size:0.85rem;font-weight:700;color:#fff;flex-shrink:0;">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-white truncate leading-tight">{{ auth()->user()->name }}</p>
                        <p class="text-xs truncate" style="opacity:0.75; color: #fde8f0;">{{ auth()->user()->role->name ?? 'Usuario' }}</p>
                        <p class="text-xs truncate" style="opacity:0.55; color: #fde8f0; font-size:0.65rem;">{{ auth()->user()->email }}</p>
                    </div>
                    <form action="{{ route('logout') }}" method="POST" style="flex-shrink:0;">
                        @csrf
                        <button type="submit"
                                title="Cerrar sesión"
                                style="background:none;border:none;cursor:pointer;color:rgba(255,255,255,0.6);padding:6px;border-radius:8px;display:flex;align-items:center;transition:background 0.15s,color 0.15s;"
                                onmouseover="this.style.background='rgba(255,255,255,0.12)';this.style.color='#fff'"
                                onmouseout="this.style.background='none';this.style.color='rgba(255,255,255,0.6)'">
                            <svg style="width:18px;height:18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <header class="header bg-white shadow-sm border-b border-gray-200">
                <div class="max-w-full mx-auto py-4 px-6">
                    <h1 class="text-2xl font-semibold text-gray-900">{{ $header ?? 'Panel de Control' }}</h1>
                </div>
            </header>
            <main class="content p-6 bg-gray-50">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
