<x-with-sidebar-layout>

    <x-slot name="pageTitle">Gestión de Empleados</x-slot>
    <x-slot name="header">Empleados</x-slot>

    <div class="p-6">

        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Gestión de Empleados</h2>
                <p class="text-sm text-gray-500 mt-1">Administra el personal registrado en la fábrica.</p>
            </div>
            <x-action-button color="teal" href="{{ route('empleados.create') }}">
                + Nuevo Empleado
            </x-action-button>
        </div>

        {{-- Filtros --}}
        <form method="GET" action="{{ route('empleados.index') }}"
              class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 mb-4">
            <div class="flex flex-wrap gap-3 items-end">
                <div class="flex-1 min-w-[180px]">
                    <label class="block text-xs font-semibold text-gray-600 mb-1">Buscar</label>
                    <input type="text" name="search" value="{{ $filters['search'] ?? '' }}"
                           placeholder="Nombre, documento, correo..."
                           class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300">
                </div>
                <div class="min-w-[140px]">
                    <label class="block text-xs font-semibold text-gray-600 mb-1">Cargo</label>
                    <select name="cargo" class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300">
                        <option value="">Todos</option>
                        @foreach($cargos as $c)
                            <option value="{{ $c }}" {{ ($filters['cargo'] ?? '') === $c ? 'selected' : '' }}>{{ $c }}</option>
                        @endforeach
                    </select>
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
                <div class="flex gap-2">
                    <x-action-button color="teal" type="submit">Filtrar</x-action-button>
                    <x-action-button color="gray" href="{{ route('empleados.index') }}">Limpiar</x-action-button>
                </div>
            </div>
        </form>

        <x-import-export-bar
            :importRoute="route('empleados.import')"
            :exportExcel="route('empleados.export.excel')"
            :exportCsv="route('empleados.export.csv')"
            :exportPdf="route('empleados.export.pdf')"
            :filters="$filters"
        />

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">{{ session('success') }}</div>
        @endif

        <div class="text-xs text-gray-500 mb-2">
            Mostrando {{ $empleados->firstItem() ?? 0 }}–{{ $empleados->lastItem() ?? 0 }} de {{ $empleados->total() }} registros
        </div>

        <div class="bg-white shadow rounded overflow-x-auto">
            <table style="border-color: #F4A7B9;" class="w-full text-center border border-gray-300 text-sm">
                <thead>
                    <tr style="background-color: #F4A7B9;">
                        <th class="px-3 py-2 border text-white font-semibold">Nombre</th>
                        <th class="px-3 py-2 border text-white font-semibold">Documento</th>
                        <th class="px-3 py-2 border text-white font-semibold">Cargo</th>
                        <th class="px-3 py-2 border text-white font-semibold">Teléfono</th>
                        <th class="px-3 py-2 border text-white font-semibold">Correo</th>
                        <th class="px-3 py-2 border text-white font-semibold">Ciudad</th>
                        <th class="px-3 py-2 border text-white font-semibold w-44">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($empleados as $empleado)
                        <tr onmouseover="this.style.backgroundColor='#FCE4EC'"
                            onmouseout="this.style.backgroundColor=''">
                            <td class="px-3 py-2 border">{{ $empleado->nombre }}</td>
                            <td class="px-3 py-2 border">{{ $empleado->documento }}</td>
                            <td class="px-3 py-2 border">{{ $empleado->cargo ?? 'N/A' }}</td>
                            <td class="px-3 py-2 border">{{ $empleado->telefono ?? 'N/A' }}</td>
                            <td class="px-3 py-2 border">{{ $empleado->correo ?? 'N/A' }}</td>
                            <td class="px-3 py-2 border">{{ $empleado->ciudad ?? 'N/A' }}</td>
                            <td class="px-3 py-2 border">
                                <div class="flex gap-2 justify-center items-center">
                                    <x-action-button color="teal" :href="route('empleados.edit', $empleado)">
                                        Editar
                                    </x-action-button>
                                    <form action="{{ route('empleados.destroy', $empleado) }}" method="POST"
                                          onsubmit="return confirm('¿Eliminar este empleado?');" style="margin:0;">
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
                            <td colspan="7" class="p-6 text-gray-400 text-center">No hay empleados registrados</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($empleados->hasPages())
            <div class="mt-4">{{ $empleados->links() }}</div>
        @endif

    </div>

</x-with-sidebar-layout>