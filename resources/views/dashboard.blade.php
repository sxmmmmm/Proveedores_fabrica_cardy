<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            FÁBRICA CARDY
        </h2>
    </x-slot>

    <div class="min-h-screen bg-pink-50 py-10">
        <div class="max-w-6xl mx-auto px-6">

            <!-- Botón volver -->
            <div class="mb-6">
                <a href="{{ route('dashboard') }}"
                   class="text-gray-600 hover:text-black">
                    ← Volver al panel lateral
                </a>
            </div>

            <!-- Título -->
            <h3 class="text-lg font-semibold mb-8 text-center text-gray-700">
                Panel de navegación
            </h3>

            <!-- BOTONES -->
            <div class="grid grid-cols-2 md:grid-cols-3 gap-6 mb-10">

                <!-- Clientes -->
                <a href="{{ route('clientes.index') }}"
                   class="bg-blue-600 hover:bg-blue-500 text-white p-6 rounded-xl shadow text-center transition">
                    <h3 class="font-bold text-lg">Clientes</h3>
                    <p class="text-sm">Gestionar clientes</p>
                </a>

                <!-- Proveedores -->
                <a href="{{ route('proveedores.index') }}"
                   class="bg-red-600 hover:bg-red-500 text-white p-6 rounded-xl shadow text-center transition">
                    <h3 class="font-bold text-lg">Proveedores</h3>
                    <p class="text-sm">Gestionar proveedores</p>
                </a>

                <!-- Materias primas -->
                <a href="{{ route('materias-primas.index') }}"
                   class="bg-red-600 hover:bg-red-500 text-white p-6 rounded-xl shadow text-center transition">
                    <h3 class="font-bold text-lg">Materias Primas</h3>
                    <p class="text-sm">Control de insumos</p>
                </a>

                <!-- 🔵 EMPLEADOS -->
                <a href="{{ route('empleados.index') }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white p-6 rounded-xl shadow text-center transition">
                    <h3 class="font-bold text-lg">Empleados</h3>
                    <p class="text-sm">Gestión de empleados</p>
                </a>

                <!-- 🟢 PRODUCTOS -->
                <a href="{{ route('productos.index') }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white p-6 rounded-xl shadow text-center transition">
                    <h3 class="font-bold text-lg">Productos</h3>
                    <p class="text-sm">Gestión de productos</p>
                </a>

            </div>

            <!-- INFORMACIÓN -->
            <h3 class="text-lg font-semibold mb-6 text-center text-gray-700">
                Información general
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Productos -->
                <div class="bg-white shadow rounded-xl p-6 text-center">
                    <h4 class="text-gray-500">Productos</h4>
                    <p class="text-3xl font-bold text-green-600">
                        {{ \App\Models\Producto::count() }}
                    </p>
                </div>

                <!-- Materias primas -->
                <div class="bg-white shadow rounded-xl p-6 text-center">
                    <h4 class="text-gray-500">Materias Primas</h4>
                    <p class="text-3xl font-bold text-red-500">
                        {{ \App\Models\MateriaPrima::count() }}
                    </p>
                </div>

                <!-- Empleados -->
                <div class="bg-white shadow rounded-xl p-6 text-center">
                    <h4 class="text-gray-500">Empleados</h4>
                    <p class="text-3xl font-bold text-blue-600">
                        {{ \App\Models\Empleado::count() }}
                    </p>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>