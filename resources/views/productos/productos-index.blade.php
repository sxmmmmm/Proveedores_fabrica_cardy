<x-with-sidebar-layout>

    <x-slot name="pageTitle">Gestión de Productos</x-slot>
    <x-slot name="header">Productos</x-slot>

    <div class="p-6">

        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Gestión de Productos</h2>
                <p class="text-sm text-gray-500 mt-1">Administra el catálogo de productos de la fábrica.</p>
            </div>
            <x-action-button color="teal" href="{{ route('productos.create') }}">
                + Nuevo Producto
            </x-action-button>
        </div>

        {{-- Filtros --}}
        <form method="GET" action="{{ route('productos.index') }}"
              class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 mb-4">
            <div class="flex flex-wrap gap-3 items-end">
                <div class="flex-1 min-w-[180px]">
                    <label class="block text-xs font-semibold text-gray-600 mb-1">Buscar</label>
                    <input type="text" name="search" value="{{ $filters['search'] ?? '' }}"
                           placeholder="Nombre o descripción..."
                           class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300">
                </div>
                <div class="min-w-[160px]">
                    <label class="block text-xs font-semibold text-gray-600 mb-1">Materia Prima</label>
                    <select name="materia_prima_id" class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300">
                        <option value="">Todas</option>
                        @foreach($materias as $m)
                            <option value="{{ $m->id }}" {{ ($filters['materia_prima_id'] ?? '') == $m->id ? 'selected' : '' }}>{{ $m->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="min-w-[110px]">
                    <label class="block text-xs font-semibold text-gray-600 mb-1">Stock mín.</label>
                    <input type="number" name="stock_min" value="{{ $filters['stock_min'] ?? '' }}" min="0"
                           placeholder="0"
                           class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300">
                </div>
                <div class="min-w-[120px]">
                    <label class="block text-xs font-semibold text-gray-600 mb-1">Precio máx.</label>
                    <input type="number" name="precio_max" value="{{ $filters['precio_max'] ?? '' }}" min="0"
                           placeholder="999999"
                           class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300">
                </div>
                <div class="flex gap-2">
                    <x-action-button color="teal" type="submit">Filtrar</x-action-button>
                    <x-action-button color="gray" href="{{ route('productos.index') }}">Limpiar</x-action-button>
                </div>
            </div>
        </form>

        <x-import-export-bar
            :importRoute="route('productos.import')"
            :exportExcel="route('productos.export.excel')"
            :exportCsv="route('productos.export.csv')"
            :exportPdf="route('productos.export.pdf')"
            :filters="$filters"
        />

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">{{ session('success') }}</div>
        @endif

        <div class="text-xs text-gray-500 mb-2">
            Mostrando {{ $productos->firstItem() ?? 0 }}–{{ $productos->lastItem() ?? 0 }} de {{ $productos->total() }} registros
        </div>

        <div class="bg-white shadow rounded overflow-x-auto">
            <table style="border-color: #F4A7B9;" class="w-full text-center border border-gray-300 text-sm">
                <thead>
                    <tr style="background-color: #F4A7B9;">
                        <th class="px-3 py-2 border text-white font-semibold">Nombre</th>
                        <th class="px-3 py-2 border text-white font-semibold">Stock</th>
                        <th class="px-3 py-2 border text-white font-semibold">Precio</th>
                        <th class="px-3 py-2 border text-white font-semibold">Materia Prima</th>
                        <th class="px-3 py-2 border text-white font-semibold w-44">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($productos as $producto)
                        <tr onmouseover="this.style.backgroundColor='#FCE4EC'"
                            onmouseout="this.style.backgroundColor=''">
                            <td class="px-3 py-2 border">{{ $producto->nombre }}</td>
                            <td class="px-3 py-2 border">{{ $producto->stock }}</td>
                            <td class="px-3 py-2 border">${{ number_format($producto->precio, 2) }}</td>
                            <td class="px-3 py-2 border">
                                {{ optional($producto->materiaPrima)->nombre ?? 'Sin materia prima' }}
                            </td>
                            <td class="px-3 py-2 border">
                                <div class="flex gap-2 justify-center">
                                    <x-action-button color="teal" :href="route('productos.edit', $producto)">
                                        ✏ Editar
                                    </x-action-button>
                                    <form action="{{ route('productos.destroy', $producto) }}" method="POST"
                                          onsubmit="return confirm('¿Eliminar este producto?');">
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
                            <td colspan="5" class="p-6 text-gray-400 text-center">No hay productos registrados</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($productos->hasPages())
            <div class="mt-4">{{ $productos->links() }}</div>
        @endif

    </div>

</x-with-sidebar-layout>