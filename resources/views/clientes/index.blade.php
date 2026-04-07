<x-with-sidebar-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-teal-500 leading-tight">
            Clientes
        </h2>
    </x-slot>

    <div class="p-6">

        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('clientes.create') }}"
               style="background-color: #4DC9C2; color: black"
               class="px-4 py-2 rounded">
                Nuevo Cliente
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow rounded">

            <table style="border-color: #F4A7B9;" class="w-full text-center border border-gray-300">

                <thead>
                    <tr style="background-color: #F4A7B9;">
                        <th class="p-3 border">Nombre</th>
                        <th class="p-3 border">Documento</th>
                        <th class="p-3 border">Teléfono</th>
                        <th class="p-3 border">Correo</th>
                        <th class="p-3 border">Ciudad</th>
                        <th class="p-3 border">Dirección</th>
                        <th class="p-3 border">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($clientes as $cliente)
                        <tr onmouseover="this.style.backgroundColor='#FCE4EC'" 
                            onmouseout="this.style.backgroundColor=''">
                            
                            <td class="p-3 border">{{ $cliente->nombre }}</td>
                            <td class="p-3 border">{{ $cliente->documento }}</td>
                            <td class="p-3 border">{{ $cliente->telefono }}</td>
                            <td class="p-3 border">{{ $cliente->correo }}</td>
                            <td class="p-3 border">{{ $cliente->ciudad }}</td>
                            <td class="p-3 border">{{ $cliente->direccion }}</td>

                            <td class="p-3 border">
                                <div class="flex gap-2 justify-center">

                                    <a href="{{ route('clientes.edit', $cliente->id) }}"
                                       style="background-color: #4DC9C2;"
                                       class="text-white px-3 py-1 rounded text-sm">
                                        Editar
                                    </a>

                                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button style="background-color: #F4A7B9;"
                                                class="text-white px-3 py-1 rounded text-sm">
                                            Eliminar
                                        </button>
                                    </form>

                                </div>
                            </td>

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