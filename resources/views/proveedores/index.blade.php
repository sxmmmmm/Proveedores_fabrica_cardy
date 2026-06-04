<x-with-sidebar-layout>
    <x-slot name="header">Proveedores</x-slot>

    {{-- ═══════════════════════════════════════════════════════════
         MODAL: CREAR PROVEEDOR
         Se reabre automáticamente si hay errores de validación
         y no viene de una edición (no hay _edit_id en old())
    ════════════════════════════════════════════════════════════ --}}
    <div x-data="{ open: {{ $errors->any() && !old('_edit_id') ? 'true' : 'false' }} }">

        <!-- Botón Nuevo -->
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Gestión de Proveedores</h2>
                <p class="text-sm text-gray-500 mt-0.5">{{ $proveedores->total() }} registros encontrados</p>
            </div>
            <button @click="open = true"
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-semibold text-white transition hover:opacity-90"
                    style="background:#0F172A;">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Nuevo Proveedor
            </button>
        </div>

        <!-- Modal Crear -->
        <div x-show="open" x-cloak
             class="fixed inset-0 z-50 flex items-center justify-center p-4"
             style="background: rgba(0,0,0,0.5);">
            <div @click.stop
                 class="bg-white rounded-xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">

                <!-- Header modal -->
                <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-bold text-gray-900">Nuevo Proveedor</h3>
                    <button @click="open = false" class="text-gray-400 hover:text-gray-600 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <!-- Body / Form -->
                <form action="{{ route('proveedores.store') }}" method="POST" class="p-6">
                    @csrf

                    @if($errors->any() && !old('_edit_id'))
                        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-4 text-sm">
                            <ul class="list-disc list-inside">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
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
                            <label class="block text-sm font-medium text-gray-700 mb-1">Empresa</label>
                            <input type="text" name="empresa" value="{{ old('empresa') }}"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Documento</label>
                            <input type="text" name="documento" value="{{ old('documento') }}"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Teléfono</label>
                            <input type="text" name="telefono" value="{{ old('telefono') }}"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Fecha de Nacimiento</label>
                            <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Correo</label>
                            <input type="email" name="correo" value="{{ old('correo') }}"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Ciudad</label>
                            <input type="text" name="ciudad" value="{{ old('ciudad') }}"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Dirección</label>
                            <input type="text" name="direccion" value="{{ old('direccion') }}"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Mercancía</label>
                            <input type="text" name="mercancia" value="{{ old('mercancia') }}"
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
                            Guardar Proveedor
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Filtros --}}
    <form method="GET" action="{{ route('proveedores.index') }}"
          class="bg-white rounded-xl border border-gray-200 shadow-sm p-4 mb-4">
        <div class="flex flex-wrap gap-3 items-end">
            <div class="flex-1 min-w-[200px]">
                <label class="block text-xs font-semibold text-gray-600 mb-1">Buscar</label>
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Buscar nombre, empresa, documento..."
                       class="w-full border border-gray-300 rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-teal-300">
            </div>
            <div class="min-w-[150px]">
                <label class="block text-xs font-semibold text-gray-600 mb-1">Ciudad</label>
                <select name="ciudad"
                        class="w-full border border-gray-300 rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-teal-300">
                    <option value="">Todas las ciudades</option>
                    @foreach($ciudades as $c)
                        <option value="{{ $c }}" {{ request('ciudad')==$c ? 'selected':'' }}>{{ $c }}</option>
                    @endforeach
                </select>
            </div>
            <div class="min-w-[160px]">
                <label class="block text-xs font-semibold text-gray-600 mb-1">Mercancía</label>
                <select name="mercancia"
                        class="w-full border border-gray-300 rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-teal-300">
                    <option value="">Toda la mercancía</option>
                    @foreach($mercancias as $m)
                        <option value="{{ $m }}" {{ request('mercancia')==$m ? 'selected':'' }}>{{ $m }}</option>
                    @endforeach
                </select>
            </div>
            <div class="min-w-[110px]">
                <label class="block text-xs font-semibold text-gray-600 mb-1">Por página</label>
                <select name="per_page" onchange="this.form.submit()"
                        class="w-full border border-gray-300 rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-teal-300">
                    @foreach([15,25,50,100] as $n)
                        <option value="{{ $n }}" {{ request('per_page',15)==$n ? 'selected':'' }}>{{ $n }} / pág.</option>
                    @endforeach
                </select>
            </div>
            <div class="flex gap-2">
                <button type="submit"
                        class="px-4 py-1.5 rounded-lg text-sm font-semibold text-white transition hover:opacity-90"
                        style="background-color: #14B8A6;">Filtrar</button>
                <a href="{{ route('proveedores.index') }}"
                   class="px-4 py-1.5 rounded-lg text-sm font-semibold bg-gray-100 text-gray-700 hover:bg-gray-200 transition">Limpiar</a>
            </div>
        </div>
    </form>

    {{-- Export / Import --}}
    <x-import-export-bar
        :importRoute="route('proveedores.import')"
        :exportExcel="route('proveedores.export.excel')"
        :exportCsv="route('proveedores.export.csv')"
        :exportPdf="route('proveedores.export.pdf')"
        :filters="request()->only(['search','ciudad','mercancia'])"
    />

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-5 text-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabla --}}
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr style="background:#F3F4F6;">
                    <th class="px-4 py-3 text-left font-semibold text-gray-700 border-b border-gray-200">Nombre</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700 border-b border-gray-200">Empresa</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700 border-b border-gray-200">Documento</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700 border-b border-gray-200">Teléfono</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700 border-b border-gray-200">Correo</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700 border-b border-gray-200">Ciudad</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700 border-b border-gray-200">Mercancía</th>
                    <th class="px-4 py-3 text-center font-semibold text-gray-700 border-b border-gray-200">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($proveedores as $p)
                    {{-- Modal de edición por fila --}}
                    <tr x-data="{ open: {{ $errors->any() && old('_edit_id') == $p->id ? 'true' : 'false' }} }"
                        class="transition-colors"
                        onmouseover="this.style.backgroundColor='#E6F9F8'"
                        onmouseout="this.style.backgroundColor=''">

                        <td class="px-4 py-3 font-medium text-gray-900">{{ $p->nombre }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $p->empresa }}</td>
                        <td class="px-4 py-3 text-gray-500">{{ $p->documento }}</td>
                        <td class="px-4 py-3 text-gray-500">{{ $p->telefono }}</td>
                        <td class="px-4 py-3 text-gray-400 text-xs">{{ $p->correo }}</td>
                        <td class="px-4 py-3 text-gray-700">{{ $p->ciudad }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $p->mercancia }}</td>
                        <td class="px-4 py-3">
                            <div class="flex gap-1.5 justify-center">
                                <!-- Botón abrir modal editar -->
                                <button @click="open = true"
                                        class="px-3 py-1 rounded-lg text-xs font-medium text-white transition hover:opacity-90"
                                        style="background:#14B8A6;">
                                    Editar
                                </button>
                                <form action="{{ route('proveedores.destroy', $p->id) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                            class="px-3 py-1 rounded-lg text-xs font-medium text-white transition hover:opacity-90"
                                            style="background:#E11D48;"
                                            onclick="return confirm('¿Eliminar este proveedor?')">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>

                        {{-- Modal Editar (inline, dentro del tr para acceder al scope de Alpine) --}}
                        <td class="p-0 border-0" style="display:none;">
                            <div x-show="open" x-cloak
                                 class="fixed inset-0 z-50 flex items-center justify-center p-4"
                                 style="background: rgba(0,0,0,0.5);">
                                <div @click.stop
                                     class="bg-white rounded-xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">

                                    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
                                        <h3 class="text-lg font-bold text-gray-900">Editar Proveedor</h3>
                                        <button @click="open = false" class="text-gray-400 hover:text-gray-600 transition">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    </div>

                                    <form action="{{ route('proveedores.update', $p->id) }}" method="POST" class="p-6">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="_edit_id" value="{{ $p->id }}">

                                        @if($errors->any() && old('_edit_id') == $p->id)
                                            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-4 text-sm">
                                                <ul class="list-disc list-inside">
                                                    @foreach($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                                                <input type="text" name="nombre" value="{{ old('nombre', $p->nombre) }}"
                                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Empresa</label>
                                                <input type="text" name="empresa" value="{{ old('empresa', $p->empresa) }}"
                                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Documento</label>
                                                <input type="text" name="documento" value="{{ old('documento', $p->documento) }}"
                                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Teléfono</label>
                                                <input type="text" name="telefono" value="{{ old('telefono', $p->telefono) }}"
                                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Fecha de Nacimiento</label>
                                                <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $p->fecha_nacimiento) }}"
                                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Correo</label>
                                                <input type="email" name="correo" value="{{ old('correo', $p->correo) }}"
                                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Ciudad</label>
                                                <input type="text" name="ciudad" value="{{ old('ciudad', $p->ciudad) }}"
                                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Dirección</label>
                                                <input type="text" name="direccion" value="{{ old('direccion', $p->direccion) }}"
                                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                                            </div>
                                            <div class="md:col-span-2">
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Mercancía</label>
                                                <input type="text" name="mercancia" value="{{ old('mercancia', $p->mercancia) }}"
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
                                                Actualizar Proveedor
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-4 py-10 text-center text-gray-400">No hay proveedores registrados</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-4 py-3 border-t border-gray-100 bg-gray-50">{{ $proveedores->links() }}</div>
    </div>
</x-with-sidebar-layout>
