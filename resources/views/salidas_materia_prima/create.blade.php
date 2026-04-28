<x-with-sidebar-layout>

    <x-slot name="pageTitle">Nueva Salida de Materia Prima</x-slot>
    <x-slot name="header">Salidas de Materia Prima</x-slot>

    <div class="p-6 max-w-2xl mx-auto">
        <div class="bg-white shadow rounded-lg overflow-hidden">

            <div class="px-6 py-4" style="background: linear-gradient(to right, #f9a8b8, #fbc8d4);">
                <h3 class="text-lg font-bold text-white">Registrar Nueva Salida</h3>
                <p class="text-xs text-pink-100 mt-0.5">
                    Registrado por: <strong>{{ auth()->user()->name }}</strong>
                    &mdash; {{ now()->format('d/m/Y H:i') }}
                </p>
            </div>

            <div class="p-6">
                @if($errors->any())
                    <div class="bg-red-100 text-red-800 px-4 py-3 rounded mb-4">
                        <ul class="list-disc list-inside text-sm">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('salidas-materia-prima.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Materia Prima</label>
                        <select name="materia_prima_id" required
                                class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300">
                            <option value="">-- Seleccionar --</option>
                            @foreach($materiasPrimas as $mp)
                                <option value="{{ $mp->id }}" {{ old('materia_prima_id') == $mp->id ? 'selected' : '' }}>
                                    {{ $mp->nombre }} — Stock disponible: {{ $mp->stock }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Cantidad a retirar</label>
                        <input type="number" name="cantidad" min="1" value="{{ old('cantidad') }}" required
                               class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Fecha del movimiento</label>
                        <input type="date" name="fecha" value="{{ old('fecha', date('Y-m-d')) }}" required
                               class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Observación <span class="text-gray-400 font-normal">(opcional)</span></label>
                        <textarea name="observacion" rows="3"
                                  class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300"
                                  placeholder="Notas adicionales sobre esta salida...">{{ old('observacion') }}</textarea>
                    </div>

                    <div class="flex gap-3 pt-2">
                        <button type="submit"
                                style="background-color: #F4A7B9; color: black"
                                class="px-6 py-2 rounded font-semibold text-sm">
                            ✓ Registrar Salida
                        </button>
                        <a href="{{ route('salidas-materia-prima.index') }}"
                           class="px-6 py-2 rounded bg-gray-200 text-gray-700 text-sm">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-with-sidebar-layout>
