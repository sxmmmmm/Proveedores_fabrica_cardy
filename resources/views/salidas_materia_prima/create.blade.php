<x-with-sidebar-layout>
    <x-slot name="header">Registrar Salida de Materia Prima</x-slot>
    <div class="p-6 max-w-2xl mx-auto">
        <div class="bg-white shadow rounded p-6">

            @if($errors->any())
                <div class="bg-red-100 text-red-800 px-4 py-3 rounded mb-4">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('salidas-materia-prima.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Materia Prima</label>
                    <select name="materia_prima_id" required
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="">-- Seleccionar --</option>
                        @foreach($materiasPrimas as $mp)
                            <option value="{{ $mp->id }}" {{ old('materia_prima_id') == $mp->id ? 'selected' : '' }}>
                                {{ $mp->nombre }} (Stock actual: {{ $mp->stock }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Cantidad</label>
                    <input type="number" name="cantidad" min="1" value="{{ old('cantidad') }}" required
                           class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Fecha</label>
                    <input type="date" name="fecha" value="{{ old('fecha', date('Y-m-d')) }}" required
                           class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Registrado por</label>
                    <input type="text" name="usuario_nombre" value="{{ old('usuario_nombre') }}" required
                           placeholder="Nombre de quien registra"
                           class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Observación (opcional)</label>
                    <textarea name="observacion" rows="3"
                              class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('observacion') }}</textarea>
                </div>

                <div class="flex gap-3">
                    <button type="submit"
                            style="background-color: #F4A7B9; color: black"
                            class="px-6 py-2 rounded font-medium">
                        Registrar Salida
                    </button>
                    <a href="{{ route('salidas-materia-prima.index') }}"
                       class="px-6 py-2 rounded bg-gray-200 text-gray-700">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-with-sidebar-layout>