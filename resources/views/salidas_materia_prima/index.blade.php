<x-with-sidebar-layout>

    <x-slot name="pageTitle">Historial — Salidas de Materia Prima</x-slot>
    <x-slot name="header">Salidas de Materia Prima</x-slot>

    <div class="p-6">

        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Historial de Salidas</h2>
                <p class="text-sm text-gray-500 mt-1">Trazabilidad completa de salidas de materia prima del inventario.</p>
            </div>
            <a href="{{ route('salidas-materia-prima.create') }}"
               style="background-color: #4DC9C2; color: black"
               class="px-4 py-2 rounded font-medium whitespace-nowrap">
                + Nueva Salida
            </a>
        </div>

        {{-- Panel de filtros --}}
        <form method="GET" action="{{ route('salidas-materia-prima.index') }}"
              class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 mb-4">
            <p class="text-xs font-bold text-gray-500 uppercase tracking-wide mb-3">Filtros de búsqueda</p>
            <div class="flex flex-wrap gap-3 items-end">

                <div class="flex-1 min-w-[180px]">
                    <label class="block text-xs font-semibold text-gray-600 mb-1">Materia Prima</label>
                    <input type="text" name="search" value="{{ $filters['search'] ?? '' }}"
                           placeholder="Nombre de la materia prima..."
                           class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300">
                </div>

                <div class="min-w-[180px]">
                    <label class="block text-xs font-semibold text-gray-600 mb-1">Usuario responsable</label>
                    <select name="user_id" class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300">
                        <option value="">Todos los usuarios</option>
                        @foreach($usuarios as $u)
                            <option value="{{ $u->id }}" {{ ($filters['user_id'] ?? '') == $u->id ? 'selected' : '' }}>
                                {{ $u->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="min-w-[140px]">
                    <label class="block text-xs font-semibold text-gray-600 mb-1">Desde</label>
                    <input type="date" name="fecha_desde" value="{{ $filters['fecha_desde'] ?? '' }}"
                           class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300">
                </div>

                <div class="min-w-[140px]">
                    <label class="block text-xs font-semibold text-gray-600 mb-1">Hasta</label>
                    <input type="date" name="fecha_hasta" value="{{ $filters['fecha_hasta'] ?? '' }}"
                           class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300">
                </div>

                <div class="flex gap-2">
                    <button type="submit" style="background-color: #4DC9C2;"
                            class="text-white px-4 py-1.5 rounded text-sm font-medium">Filtrar</button>
                    <a href="{{ route('salidas-materia-prima.index') }}"
                       class="bg-gray-200 text-gray-700 px-4 py-1.5 rounded text-sm font-medium">Limpiar</a>
                </div>
            </div>
        </form>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">{{ session('success') }}</div>
        @endif

        <div class="text-xs text-gray-500 mb-2">
            Mostrando {{ $salidas->firstItem() ?? 0 }}–{{ $salidas->lastItem() ?? 0 }}
            de {{ $salidas->total() }} registros
            @if(!empty(array_filter($filters ?? [])))
                <span class="ml-2 text-amber-600 font-medium">⚡ Filtros activos</span>
            @endif
        </div>

        <div class="bg-white shadow rounded overflow-x-auto">
            <table style="border-color: #F4A7B9;" class="w-full text-center border border-gray-300 text-sm">
                <thead>
                    <tr style="background-color: #F4A7B9;">
                        <th class="px-3 py-2 border text-white font-semibold">Fecha/Hora Registro</th>
                        <th class="px-3 py-2 border text-white font-semibold">Usuario Responsable</th>
                        <th class="px-3 py-2 border text-white font-semibold">Materia Prima</th>
                        <th class="px-3 py-2 border text-white font-semibold">Cantidad</th>
                        <th class="px-3 py-2 border text-white font-semibold">Fecha Movimiento</th>
                        <th class="px-3 py-2 border text-white font-semibold">Tipo</th>
                        <th class="px-3 py-2 border text-white font-semibold">Observación</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($salidas as $salida)
                        <tr onmouseover="this.style.backgroundColor='#FCE4EC'"
                            onmouseout="this.style.backgroundColor=''">
                            <td class="px-3 py-2 border font-mono text-xs">
                                {{ $salida->created_at->format('d/m/Y H:i:s') }}
                            </td>
                            <td class="px-3 py-2 border">
                                @if($salida->user)
                                    <span class="inline-flex items-center gap-1">
                                        <span class="w-6 h-6 rounded-full text-white text-xs flex items-center justify-center font-bold"
                                              style="background-color: #F4A7B9;">
                                            {{ strtoupper(substr($salida->user->name, 0, 1)) }}
                                        </span>
                                        {{ $salida->user->name }}
                                    </span>
                                @else
                                    <span class="text-gray-400 italic">{{ $salida->usuario_nombre ?? 'N/A' }}</span>
                                @endif
                            </td>
                            <td class="px-3 py-2 border font-medium">
                                {{ $salida->materiaPrima->nombre ?? 'N/A' }}
                            </td>
                            <td class="px-3 py-2 border font-bold text-red-600">
                                -{{ $salida->cantidad }}
                            </td>
                            <td class="px-3 py-2 border">
                                {{ $salida->fecha->format('d/m/Y') }}
                            </td>
                            <td class="px-3 py-2 border">
                                <span class="px-2 py-0.5 rounded-full text-xs font-semibold text-white"
                                      style="background-color: #F4A7B9;">
                                    SALIDA
                                </span>
                            </td>
                            <td class="px-3 py-2 border text-gray-500 text-xs">
                                {{ $salida->observacion ?? '-' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-6 text-gray-500">No hay salidas registradas</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($salidas->hasPages())
            <div class="mt-4">{{ $salidas->links() }}</div>
        @endif

    </div>

</x-with-sidebar-layout>
