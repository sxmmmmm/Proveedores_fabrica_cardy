<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            FABRICA CARDY
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                    <h3 class="text-lg font-bold mb-6 text-center">
                        Panel de navegación
                    </h3>

                    <div class="flex justify-center gap-6 flex-wrap">

                        <a href="{{ route('clientes.index') }}"
                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg shadow">
                            Clientes
                        </a>

                        <a href="{{ route('proveedores.index') }}"
                           class="bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg shadow">
                            Proveedores
                        </a>

                        <a href="{{ route('materias-primas.index') }}"
                           class="bg-red-600 hover:bg-red-800 text-white font-bold py-3 px-6 rounded-lg shadow">
                            Materias Primas
                        </a>

                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>