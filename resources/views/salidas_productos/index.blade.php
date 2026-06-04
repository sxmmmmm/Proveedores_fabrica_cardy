<x-with-sidebar-layout>
    <x-slot name="pageTitle">Historial — Salidas de Productos</x-slot>
    <x-slot name="header">Salidas de Productos</x-slot>

    {{-- ═══ MODAL REGISTRAR SALIDA PRODUCTO ═══ --}}
    <div x-data="{ open: {{ $errors->any() ? 'true' : 'false' }} }">

        <!-- Encabezado -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Historial de Salidas de Productos</h2>
                <p class="text-sm text-gray-500 mt-1">Trazabilidad completa de salidas de productos hacia clientes.</p>
            </div>
            <button @click="open = true"
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-semibold text-white transition hover:opacity-90"
                    style="background-color: #0F172A;">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Nueva Salida
            </button>
        </div>

        <!-- Modal Nueva Salida Producto -->
        <div x-show="open" x-cloak
             class="fixed inset-0 z-50 flex items-center justify-center p-4"
             style="background: rgba(0,0,0,0.5);">
            <div @click.stop
                 class="bg-white rounded-xl shadow-2xl w-full max-w-lg max-h-[90vh] overflow-y-auto">

                <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">Registrar Nueva Salida de Producto</h3>
                        <p class="text-xs text-gray-500 mt-0.5">
                            Por: <strong>{{ auth()->user()->name }}</strong> — {{ now()->format('d/m/Y H:i') }}
                        </p>
                    </div>
                    <button @click="open = false" class="text-gray-400 hover:text-gray-600 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <form action="{{ route('salidas-productos.store') }}" method="POST" class="p-6 space-y-4">
                    @csrf

                    @if($errors->any())
                        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm">
                            <ul class="list-disc list-inside space-y-1">
                                @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                            </ul>
                        </div>
                    @endif

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Producto *</label>
                        <select name="producto_id" required
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                            <option value="">— Seleccionar —</option>
                            @foreach($productos as $producto)
                                <option value="{{ $producto->id }}" {{ old('producto_id') == $producto->id ? 'selected' : '' }}>
                                    {{ $producto->nombre }} — Stock: {{ $producto->stock }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Cliente *</label>
                        <select name="cliente_id" required
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                            <option value="">— Seleccionar —</option>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>
                                    {{ $cliente->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Cantidad *</label>
                        <input type="number" name="cantidad" min="1" value="{{ old('cantidad') }}" required
                               class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Fecha del movimiento *</label>
                        <input type="date" name="fecha" value="{{ old('fecha', date('Y-m-d')) }}" required
                               class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Observación <span class="text-gray-400 font-normal text-xs">(opcional)</span></label>
                        <textarea name="observacion" rows="3"
                                  class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400"
                                  placeholder="Notas adicionales...">{{ old('observacion') }}</textarea>
                    </div>

                    <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                        <button type="button" @click="open = false"
                                class="px-4 py-2 rounded-lg text-sm font-medium bg-gray-100 text-gray-700 hover:bg-gray-200 transition">
                            Cancelar
                        </button>
                        <button type="submit"
                                class="px-4 py-2 rounded-lg text-sm font-medium text-white transition hover:opacity-90"
                                style="background-color: #14B8A6;">
                            ✓ Registrar Salida
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Filtros --}}
    <form method="GET" action="{{ route('salidas-productos.index') }}"
          class="bg-white rounded-xl border border-gray-200 shadow-sm p-4 mb-4">
        <p class="text-xs font-bold text-gray-500 uppercase tracking-wide mb-3">Filtros de búsqueda</p>
        <div class="flex flex-wrap gap-3 items-end">
            <div class="flex-1 min-w-[180px]">
                <label class="block text-xs font-semibold text-gray-600 mb-1">Producto</label>
                <input type="text" name="search" value="{{ $filters['search'] ?? '' }}"
                       placeholder="Nombre del producto..."
                       class="w-full border border-gray-300 rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-teal-300">
            </div>
            <div class="min-w-[180px]">
                <label class="block text-xs font-semibold text-gray-600 mb-1">Usuario responsable</label>
                <select name="user_id" class="w-full border border-gray-300 rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-teal-300">
                    <option value="">Todos los usuarios</option>
                    @foreach($usuarios as $u)
                        <option value="{{ $u->id }}" {{ ($filters['user_id'] ?? '') == $u->id ? 'selected' : '' }}>{{ $u->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="min-w-[140px]">
                <label class="block text-xs font-semibold text-gray-600 mb-1">Desde</label>
                <input type="date" name="fecha_desde" value="{{ $filters['fecha_desde'] ?? '' }}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-teal-300">
            </div>
            <div class="min-w-[140px]">
                <label class="block text-xs font-semibold text-gray-600 mb-1">Hasta</label>
                <input type="date" name="fecha_hasta" value="{{ $filters['fecha_hasta'] ?? '' }}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-teal-300">
            </div>
            <div class="flex gap-2">
                <button type="submit"
                        class="px-4 py-1.5 rounded-lg text-sm font-semibold text-white transition hover:opacity-90"
                        style="background-color: #14B8A6;">Filtrar</button>
                <a href="{{ route('salidas-productos.index') }}"
                   class="px-4 py-1.5 rounded-lg text-sm font-semibold bg-gray-100 text-gray-700 hover:bg-gray-200 transition">Limpiar</a>
            </div>
        </div>
    </form>

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-4 text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="text-xs text-gray-500 mb-2">
        Mostrando {{ $salidas->firstItem() ?? 0 }}–{{ $salidas->lastItem() ?? 0 }}
        de {{ $salidas->total() }} registros
        @if(!empty(array_filter($filters ?? [])))
            <span class="ml-2 text-amber-600 font-medium">⚡ Filtros activos</span>
        @endif
    </div>

    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr style="background-color: #F3F4F6;">
                    <th class="px-4 py-3 text-left font-semibold border-b border-gray-200" style="color:#374151;">Fecha/Hora Registro</th>
                    <th class="px-4 py-3 text-left font-semibold border-b border-gray-200" style="color:#374151;">Usuario</th>
                    <th class="px-4 py-3 text-left font-semibold border-b border-gray-200" style="color:#374151;">Producto</th>
                    <th class="px-4 py-3 text-left font-semibold border-b border-gray-200" style="color:#374151;">Cliente</th>
                    <th class="px-4 py-3 text-left font-semibold border-b border-gray-200" style="color:#374151;">Cantidad</th>
                    <th class="px-4 py-3 text-left font-semibold border-b border-gray-200" style="color:#374151;">Fecha Movimiento</th>
                    <th class="px-4 py-3 text-left font-semibold border-b border-gray-200" style="color:#374151;">Tipo</th>
                    <th class="px-4 py-3 text-left font-semibold border-b border-gray-200" style="color:#374151;">Observación</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($salidas as $salida)
                    <tr onmouseover="this.style.backgroundColor='#E6F9F8'"
                        onmouseout="this.style.backgroundColor=''">
                        <td class="px-4 py-3 font-mono text-xs text-gray-600">
                            {{ $salida->created_at->format('d/m/Y H:i:s') }}
                        </td>
                        <td class="px-4 py-3">
                            @if($salida->user)
                                <span class="inline-flex items-center gap-1.5">
                                    <span class="w-6 h-6 rounded-full text-white text-xs flex items-center justify-center font-bold flex-shrink-0"
                                          style="background-color: #E11D48;">
                                        {{ strtoupper(substr($salida->user->name, 0, 1)) }}
                                    </span>
                                    <span class="text-gray-700">{{ $salida->user->name }}</span>
                                </span>
                            @else
                                <span class="text-gray-400 italic text-xs">{{ $salida->usuario_nombre ?? 'N/A' }}</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 font-medium text-gray-900">{{ $salida->producto->nombre ?? 'N/A' }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $salida->cliente->nombre ?? 'N/A' }}</td>
                        <td class="px-4 py-3 font-bold text-red-600">-{{ $salida->cantidad }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $salida->fecha->format('d/m/Y') }}</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-0.5 rounded-full text-xs font-semibold text-white"
                                  style="background-color: #E11D48;">
                                SALIDA
                            </span>
                        </td>
                        <td class="px-4 py-3 text-gray-500 text-xs">{{ $salida->observacion ?? '—' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-4 py-10 text-center text-gray-400">No hay salidas registradas</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        @if($salidas->hasPages())
            <div class="px-4 py-3 border-t border-gray-100 bg-gray-50">{{ $salidas->links() }}</div>
        @endif
    </div>
</x-with-sidebar-layout>
