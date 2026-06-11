<x-with-sidebar-layout>
    <x-slot name="pageTitle">Gestión de Empleados</x-slot>
    <x-slot name="header">Empleados</x-slot>

    {{-- ═══ MODAL CREAR EMPLEADO ═══ --}}
    <div x-data="{ open: {{ ($errors->any() && !old('_edit_id')) || request('open_modal') ? 'true' : 'false' }} }">

        <!-- Encabezado -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Gestión de Empleados</h2>
                <p class="text-sm text-gray-500 mt-1">{{ $empleados->total() }} registros encontrados</p>
            </div>
            <button @click="open = true"
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-semibold text-white transition hover:opacity-90"
                    style="background-color: #0F172A;">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Nuevo Empleado
            </button>
        </div>

        <!-- Modal Crear -->
        <div x-show="open" x-cloak
             class="fixed inset-0 z-50 flex items-center justify-center p-4"
             style="background: rgba(0,0,0,0.5);">
            <div @click.stop
                 class="bg-white rounded-xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">

                <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-bold text-gray-900">Nuevo Empleado</h3>
                    <button @click="open = false" class="text-gray-400 hover:text-gray-600 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <form action="{{ route('empleados.store') }}" method="POST" class="p-6">
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
                            <label class="block text-sm font-medium text-gray-700 mb-1">Documento *</label>
                            <input type="text" name="documento" value="{{ old('documento') }}" required
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nombre Completo *</label>
                            <input type="text" name="nombre" value="{{ old('nombre') }}" required
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Teléfono</label>
                            <input type="tel" name="telefono" value="{{ old('telefono') }}"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Correo Electrónico</label>
                            <input type="email" name="correo" value="{{ old('correo') }}"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Cargo</label>
                            <input type="text" name="cargo" value="{{ old('cargo') }}" placeholder="Ej: Operario, Supervisor..."
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Ciudad</label>
                            <input type="text" name="ciudad" value="{{ old('ciudad') }}"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Dirección</label>
                            <input type="text" name="direccion" value="{{ old('direccion') }}"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
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
                            Guardar Empleado
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Filtros --}}
    <form method="GET" action="{{ route('empleados.index') }}"
          class="bg-white rounded-xl border border-gray-200 shadow-sm p-4 mb-4">
        <div class="flex flex-wrap gap-3 items-end">
            <div class="flex-1 min-w-[180px]">
                <label class="block text-xs font-semibold text-gray-600 mb-1">Buscar</label>
                <input type="text" name="search" value="{{ $filters['search'] ?? '' }}"
                       placeholder="Nombre, documento, correo..."
                       class="w-full border border-gray-300 rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-teal-300">
            </div>
            <div class="min-w-[140px]">
                <label class="block text-xs font-semibold text-gray-600 mb-1">Cargo</label>
                <select name="cargo" class="w-full border border-gray-300 rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-teal-300">
                    <option value="">Todos</option>
                    @foreach($cargos as $c)
                        <option value="{{ $c }}" {{ ($filters['cargo'] ?? '') === $c ? 'selected' : '' }}>{{ $c }}</option>
                    @endforeach
                </select>
            </div>
            <div class="min-w-[140px]">
                <label class="block text-xs font-semibold text-gray-600 mb-1">Ciudad</label>
                <select name="ciudad" class="w-full border border-gray-300 rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-teal-300">
                    <option value="">Todas</option>
                    @foreach($ciudades as $c)
                        <option value="{{ $c }}" {{ ($filters['ciudad'] ?? '') === $c ? 'selected' : '' }}>{{ $c }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex gap-2">
                <button type="submit"
                        class="px-4 py-1.5 rounded-lg text-sm font-semibold text-white transition hover:opacity-90"
                        style="background-color: #14B8A6;">Filtrar</button>
                <a href="{{ route('empleados.index') }}"
                   class="px-4 py-1.5 rounded-lg text-sm font-semibold bg-gray-100 text-gray-700 hover:bg-gray-200 transition">Limpiar</a>
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
        <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-4 text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="text-xs text-gray-500 mb-2">
        Mostrando {{ $empleados->firstItem() ?? 0 }}–{{ $empleados->lastItem() ?? 0 }} de {{ $empleados->total() }} registros
    </div>

    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr style="background-color: #F3F4F6;">
                    <th class="px-4 py-3 text-left font-semibold border-b border-gray-200" style="color:#374151;">Nombre</th>
                    <th class="px-4 py-3 text-left font-semibold border-b border-gray-200" style="color:#374151;">Documento</th>
                    <th class="px-4 py-3 text-left font-semibold border-b border-gray-200" style="color:#374151;">Cargo</th>
                    <th class="px-4 py-3 text-left font-semibold border-b border-gray-200" style="color:#374151;">Teléfono</th>
                    <th class="px-4 py-3 text-left font-semibold border-b border-gray-200" style="color:#374151;">Correo</th>
                    <th class="px-4 py-3 text-left font-semibold border-b border-gray-200" style="color:#374151;">Ciudad</th>
                    <th class="px-4 py-3 text-center font-semibold border-b border-gray-200 w-44" style="color:#374151;">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($empleados as $empleado)
                    <tr x-data="{ openEdit: {{ $errors->any() && old('_edit_id') == $empleado->id ? 'true' : 'false' }} }"
                        onmouseover="this.style.backgroundColor='#E6F9F8'"
                        onmouseout="this.style.backgroundColor=''">

                        <template x-teleport="body">
                            <div x-show="openEdit" x-cloak
                                 class="fixed inset-0 z-50 flex items-center justify-center p-4"
                                 style="background: rgba(0,0,0,0.5);">
                                <div @click.stop
                                     class="bg-white rounded-xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">

                                    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
                                        <h3 class="text-lg font-bold text-gray-900">Editar Empleado</h3>
                                        <button @click="openEdit = false" class="text-gray-400 hover:text-gray-600 transition">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    </div>

                                    <form action="{{ route('empleados.update', $empleado->id) }}" method="POST" class="p-6">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="_edit_id" value="{{ $empleado->id }}">

                                        @if($errors->any() && old('_edit_id') == $empleado->id)
                                            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-4 text-sm">
                                                <ul class="list-disc list-inside space-y-1">
                                                    @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Documento *</label>
                                                <input type="text" name="documento" value="{{ old('documento', $empleado->documento) }}" required
                                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Nombre Completo *</label>
                                                <input type="text" name="nombre" value="{{ old('nombre', $empleado->nombre) }}" required
                                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Teléfono</label>
                                                <input type="tel" name="telefono" value="{{ old('telefono', $empleado->telefono) }}"
                                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Correo</label>
                                                <input type="email" name="correo" value="{{ old('correo', $empleado->correo) }}"
                                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Cargo</label>
                                                <input type="text" name="cargo" value="{{ old('cargo', $empleado->cargo) }}"
                                                       placeholder="Ej: Operario, Supervisor..."
                                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Ciudad</label>
                                                <input type="text" name="ciudad" value="{{ old('ciudad', $empleado->ciudad) }}"
                                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                                            </div>
                                            <div class="md:col-span-2">
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Dirección</label>
                                                <input type="text" name="direccion" value="{{ old('direccion', $empleado->direccion) }}"
                                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
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
                                                Actualizar Empleado
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </template>

                        <td class="px-4 py-3 font-medium text-gray-900">{{ $empleado->nombre }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $empleado->documento }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $empleado->cargo ?? 'N/A' }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $empleado->telefono ?? 'N/A' }}</td>
                        <td class="px-4 py-3 text-gray-500 text-xs">{{ $empleado->correo ?? 'N/A' }}</td>
                        <td class="px-4 py-3 text-gray-700">{{ $empleado->ciudad ?? 'N/A' }}</td>
                        <td class="px-4 py-3">
                            <div class="flex gap-1.5 justify-center items-center">
                                <button @click="openEdit = true"
                                        class="px-3 py-1.5 min-w-[60px] rounded-lg text-xs font-semibold text-white transition hover:opacity-90"
                                        style="background-color: #14B8A6;">
                                    Editar
                                </button>
                                <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST"
                                      onsubmit="return confirm('¿Eliminar este empleado?');" style="display:contents;">
                                    @csrf @method('DELETE')
                                    <button class="px-3 py-1.5 min-w-[60px] rounded-lg text-xs font-semibold text-white transition hover:opacity-90"
                                            style="background-color: #E11D48;">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-10 text-center text-gray-400">No hay empleados registrados</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        @if($empleados->hasPages())
            <div class="px-4 py-3 border-t border-gray-100 bg-gray-50">{{ $empleados->links() }}</div>
        @endif
    </div>
</x-with-sidebar-layout>
