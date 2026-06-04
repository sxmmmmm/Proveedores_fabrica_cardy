<x-with-sidebar-layout>
    <x-slot name="pageTitle">Gestión de Materias Primas</x-slot>
    <x-slot name="header">Materias Primas</x-slot>

    {{-- ═══ MODAL CREAR MATERIA PRIMA ═══ --}}
    <div x-data="{ open: {{ $errors->any() && !old('_edit_id') ? 'true' : 'false' }} }">

        <!-- Encabezado -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Gestión de Materias Primas</h2>
                <p class="text-sm text-gray-500 mt-1">{{ $materias->total() }} registros encontrados</p>
            </div>
            <button @click="open = true"
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-semibold text-white transition hover:opacity-90"
                    style="background-color: #0F172A;">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Nueva Materia Prima
            </button>
        </div>

        <!-- Modal Crear -->
        <div x-show="open" x-cloak
             class="fixed inset-0 z-50 flex items-center justify-center p-4"
             style="background: rgba(0,0,0,0.5);">
            <div @click.stop
                 class="bg-white rounded-xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">

                <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-bold text-gray-900">Nueva Materia Prima</h3>
                    <button @click="open = false" class="text-gray-400 hover:text-gray-600 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <form action="{{ route('materias-primas.store') }}" method="POST" class="p-6">
                    @csrf

                    @if($errors->any() && !old('_edit_id'))
                        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-4 text-sm">
                            <ul class="list-disc list-inside space-y-1">
                                @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                            <input type="text" name="nombre" value="{{ old('nombre') }}"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tipo</label>
                            <input type="text" name="tipo" value="{{ old('tipo') }}"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Color</label>
                            <input type="text" name="color" value="{{ old('color') }}"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Stock</label>
                            <input type="number" name="stock" value="{{ old('stock') }}"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Precio</label>
                            <input type="number" step="0.01" name="precio" value="{{ old('precio') }}"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Empleado</label>
                            <select name="empleado_id" id="empleado_id" required
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                                <option value="">Seleccione un empleado</option>
                                @foreach($empleados as $emp)
                                    <option value="{{ $emp->id }}" {{ old('empleado_id') == $emp->id ? 'selected' : '' }}>
                                        {{ $emp->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 mt-6 pt-4 border-t border-gray-100">
                        <button type="button" @click="open = false"
                                class="px-4 py-2 rounded-lg text-sm font-medium bg-gray-100 text-gray-700 hover:bg-gray-200 transition">
                            Cancelar
                        </button>
                        <button type="submit"
                                class="px-4 py-2 rounded-lg text-sm font-medium text-white transition hover:opacity-90"
                                style="background-color: #14B8A6;">
                            Guardar Materia Prima
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Filtros --}}
    <form method="GET" action="{{ route('materias-primas.index') }}"
          class="bg-white rounded-xl border border-gray-200 shadow-sm p-4 mb-4">
        <div class="flex flex-wrap gap-3 items-end">
            <div class="flex-1 min-w-[180px]">
                <label class="block text-xs font-semibold text-gray-600 mb-1">Buscar</label>
                <input type="text" name="search" value="{{ $filters['search'] ?? '' }}"
                       placeholder="Nombre, tipo, color..."
                       class="w-full border border-gray-300 rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-teal-300">
            </div>
            <div class="min-w-[140px]">
                <label class="block text-xs font-semibold text-gray-600 mb-1">Tipo</label>
                <select name="tipo" class="w-full border border-gray-300 rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-teal-300">
                    <option value="">Todos</option>
                    @foreach($tipos as $t)
                        <option value="{{ $t }}" {{ ($filters['tipo'] ?? '') === $t ? 'selected' : '' }}>{{ $t }}</option>
                    @endforeach
                </select>
            </div>
            <div class="min-w-[140px]">
                <label class="block text-xs font-semibold text-gray-600 mb-1">Color</label>
                <select name="color" class="w-full border border-gray-300 rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-teal-300">
                    <option value="">Todos</option>
                    @foreach($colores as $c)
                        <option value="{{ $c }}" {{ ($filters['color'] ?? '') === $c ? 'selected' : '' }}>{{ $c }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex gap-2">
                <button type="submit"
                        class="px-4 py-1.5 rounded-lg text-sm font-semibold text-white transition hover:opacity-90"
                        style="background-color: #14B8A6;">Filtrar</button>
                <a href="{{ route('materias-primas.index') }}"
                   class="px-4 py-1.5 rounded-lg text-sm font-semibold bg-gray-100 text-gray-700 hover:bg-gray-200 transition">Limpiar</a>
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
        <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-4 text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="text-xs text-gray-500 mb-2">
        Mostrando {{ $materias->firstItem() ?? 0 }}–{{ $materias->lastItem() ?? 0 }} de {{ $materias->total() }} registros
    </div>

    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr style="background-color: #F3F4F6;">
                    <th class="px-4 py-3 text-left font-semibold border-b border-gray-200" style="color:#374151;">Nombre</th>
                    <th class="px-4 py-3 text-left font-semibold border-b border-gray-200" style="color:#374151;">Tipo</th>
                    <th class="px-4 py-3 text-left font-semibold border-b border-gray-200" style="color:#374151;">Color</th>
                    <th class="px-4 py-3 text-left font-semibold border-b border-gray-200" style="color:#374151;">Stock</th>
                    <th class="px-4 py-3 text-left font-semibold border-b border-gray-200" style="color:#374151;">Precio</th>
                    <th class="px-4 py-3 text-left font-semibold border-b border-gray-200" style="color:#374151;">Empleado</th>
                    <th class="px-4 py-3 text-center font-semibold border-b border-gray-200 w-44" style="color:#374151;">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($materias as $m)
                    <tr x-data="{ openEdit: {{ $errors->any() && old('_edit_id') == $m->id ? 'true' : 'false' }} }"
                        onmouseover="this.style.backgroundColor='#E6F9F8'"
                        onmouseout="this.style.backgroundColor=''">

                        <template x-teleport="body">
                            <div x-show="openEdit" x-cloak
                                 class="fixed inset-0 z-50 flex items-center justify-center p-4"
                                 style="background: rgba(0,0,0,0.5);">
                                <div @click.stop
                                     class="bg-white rounded-xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">

                                    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
                                        <h3 class="text-lg font-bold text-gray-900">Editar Materia Prima</h3>
                                        <button @click="openEdit = false" class="text-gray-400 hover:text-gray-600 transition">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    </div>

                                    <form action="{{ route('materias-primas.update', $m->id) }}" method="POST" class="p-6">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="_edit_id" value="{{ $m->id }}">

                                        @if($errors->any() && old('_edit_id') == $m->id)
                                            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-4 text-sm">
                                                <ul class="list-disc list-inside space-y-1">
                                                    @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                                                <input type="text" name="nombre" value="{{ old('nombre', $m->nombre) }}"
                                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Tipo</label>
                                                <input type="text" name="tipo" value="{{ old('tipo', $m->tipo) }}"
                                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Color</label>
                                                <input type="text" name="color" value="{{ old('color', $m->color) }}"
                                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Stock</label>
                                                <input type="number" name="stock" value="{{ old('stock', $m->stock) }}"
                                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Precio</label>
                                                <input type="number" step="0.01" name="precio" value="{{ old('precio', $m->precio) }}"
                                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Empleado</label>
                                                <select name="empleado_id"
                                                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                                                    <option value="">Seleccione un empleado</option>
                                                    @foreach($empleados as $emp)
                                                        <option value="{{ $emp->id }}"
                                                            {{ old('empleado_id', $m->empleado_id) == $emp->id ? 'selected' : '' }}>
                                                            {{ $emp->nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="flex justify-end gap-3 mt-6 pt-4 border-t border-gray-100">
                                            <button type="button" @click="openEdit = false"
                                                    class="px-4 py-2 rounded-lg text-sm font-medium bg-gray-100 text-gray-700 hover:bg-gray-200 transition">
                                                Cancelar
                                            </button>
                                            <button type="submit"
                                                    class="px-4 py-2 rounded-lg text-sm font-medium text-white transition hover:opacity-90"
                                                    style="background-color: #14B8A6;">
                                                Actualizar Materia Prima
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </template>

                        <td class="px-4 py-3 font-medium text-gray-900">{{ $m->nombre }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $m->tipo }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $m->color }}</td>
                        <td class="px-4 py-3 text-gray-700 font-medium">{{ $m->stock }}</td>
                        <td class="px-4 py-3 text-gray-600">${{ number_format($m->precio, 2) }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $m->empleado->nombre ?? 'Sin asignar' }}</td>
                        <td class="px-4 py-3">
                            <div class="flex gap-1.5 justify-center">
                                <button @click="openEdit = true"
                                        class="px-3 py-1 rounded-lg text-xs font-semibold text-white transition hover:opacity-90"
                                        style="background-color: #14B8A6;">
                                    Editar
                                </button>
                                <form action="{{ route('materias-primas.destroy', $m->id) }}" method="POST"
                                      onsubmit="return confirm('¿Eliminar esta materia prima?');" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button class="px-3 py-1 rounded-lg text-xs font-semibold text-white transition hover:opacity-90"
                                            style="background-color: #E11D48;">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-10 text-center text-gray-400">No hay materias primas registradas</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        @if($materias->hasPages())
            <div class="px-4 py-3 border-t border-gray-100 bg-gray-50">{{ $materias->links() }}</div>
        @endif
    </div>
</x-with-sidebar-layout>
