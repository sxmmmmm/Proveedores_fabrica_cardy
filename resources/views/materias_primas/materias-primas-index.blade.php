<x-with-sidebar-layout>

    <x-slot name="pageTitle">Gestión de Materias Primas</x-slot>
    <x-slot name="header">Materias Primas</x-slot>

    <div class="p-6">

        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Gestión de Materias Primas</h2>
                <p class="text-sm text-gray-500 mt-1">Administra el inventario de materias primas disponibles.</p>
            </div>
            <x-action-button color="teal" href="{{ route('materias-primas.create') }}">
                + Nueva Materia Prima
            </x-action-button>
        </div>

        {{-- Filtros --}}
        <form method="GET" action="{{ route('materias-primas.index') }}"
              class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 mb-4">
            <div class="flex flex-wrap gap-3 items-end">
                <div class="flex-1 min-w-[180px]">
                    <label class="block text-xs font-semibold text-gray-600 mb-1">Buscar</label>
                    <input type="text" name="search" value="{{ $filters['search'] ?? '' }}"
                           placeholder="Nombre, tipo, color..."
                           class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300">
                </div>
                <div class="min-w-[140px]">
                    <label class="block text-xs font-semibold text-gray-600 mb-1">Tipo</label>
                    <select name="tipo" class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300">
                        <option value="">Todos</option>
                        @foreach($tipos as $t)
                            <option value="{{ $t }}" {{ ($filters['tipo'] ?? '') === $t ? 'selected' : '' }}>{{ $t }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="min-w-[140px]">
                    <label class="block text-xs font-semibold text-gray-600 mb-1">Color</label>
                    <select name="color" class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300">
                        <option value="">Todos</option>
                        @foreach($colores as $c)
                            <option value="{{ $c }}" {{ ($filters['color'] ?? '') === $c ? 'selected' : '' }}>{{ $c }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex gap-2">
                    <x-action-button color="teal" type="submit">Filtrar</x-action-button>
                    <x-action-button color="gray" href="{{ route('materias-primas.index') }}">Limpiar</x-action-button>
                </div>
            </div>
        </form>

        <x-import-export-bar
            :importRoute="route('materias-primas.import')"
            :exportExcel="route('materias-primas.export.excel')"
            :exportCsv="route('materias-primas.export.csv')"
            :exportPdf="route('materias-primas.export.pdf')"
            :filters="$filters"
        />

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">{{ session('success') }}</div>
        @endif

        <div class="text-xs text-gray-500 mb-2">
            Mostrando {{ $materias->firstItem() ?? 0 }}–{{ $materias->lastItem() ?? 0 }} de {{ $materias->total() }} registros
        </div>

        <div class="bg-white shadow rounded overflow-x-auto">
            <table style="border-color: #F4A7B9;" class="w-full text-center border border-gray-300 text-sm">
                <thead>
                    <tr style="background-color: #F4A7B9;">
                        <th class="px-3 py-2 border text-white font-semibold">Nombre</th>
                        <th class="px-3 py-2 border text-white font-semibold">Tipo</th>
                        <th class="px-3 py-2 border text-white font-semibold">Color</th>
                        <th class="px-3 py-2 border text-white font-semibold">Stock</th>
                        <th class="px-3 py-2 border text-white font-semibold">Precio</th>
                        <th class="px-3 py-2 border text-white font-semibold">Empleado</th>
                        <th class="px-3 py-2 border text-white font-semibold w-44">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($materias as $m)
                        <tr onmouseover="this.style.backgroundColor='#FCE4EC'"
                            onmouseout="this.style.backgroundColor=''">
                            <td class="px-3 py-2 border">{{ $m->nombre }}</td>
                            <td class="px-3 py-2 border">{{ $m->tipo }}</td>
                            <td class="px-3 py-2 border">{{ $m->color }}</td>
                            <td class="px-3 py-2 border">{{ $m->stock }}</td>
                            <td class="px-3 py-2 border">${{ number_format($m->precio, 2) }}</td>
                            <td class="px-3 py-2 border">{{ $m->empleado->nombre ?? 'Sin asignar' }}</td>
                            <td class="px-3 py-2 border">
                                <div class="flex gap-2 justify-center">
                                    <x-action-button color="teal" :href="route('materias-primas.edit', $m)">
                                        ✏ Editar
                                    </x-action-button>
                                    <form action="{{ route('materias-primas.destroy', $m) }}" method="POST"
                                          onsubmit="return confirm('¿Eliminar esta materia prima?');">
                                        @csrf @method('DELETE')
                                        <x-action-button color="pink" type="submit">
                                            🗑 Eliminar
                                        </x-action-button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-6 text-gray-400 text-center">No hay materias primas registradas</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($materias->hasPages())
            <div class="mt-4">{{ $materias->links() }}</div>
        @endif

    </div>

</x-with-sidebar-layout>