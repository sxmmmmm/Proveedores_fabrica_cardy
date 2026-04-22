<x-with-sidebar-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-teal-500 leading-tight">
            Generador de Clientes
        </h2>
    </x-slot>

    <div class="p-6">

        <div class="mb-4">
            <a href="{{ route('clientes.index') }}"
               class="text-gray-500 hover:text-gray-700">
                ← Volver
            </a>
        </div>

        <div class="bg-white shadow rounded">

            <table class="w-full text-center border border-gray-300">

                <thead>
                    <tr style="background-color: #4DC9C2;">
                        <th class="p-3 border">Nombre</th>
                        <th class="p-3 border">Documento</th>
                        <th class="p-3 border">Correo</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($clientesGenerados as $cliente)
                        <tr>
                            <td class="p-3 border">{{ $cliente->nombre }}</td>
                            <td class="p-3 border">{{ $cliente->documento }}</td>
                            <td class="p-3 border">{{ $cliente->correo }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="p-4 text-gray-500">
                                No hay clientes
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>

    </div>

</x-with-sidebar-layout>