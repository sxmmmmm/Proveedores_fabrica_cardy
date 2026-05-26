<x-with-sidebar-layout>

    <x-slot name="pageTitle">Gestión de Clientes</x-slot>
    <x-slot name="header">Clientes</x-slot>

    <div class="p-6">

        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Gestión de Clientes</h2>
                <p class="text-sm text-gray-500 mt-1">Administra los clientes registrados en el sistema.</p>
            </div>
            <x-action-button color="teal" href="{{ route('clientes.create') }}">
                + Nuevo Cliente
            </x-action-button>
        </div>

        {{-- Filtros --}}
        <form method="GET" action="{{ route('clientes.index') }}"
              class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 mb-4">
            <div class="flex flex-wrap gap-3 items-end">
                <div class="flex-1 min-w-[180px]">
                    <label class="block text-xs font-semibold text-gray-600 mb-1">Buscar</label>
                    <input type="text" name="search" value="{{ $filters['search'] ?? '' }}"
                           placeholder="Nombre, documento, correo..."
                           class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300">
                </div>
                <div class="min-w-[150px]">
                    <label class="block text-xs font-semibold text-gray-600 mb-1">Ciudad</label>
                    <select name="ciudad" class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300">
                        <option value="">Todas</option>
                        @foreach($ciudades as $c)
                            <option value="{{ $c }}" {{ ($filters['ciudad'] ?? '') === $c ? 'selected' : '' }}>{{ $c }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex gap-2">
                    <x-action-button color="teal" type="submit">Filtrar</x-action-button>
                    <x-action-button color="gray" href="{{ route('clientes.index') }}">Limpiar</x-action-button>
                </div>
            </div>
        </form>

        <x-import-export-bar
            :importRoute="route('clientes.import')"
            :exportExcel="route('clientes.export.excel')"
            :exportCsv="route('clientes.export.csv')"
            :exportPdf="route('clientes.export.pdf')"
            :filters="$filters"
        />

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">{{ session('success') }}</div>
        @endif

        <div class="text-xs text-gray-500 mb-2">
            Mostrando {{ $clientes->firstItem() ?? 0 }}–{{ $clientes->lastItem() ?? 0 }} de {{ $clientes->total() }} registros
        </div>

        <div class="bg-white shadow rounded overflow-x-auto">
            <table style="border-color: #F4A7B9;" class="w-full text-center border border-gray-300 text-sm">
                <thead>
                    <tr style="background-color: #F4A7B9;">
                        <th class="px-3 py-2 border text-white font-semibold">Nombre</th>
                        <th class="px-3 py-2 border text-white font-semibold">Documento</th>
                        <th class="px-3 py-2 border text-white font-semibold">Teléfono</th>
                        <th class="px-3 py-2 border text-white font-semibold">Correo</th>
                        <th class="px-3 py-2 border text-white font-semibold">Ciudad</th>
                        <th class="px-3 py-2 border text-white font-semibold">Dirección</th>
                        <th class="px-3 py-2 border text-white font-semibold w-44">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($clientes as $cliente)
                        <tr onmouseover="this.style.backgroundColor='#FCE4EC'"
                            onmouseout="this.style.backgroundColor=''">
                            <td class="px-3 py-2 border">{{ $cliente->nombre }}</td>
                            <td class="px-3 py-2 border">{{ $cliente->documento }}</td>
                            <td class="px-3 py-2 border">{{ $cliente->telefono }}</td>
                            <td class="px-3 py-2 border">{{ $cliente->correo }}</td>
                            <td class="px-3 py-2 border">{{ $cliente->ciudad }}</td>
                            <td class="px-3 py-2 border">{{ $cliente->direccion }}</td>
                            <td class="px-3 py-2 border">
                                <div class="flex gap-2 justify-center items-center">
                                    <x-action-button color="teal" :href="route('clientes.edit', $cliente->id)">
                                        Editar
                                    </x-action-button>
                                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST"
                                          onsubmit="return confirm('¿Eliminar este cliente?');" style="margin:0;">
                                        @csrf @method('DELETE')
                                        <x-action-button color="pink" type="submit">
                                            Eliminar
                                        </x-action-button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-6 text-gray-400 text-center">No hay clientes registrados</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($clientes->hasPages())
            <div class="mt-4">{{ $clientes->links() }}</div>
        @endif

    </div>

</x-with-sidebar-layout>