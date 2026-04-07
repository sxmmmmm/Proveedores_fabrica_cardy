<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cardy - {{ $header ?? 'Panel de Control' }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            font-family: 'figtree', sans-serif;
            background-color: #f3f4f6;
        }

        .wrapper {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 280px;
            height: 100vh;
            background: linear-gradient(180deg, #1e3a8a 0%, #1e40af 100%);
            color: white;
            overflow-y: auto;
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);
            z-index: 1000;
        }

        .sidebar-header {
            padding: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-logo {
            width: 48px;
            height: 48px;
            background-color: #3b82f6;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 24px;
            color: white;
        }

        .sidebar-title {
            font-size: 20px;
            font-weight: bold;
            color: white;
        }

        .sidebar-subtitle {
            font-size: 12px;
            color: #93c5fd;
        }

        .sidebar-nav {
            padding-top: 24px;
            padding-bottom: 200px;
        }

        .sidebar-section {
            margin-top: 24px;
            margin-bottom: 12px;
        }

        .sidebar-section-title {
            padding-left: 24px;
            font-size: 11px;
            font-weight: 600;
            color: #93c5fd;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 24px;
            color: white;
            text-decoration: none;
            transition: background-color 0.2s;
            font-size: 14px;
        }

        .sidebar-link:hover {
            background-color: rgba(59, 130, 246, 0.3);
        }

        .sidebar-link.active {
            background-color: #1e3a8a;
            font-weight: 600;
        }

        .sidebar-link svg {
            width: 20px;
            height: 20px;
            stroke: currentColor;
            stroke-width: 2;
            fill: none;
            flex-shrink: 0;
        }

        .sidebar-user {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            width: 280px;
            background-color: #1e3a8a;
            border-top: 1px solid #1e40af;
            padding: 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        .sidebar-user-avatar {
            width: 40px;
            height: 40px;
            background-color: #3b82f6;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: white;
            font-size: 14px;
            flex-shrink: 0;
        }

        .sidebar-user-info {
            flex: 1;
            min-width: 0;
        }

        .sidebar-user-name {
            font-size: 13px;
            font-weight: 600;
            color: white;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .sidebar-user-role {
            font-size: 11px;
            color: #93c5fd;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .sidebar-logout {
            background: none;
            border: none;
            cursor: pointer;
            color: #93c5fd;
            transition: color 0.2s;
            padding: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .sidebar-logout:hover {
            color: white;
        }

        .sidebar-logout svg {
            width: 20px;
            height: 20px;
            stroke: currentColor;
            stroke-width: 2;
            fill: none;
        }

        .main-container {
            margin-left: 280px;
            display: flex;
            flex-direction: column;
            width: calc(100% - 280px);
            height: 100vh;
        }

        .header {
            background-color: white;
            border-bottom: 1px solid #e5e7eb;
            padding: 16px 24px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            flex-shrink: 0;
        }

        .header h1 {
            font-size: 24px;
            font-weight: 600;
            color: #111827;
        }

        .content {
            flex: 1;
            overflow-y: auto;
            padding: 24px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="sidebar-logo">C</div>
                <div>
                    <div class="sidebar-title">Cardy</div>
                    <div class="sidebar-subtitle">Fábrica de Zapatos</div>
                </div>
            </div>

            <nav class="sidebar-nav">
                <a href="{{ route('dashboard') }}" class="sidebar-link @if(request()->routeIs('dashboard')) active @endif">
                    <svg viewBox="0 0 24 24"><path d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9M9 21h6a2 2 0 002-2V9a2 2 0 00-2-2H9a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    <span>Dashboard</span>
                </a>

                <div class="sidebar-section">
                    <div class="sidebar-section-title">Inventario</div>
                    <a href="{{ route('productos.index') }}" class="sidebar-link @if(request()->routeIs('productos.*')) active @endif">
                        <svg viewBox="0 0 24 24"><path d="M20 7l-8-4-8 4m0 0l8-4m8 4v10l-8 4m0-10l-8 4m0-4v10a1 1 0 001 1h14a1 1 0 001-1V7"></path></svg>
                        <span>Productos</span>
                    </a>

                    <a href="{{ route('materias-primas.index') }}" class="sidebar-link @if(request()->routeIs('materias-primas.*')) active @endif">
                        <svg viewBox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 10h4a2 2 0 012 2v4a2 2 0 01-2 2h-4M9 10H5a2 2 0 00-2 2v4a2 2 0 002 2h4m0-12V5a2 2 0 012-2h4a2 2 0 012 2v4m-6 0h6"></path></svg>
                        <span>Materias Primas</span>
                    </a>
                </div>

                <div class="sidebar-section">
                    <div class="sidebar-section-title">Personas</div>
                    <a href="{{ route('empleados.index') }}" class="sidebar-link @if(request()->routeIs('empleados.*')) active @endif">
                        <svg viewBox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 10h4a2 2 0 012 2v4a2 2 0 01-2 2h-4M9 10H5a2 2 0 00-2 2v4a2 2 0 002 2h4m0-12V5a2 2 0 012-2h4a2 2 0 012 2v4m-6 0h6"></path></svg>
                        <span>Empleados</span>
                    </a>

                    <a href="{{ route('clientes.index') }}" class="sidebar-link @if(request()->routeIs('clientes.*')) active @endif">
                        <svg viewBox="0 0 24 24"><path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Clientes</span>
                    </a>
                </div>

                <div class="sidebar-section">
                    <div class="sidebar-section-title">Negocio</div>
                    <a href="{{ route('proveedores.index') }}" class="sidebar-link @if(request()->routeIs('proveedores.*')) active @endif">
                        <svg viewBox="0 0 24 24"><path d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Proveedores</span>
                    </a>
                </div>

                <div class="sidebar-section">
                    <div class="sidebar-section-title">Reportes</div>
                    <a href="{{ route('export.complete') }}" class="sidebar-link">
                        <svg viewBox="0 0 24 24"><path d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span>Descargar PDF</span>
                    </a>
                </div>
            </nav>

            <!-- User Section -->
            <div class="sidebar-user">
                <div class="sidebar-user-avatar">{{ substr(auth()->user()->name, 0, 1) }}</div>
                <div class="sidebar-user-info">
                    <div class="sidebar-user-name">{{ auth()->user()->name }}</div>
                    <div class="sidebar-user-role">{{ auth()->user()->role->name ?? 'Usuario' }}</div>
                </div>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="sidebar-logout" title="Cerrar sesión">
                        <svg viewBox="0 0 24 24"><path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="main-container">
            <!-- Header -->
            <div class="header">
                <h1>{{ $header ?? 'Panel de Control' }}</h1>
            </div>

            <!-- Content -->
            <div class="content">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>
</html>
