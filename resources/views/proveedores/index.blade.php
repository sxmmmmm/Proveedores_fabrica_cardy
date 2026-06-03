<x-with-sidebar-layout>
    <x-slot name="header">Proveedores</x-slot>

    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Gestión de Proveedores</h2>
            <p class="text-sm text-gray-500 mt-0.5">{{ $proveedores->total() }} registros encontrados</p>
        </div>
        <a href="{{ route('proveedores.create') }}"
           class="inline-flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-semibold transition hover:opacity-90"
           style="background:#111827; color:#fff;">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Nuevo Proveedor
        </a>
    </div>

    {{-- Filtros --}}
    <x-filter-card :action="route('proveedores.index')" :hasFilters="request()->hasAny(['search','ciudad','mercancia','per_page'])">
        <input type="text" name="search" value="{{ request('search') }}"
               placeholder="Buscar nombre, empresa, documento..."
               class="col-span-2 w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-300 bg-gray-50">

        <select name="ciudad"
                class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-300 bg-gray-50">
            <option value="">Todas las ciudades</option>
            @foreach($ciudades as $c)
                <option value="{{ $c }}" {{ request('ciudad')==$c ? 'selected':'' }}>{{ $c }}</option>
            @endforeach
        </select>

        <select name="mercancia"
                class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-300 bg-gray-50">
            <option value="">Toda la mercancía</option>
            @foreach($mercancias as $m)
                <option value="{{ $m }}" {{ request('mercancia')==$m ? 'selected':'' }}>{{ $m }}</option>
            @endforeach
        </select>

        <x-slot name="actions">
            <select name="per_page" onchange="this.form.submit()"
                    class="border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none bg-gray-50">
                @foreach([15,25,50,100] as $n)
                    <option value="{{ $n }}" {{ request('per_page',15)==$n ? 'selected':'' }}>{{ $n }} / pág.</option>
                @endforeach
            </select>
        </x-slot>
    </x-filter-card>

    {{-- Export / Import --}}
    <x-export-buttons
        :excel="route('proveedores.export.excel', request()->only(['search','ciudad','mercancia']))"
        :csv="route('proveedores.export.csv', request()->only(['search','ciudad','mercancia']))"
        :pdf="route('proveedores.export.pdf', request()->only(['search','ciudad','mercancia']))"
        :importRoute="route('proveedores.import')"
    />

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-5 text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr style="background:#F4A7B9;">
                    <th class="px-4 py-3 text-left font-semibold text-gray-800 border-b border-pink-200">Nombre</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-800 border-b border-pink-200">Empresa</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-800 border-b border-pink-200">Documento</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-800 border-b border-pink-200">Teléfono</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-800 border-b border-pink-200">Correo</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-800 border-b border-pink-200">Ciudad</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-800 border-b border-pink-200">Mercancía</th>
                    <th class="px-4 py-3 text-center font-semibold text-gray-800 border-b border-pink-200">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($proveedores as $p)
                    <tr class="hover:bg-pink-50 transition-colors">
                        <td class="px-4 py-3 font-medium text-gray-900">{{ $p->nombre }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $p->empresa }}</td>
                        <td class="px-4 py-3 text-gray-500">{{ $p->documento }}</td>
                        <td class="px-4 py-3 text-gray-500">{{ $p->telefono }}</td>
                        <td class="px-4 py-3 text-gray-400 text-xs">{{ $p->correo }}</td>
                        <td class="px-4 py-3 text-gray-700">{{ $p->ciudad }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $p->mercancia }}</td>
                        <td class="px-4 py-3">
                            <div class="flex gap-1.5 justify-center">
                                <a href="{{ route('proveedores.edit', $p->id) }}"
                                   class="px-3 py-1 rounded-lg text-xs font-medium transition hover:opacity-90"
                                   style="background:#4DC9C2; color:#111;">Editar</a>
                                <form action="{{ route('proveedores.destroy', $p->id) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button class="px-3 py-1 rounded-lg text-xs font-medium transition hover:opacity-90"
                                            style="background:#F4A7B9; color:#111;"
                                            onclick="return confirm('¿Eliminar este proveedor?')">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="8" class="px-4 py-10 text-center text-gray-400">No hay proveedores registrados</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-4 py-3 border-t border-gray-100 bg-gray-50">{{ $proveedores->links() }}</div>
    </div>
</x-with-sidebar-layout>
