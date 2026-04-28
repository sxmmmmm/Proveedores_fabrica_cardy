<x-with-sidebar-layout>

    <x-slot name="pageTitle">Gestión de Proveedores</x-slot>
    <x-slot name="header">Proveedores</x-slot>

    <div class="p-6">

        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Gestión de Proveedores</h2>
                <p class="text-sm text-gray-500 mt-1">Administra los proveedores registrados en el sistema.</p>
            </div>
            <a href="{{ route('proveedores.create') }}"
               style="background-color: #4DC9C2; color: black"
               class="px-4 py-2 rounded font-medium whitespace-nowrap">
                + Nuevo Proveedor
            </a>
        </div>

        {{-- Filtros --}}
        <form method="GET" action="{{ route('proveedores.index') }}"
              class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 mb-4">
            <div class="flex flex-wrap gap-3 items-end">
                <div class="flex-1 min-w-[180px]">
                    <label class="block text-xs font-semibold text-gray-600 mb-1">Buscar</label>
                    <input type="text" name="search" value="{{ $filters['search'] ?? '' }}"
                           placeholder="Nombre, empresa, documento..."
                           class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300">
                </div>
                <div class="min-w-[140px]">
                    <label class="block text-xs font-semibold text-gray-600 mb-1">Ciudad</label>
                    <select name="ciudad" class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300">
                        <option value="">Todas</option>
                        @foreach($ciudades as $c)
                            <option value="{{ $c }}" {{ ($filters['ciudad'] ?? '') === $c ? 'selected' : '' }}>{{ $c }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="min-w-[140px]">
                    <label class="block text-xs font-semibold text-gray-600 mb-1">Mercancía</label>
                    <select name="mercancia" class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300">
                        <option value="">Todas</option>
                        @foreach($mercancias as $m)
                            <option value="{{ $m }}" {{ ($filters['mercancia'] ?? '') === $m ? 'selected' : '' }}>{{ $m }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex gap-2">
                    <button type="submit" style="background-color: #4DC9C2;"
                            class="text-white px-4 py-1.5 rounded text-sm font-medium">Filtrar</button>
                    <a href="{{ route('proveedores.index') }}"
                       class="bg-gray-200 text-gray-700 px-4 py-1.5 rounded text-sm font-medium">Limpiar</a>
                </div>
            </div>
        </form>

        <x-import-export-bar
            :importRoute="route('proveedores.import')"
            :exportExcel="route('proveedores.export.excel')"
            :exportCsv="route('proveedores.export.csv')"
            :exportPdf="route('proveedores.export.pdf')"
            :filters="$filters"
        />

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">{{ session('success') }}</div>
        @endif

        <div class="text-xs text-gray-500 mb-2">
            Mostrando {{ $proveedores->firstItem() ?? 0 }}–{{ $proveedores->lastItem() ?? 0 }} de {{ $proveedores->total() }} registros
        </div>

        <div class="bg-white shadow rounded overflow-x-auto">
            <table style="border-color: #F4A7B9;" class="w-full text-center border border-gray-300 text-sm">
                <thead>
                    <tr style="background-color: #F4A7B9;">
                        <th class="px-3 py-2 border text-white font-semibold">Nombre</th>
                        <th class="px-3 py-2 border text-white font-semibold">Empresa</th>
                        <th class="px-3 py-2 border text-white font-semibold">Documento</th>
                        <th class="px-3 py-2 border text-white font-semibold">Teléfono</th>
                        <th class="px-3 py-2 border text-white font-semibold">Correo</th>
                        <th class="px-3 py-2 border text-white font-semibold">Ciudad</th>
                        <th class="px-3 py-2 border text-white font-semibold">Mercancía</th>
                        <th class="px-3 py-2 border text-white font-semibold">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($proveedores as $proveedor)
                        <tr onmouseover="this.style.backgroundColor='#FCE4EC'"
                            onmouseout="this.style.backgroundColor=''">
                            <td class="px-3 py-2 border">{{ $proveedor->nombre }}</td>
                            <td class="px-3 py-2 border">{{ $proveedor->empresa }}</td>
                            <td class="px-3 py-2 border">{{ $proveedor->documento }}</td>
                            <td class="px-3 py-2 border">{{ $proveedor->telefono }}</td>
                            <td class="px-3 py-2 border">{{ $proveedor->correo }}</td>
                            <td class="px-3 py-2 border">{{ $proveedor->ciudad }}</td>
                            <td class="px-3 py-2 border">{{ $proveedor->mercancia }}</td>
                            <td class="px-3 py-2 border">
                                <div class="flex gap-1 justify-center">
                                    <a href="{{ route('proveedores.edit', $proveedor->id) }}"
                                       style="background-color: #4DC9C2;"
                                       class="text-white px-2 py-1 rounded text-xs">Editar</a>
                                    <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button style="background-color: #F4A7B9;"
                                                class="text-white px-2 py-1 rounded text-xs">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="8" class="p-4 text-gray-500">No hay proveedores registrados</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($proveedores->hasPages())
            <div class="mt-4">{{ $proveedores->links() }}</div>
        @endif

    </div>

</x-with-sidebar-layout>
