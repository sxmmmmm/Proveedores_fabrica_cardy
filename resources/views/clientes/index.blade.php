<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de Clientes
        </h2>
    </x-slot>

    <div class="p-6">

        <a href="{{ route('clientes.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded">
            Nuevo Cliente
        </a>

<div class="overflow-x-auto">

    <table class="mt-4 w-full text-center border border-gray-300">

        <thead class="bg-gray-200">
            <tr>
                <th class="p-3 border">Nombre</th>
                <th class="p-3 border">Documento</th>
                <th class="p-3 border">Teléfono</th>
                <th class="p-3 border">Correo</th>
                <th class="p-3 border">Ciudad</th>
                <th class="p-3 border">Dirección</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($clientes as $cliente)
            <tr class="hover:bg-gray-100">
                <td class="p-3 border">{{ $cliente->nombre }}</td>
                <td class="p-3 border">{{ $cliente->documento }}</td>
                <td class="p-3 border">{{ $cliente->telefono }}</td>
                <td class="p-3 border">{{ $cliente->correo }}</td>
                <td class="p-3 border">{{ $cliente->ciudad }}</td>
                <td class="p-3 border">{{ $cliente->direccion }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="p-4 text-gray-500">
                    No hay clientes registrados
                </td>
            </tr>
            @endforelse
        </tbody>

    </table>

</div>

    </div>

</x-app-layout>