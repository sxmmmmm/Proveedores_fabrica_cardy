<x-with-sidebar-layout>
    <x-slot name="header">
        FÁBRICA CARDY - Dashboard
    </x-slot>

    <div class="min-h-full">
        <!-- Header Welcome -->
        <div class="mb-8">
            <h2 class="text-4xl font-bold text-gray-900">¡Bienvenido a Cardy!</h2>
            <p class="text-gray-500 mt-2 text-lg">Panel de control de la fábrica de zapatos</p>
        </div>

        <!-- KPI Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Productos -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow" style="border-left: 4px solid #14B8A6;">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-xs font-semibold uppercase tracking-wide">Productos</p>
                        <p class="text-4xl font-bold mt-2" style="color: #14B8A6;">{{ \App\Models\Producto::count() }}</p>
                        <p class="text-xs text-gray-400 mt-1">Total en inventario</p>
                    </div>
                    <div class="rounded-xl p-3" style="background: rgba(20,184,166,0.08);">
                        <svg class="w-8 h-8" stroke="currentColor" viewBox="0 0 24 24" style="color: #14B8A6;" fill="none">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M20 7l-8-4-8 4m0 0l8-4m8 4v10l-8 4m0-10l-8 4m0-4v10a1 1 0 001 1h14a1 1 0 001-1V7"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Materias Primas -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow" style="border-left: 4px solid #D11A7A;">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-xs font-semibold uppercase tracking-wide">Materias Primas</p>
                        <p class="text-4xl font-bold mt-2" style="color: #D11A7A;">{{ \App\Models\MateriaPrima::count() }}</p>
                        <p class="text-xs text-gray-400 mt-1">Tipos de materiales</p>
                    </div>
                    <div class="rounded-xl p-3" style="background: rgba(209,26,122,0.08);">
                        <svg class="w-8 h-8" stroke="currentColor" viewBox="0 0 24 24" style="color: #D11A7A;" fill="none">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Empleados -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow" style="border-left: 4px solid #14B8A6;">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-xs font-semibold uppercase tracking-wide">Empleados</p>
                        <p class="text-4xl font-bold mt-2" style="color: #14B8A6;">{{ \App\Models\Empleado::count() }}</p>
                        <p class="text-xs text-gray-400 mt-1">En la empresa</p>
                    </div>
                    <div class="rounded-xl p-3" style="background: rgba(20,184,166,0.08);">
                        <svg class="w-8 h-8" stroke="currentColor" viewBox="0 0 24 24" style="color: #14B8A6;" fill="none">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 10h4a2 2 0 012 2v4a2 2 0 01-2 2h-4M9 10H5a2 2 0 00-2 2v4a2 2 0 002 2h4m0-12V5a2 2 0 012-2h4a2 2 0 012 2v4m-6 0h6"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Proveedores -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow" style="border-left: 4px solid #D11A7A;">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-xs font-semibold uppercase tracking-wide">Proveedores</p>
                        <p class="text-4xl font-bold mt-2" style="color: #D11A7A;">{{ \App\Models\Proveedor::count() }}</p>
                        <p class="text-xs text-gray-400 mt-1">Activos</p>
                    </div>
                    <div class="rounded-xl p-3" style="background: rgba(209,26,122,0.08);">
                        <svg class="w-8 h-8" stroke="currentColor" viewBox="0 0 24 24" style="color: #D11A7A;" fill="none">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Acciones Rápidas -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-8">
            <h3 class="text-lg font-bold text-gray-900 mb-5">Acciones Rápidas</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <a href="{{ route('empleados.create') }}"
                   class="inline-flex items-center justify-center gap-3 px-5 py-4 rounded-xl text-white font-semibold transition hover:opacity-90 shadow-sm"
                   style="background: linear-gradient(135deg, #14B8A6, #0d9488);">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Agregar Empleado
                </a>
                <a href="{{ route('productos.create') }}"
                   class="inline-flex items-center justify-center gap-3 px-5 py-4 rounded-xl text-white font-semibold transition hover:opacity-90 shadow-sm"
                   style="background: linear-gradient(135deg, #D11A7A, #E05C7A);">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Nuevo Producto
                </a>
                <a href="{{ route('materias-primas.create') }}"
                   class="inline-flex items-center justify-center gap-3 px-5 py-4 rounded-xl text-white font-semibold transition hover:opacity-90 shadow-sm"
                   style="background: linear-gradient(135deg, #14B8A6, #0d9488);">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Materia Prima
                </a>
                <a href="{{ route('export.complete') }}"
                   class="inline-flex items-center justify-center gap-3 px-5 py-4 rounded-xl text-white font-semibold transition hover:opacity-90 shadow-sm"
                   style="background: linear-gradient(135deg, #D11A7A, #E05C7A);">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Descargar PDF
                </a>
            </div>
        </div>

        <!-- Últimos Registros -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <!-- Últimos Empleados -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 text-white" style="background: linear-gradient(135deg, #14B8A6, #0d9488);">
                    <h3 class="text-base font-bold">Últimos Empleados Agregados</h3>
                </div>
                <div class="p-5">
                    @if(\App\Models\Empleado::count() > 0)
                        <div class="space-y-2">
                            @foreach(\App\Models\Empleado::latest()->take(5)->get() as $empleado)
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-[#E6F9F8] transition">
                                <div>
                                    <p class="font-semibold text-gray-900 text-sm">{{ $empleado->nombre }}</p>
                                    <p class="text-xs text-gray-500">{{ $empleado->cargo ?? 'Sin cargo' }}</p>
                                </div>
                                <a href="{{ route('empleados.edit', $empleado) }}"
                                   class="text-xs font-semibold transition"
                                   style="color: #14B8A6;">
                                    Editar →
                                </a>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-center text-gray-400 py-6 text-sm">No hay empleados registrados</p>
                    @endif
                </div>
            </div>

            <!-- Últimos Productos -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 text-white" style="background: linear-gradient(135deg, #D11A7A, #E05C7A);">
                    <h3 class="text-base font-bold">Últimos Productos Agregados</h3>
                </div>
                <div class="p-5">
                    @if(\App\Models\Producto::count() > 0)
                        <div class="space-y-2">
                            @foreach(\App\Models\Producto::latest()->take(5)->get() as $producto)
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-[#E6F9F8] transition">
                                <div>
                                    <p class="font-semibold text-gray-900 text-sm">{{ $producto->nombre }}</p>
                                    <p class="text-xs text-gray-500">${{ number_format($producto->precio, 2) }} | Stock: {{ $producto->stock }}</p>
                                </div>
                                <a href="{{ route('productos.edit', $producto) }}"
                                   class="text-xs font-semibold transition"
                                   style="color: #D11A7A;">
                                    Editar →
                                </a>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-center text-gray-400 py-6 text-sm">No hay productos registrados</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Info Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-2xl border border-gray-200 p-6" style="border-left: 4px solid #14B8A6;">
                <div class="flex items-start gap-4">
                    <div class="rounded-full p-3 flex-shrink-0 text-white" style="background: #14B8A6;">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 text-sm">Control Total</h4>
                        <p class="text-xs text-gray-500 mt-1">Gestiona todos tus recursos de manera eficiente desde un único panel</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 p-6" style="border-left: 4px solid #D11A7A;">
                <div class="flex items-start gap-4">
                    <div class="rounded-full p-3 flex-shrink-0 text-white" style="background: #D11A7A;">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 text-sm">Reportes en PDF</h4>
                        <p class="text-xs text-gray-500 mt-1">Descarga reportes detallados de todas tus operaciones en PDF</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 p-6" style="border-left: 4px solid #14B8A6;">
                <div class="flex items-start gap-4">
                    <div class="rounded-full p-3 flex-shrink-0 text-white" style="background: #14B8A6;">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 text-sm">Gestión de Roles</h4>
                        <p class="text-xs text-gray-500 mt-1">Administra permisos y roles de usuarios desde un panel centralizado</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-with-sidebar-layout>
