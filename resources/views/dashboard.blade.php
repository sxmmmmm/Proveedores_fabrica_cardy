<x-with-sidebar-layout>
    <x-slot name="header">
        FÁBRICA CARDY - Dashboard
    </x-slot>

    <div class="min-h-full" style="background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);">
        <!-- Header Welcome -->
        <div class="mb-8">
            <h2 class="text-4xl font-bold text-gray-900">¡Bienvenido a Cardy!</h2>
            <p class="text-gray-600 mt-2 text-lg">Panel de control de la fábrica de zapatos</p>
        </div>

        <!-- KPI Cards - Estadísticas Principales -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Productos -->
            <div class="bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition-shadow" style="border-left: 5px solid #4DC9C2;">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-semibold uppercase tracking-wide">Productos</p>
                        <p class="text-5xl font-bold mt-2" style="color: #4DC9C2;">{{ \App\Models\Producto::count() }}</p>
                        <p class="text-xs text-gray-500 mt-2">Total en inventario</p>
                    </div>
                    <div class="rounded-2xl p-4" style="background: linear-gradient(135deg, rgba(77, 201, 194, 0.1), rgba(77, 201, 194, 0.05));">
                        <svg class="w-10 h-10" stroke="currentColor" viewBox="0 0 24 24" style="color: #4DC9C2;" fill="none">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m0 0l8-4m8 4v10l-8 4m0-10l-8 4m0-4v10a1 1 0 001 1h14a1 1 0 001-1V7"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Materias Primas -->
            <div class="bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition-shadow" style="border-left: 5px solid #fab8c7;">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-semibold uppercase tracking-wide">Materias Primas</p>
                        <p class="text-5xl font-bold mt-2" style="color: #fab8c7;">{{ \App\Models\MateriaPrima::count() }}</p>
                        <p class="text-xs text-gray-500 mt-2">Tipos de materiales</p>
                    </div>
                    <div class="rounded-2xl p-4" style="background: linear-gradient(135deg, rgba(250, 184, 199, 0.1), rgba(250, 184, 199, 0.05));">
                        <svg class="w-10 h-10" stroke="currentColor" viewBox="0 0 24 24" style="color: #fab8c7;" fill="none">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Empleados -->
            <div class="bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition-shadow" style="border-left: 5px solid #4DC9C2;">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-semibold uppercase tracking-wide">Empleados</p>
                        <p class="text-5xl font-bold mt-2" style="color: #4DC9C2;">{{ \App\Models\Empleado::count() }}</p>
                        <p class="text-xs text-gray-500 mt-2">En la empresa</p>
                    </div>
                    <div class="rounded-2xl p-4" style="background: linear-gradient(135deg, rgba(77, 201, 194, 0.1), rgba(77, 201, 194, 0.05));">
                        <svg class="w-10 h-10" stroke="currentColor" viewBox="0 0 24 24" style="color: #4DC9C2;" fill="none">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 10h4a2 2 0 012 2v4a2 2 0 01-2 2h-4M9 10H5a2 2 0 00-2 2v4a2 2 0 002 2h4m0-12V5a2 2 0 012-2h4a2 2 0 012 2v4m-6 0h6"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Proveedores -->
            <div class="bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition-shadow" style="border-left: 5px solid #fab8c7;">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-semibold uppercase tracking-wide">Proveedores</p>
                        <p class="text-5xl font-bold mt-2" style="color: #fab8c7;">{{ \App\Models\Proveedor::count() }}</p>
                        <p class="text-xs text-gray-500 mt-2">Activos</p>
                    </div>
                    <div class="rounded-2xl p-4" style="background: linear-gradient(135deg, rgba(250, 184, 199, 0.1), rgba(250, 184, 199, 0.05));">
                        <svg class="w-10 h-10" stroke="currentColor" viewBox="0 0 24 24" style="color: #fab8c7;" fill="none">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Acciones Rápidas -->
        <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
            <h3 class="text-2xl font-bold text-gray-900 mb-6">Acciones Rápidas</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <a href="{{ route('empleados.create') }}" class="group relative inline-flex items-center justify-center px-6 py-4 overflow-hidden text-white rounded-xl transition-all shadow-lg hover:shadow-xl" style="background: linear-gradient(135deg, #4DC9C2, #3db5ae);">
                    <div class="relative flex items-center gap-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <span class="font-semibold">Agregar Empleado</span>
                    </div>
                </a>

                <a href="{{ route('productos.create') }}" class="group relative inline-flex items-center justify-center px-6 py-4 overflow-hidden text-white rounded-xl transition-all shadow-lg hover:shadow-xl" style="background: linear-gradient(135deg, #fab8c7, #f89aaf);">
                    <div class="relative flex items-center gap-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <span class="font-semibold">Nuevo Producto</span>
                    </div>
                </a>

                <a href="{{ route('materias-primas.create') }}" class="group relative inline-flex items-center justify-center px-6 py-4 overflow-hidden text-white rounded-xl transition-all shadow-lg hover:shadow-xl" style="background: linear-gradient(135deg, #4DC9C2, #3db5ae);">
                    <div class="relative flex items-center gap-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <span class="font-semibold">Materia Prima</span>
                    </div>
                </a>

                <a href="{{ route('export.complete') }}" class="group relative inline-flex items-center justify-center px-6 py-4 overflow-hidden text-white rounded-xl transition-all shadow-lg hover:shadow-xl" style="background: linear-gradient(135deg, #fab8c7, #f89aaf);">
                    <div class="relative flex items-center gap-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <span class="font-semibold">Descargar PDF</span>
                    </div>
                </a>
            </div>
        </div>

        <!-- Últimos Registros -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <!-- Últimos Empleados -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="px-8 py-6 text-white" style="background: linear-gradient(135deg, #4DC9C2, #3db5ae);">
                    <h3 class="text-xl font-bold">Últimos Empleados Agregados</h3>
                </div>
                <div class="p-6">
                    @if(\App\Models\Empleado::count() > 0)
                        <div class="space-y-3">
                            @foreach(\App\Models\Empleado::latest()->take(5)->get() as $empleado)
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                                <div>
                                    <p class="font-semibold text-gray-900">{{ $empleado->nombre }}</p>
                                    <p class="text-sm text-gray-600">{{ $empleado->cargo ?? 'Sin cargo' }}</p>
                                </div>
                                <a href="{{ route('empleados.edit', $empleado) }}" class="font-medium text-sm transition" style="color: #4DC9C2;">
                                    Editar →
                                </a>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-center text-gray-500 py-8">No hay empleados registrados</p>
                    @endif
                </div>
            </div>

            <!-- Últimos Productos -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="px-8 py-6 text-white" style="background: linear-gradient(135deg, #fab8c7, #f89aaf);">
                    <h3 class="text-xl font-bold">Últimos Productos Agregados</h3>
                </div>
                <div class="p-6">
                    @if(\App\Models\Producto::count() > 0)
                        <div class="space-y-3">
                            @foreach(\App\Models\Producto::latest()->take(5)->get() as $producto)
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                                <div>
                                    <p class="font-semibold text-gray-900">{{ $producto->nombre }}</p>
                                    <p class="text-sm text-gray-600">${{ number_format($producto->precio, 2) }} | Stock: {{ $producto->stock }}</p>
                                </div>
                                <a href="{{ route('productos.edit', $producto) }}" class="font-medium text-sm transition" style="color: #fab8c7;">
                                    Editar →
                                </a>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-center text-gray-500 py-8">No hay productos registrados</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Info Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="rounded-2xl p-8" style="background: linear-gradient(135deg, rgba(77, 201, 194, 0.1), rgba(77, 201, 194, 0.05)); border: 2px solid #4DC9C2;">
                <div class="flex items-start gap-4">
                    <div class="rounded-full p-3 flex-shrink-0 text-white" style="background: #4DC9C2;">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900">Control Total</h4>
                        <p class="text-sm text-gray-600 mt-1">Gestiona todos tus recursos de manera eficiente desde un único panel</p>
                    </div>
                </div>
            </div>

            <div class="rounded-2xl p-8" style="background: linear-gradient(135deg, rgba(250, 184, 199, 0.1), rgba(250, 184, 199, 0.05)); border: 2px solid #fab8c7;">
                <div class="flex items-start gap-4">
                    <div class="rounded-full p-3 flex-shrink-0 text-white" style="background: #fab8c7;">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900">Reportes en PDF</h4>
                        <p class="text-sm text-gray-600 mt-1">Descarga reportes detallados de todas tus operaciones en PDF</p>
                    </div>
                </div>
            </div>

            <div class="rounded-2xl p-8" style="background: linear-gradient(135deg, rgba(77, 201, 194, 0.1), rgba(77, 201, 194, 0.05)); border: 2px solid #4DC9C2;">
                <div class="flex items-start gap-4">
                    <div class="rounded-full p-3 flex-shrink-0 text-white" style="background: #4DC9C2;">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900">Gestión de Roles</h4>
                        <p class="text-sm text-gray-600 mt-1">Administra permisos y roles de usuarios desde un panel centralizado</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-with-sidebar-layout>
