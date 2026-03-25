<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            FABRICA CARDY
        </h2>
    </x-slot>

    <div class="min-h-screen bg-pink-50 pt-10">
        <div class="max-w-4xl mx-auto px-6">

            <h3 class="text-lg font-semibold mb-8 text-center text-gray-700">
                Panel de navegación
            </h3>

            <div class="flex justify-center gap-6 flex-wrap">

                <a href="{{ route('clientes.index') }}"
                   class="w-48 bg-blue-500 hover:bg-blue-600 text-white p-5 rounded-xl shadow-md transition text-center">
                    <h3 class="font-bold text-md">Clientes</h3>
                    <p class="text-sm opacity-90">Gestionar clientes</p>
                </a>

                <a href="{{ route('proveedores.index') }}"
                   class="w-48 bg-green-500 hover:bg-green-600 text-white p-5 rounded-xl shadow-md transition text-center">
                    <h3 class="font-bold text-md">Proveedores</h3>
                    <p class="text-sm opacity-90">Gestionar proveedores</p>
                </a>

                <a href="{{ route('materias-primas.index') }}"
                   class="w-48 bg-red-500 hover:bg-red-600 text-white p-5 rounded-xl shadow-md transition text-center">
                    <h3 class="font-bold text-md">Materias Primas</h3>
                    <p class="text-sm opacity-90">Control de insumos</p>
                </a>

            </div>

        </div>
    </div>
</x-app-layout>