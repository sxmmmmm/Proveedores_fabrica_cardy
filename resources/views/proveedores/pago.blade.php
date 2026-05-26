<x-with-sidebar-layout>

    <x-slot name="pageTitle">Pago a Proveedor</x-slot>
    <x-slot name="header">Pasarela de Pagos</x-slot>

    <div class="p-6 max-w-5xl mx-auto">

        {{-- Encabezado --}}
        <div class="flex items-center gap-4 mb-6">
            <x-action-button color="gray" href="{{ route('proveedores.index') }}">
                &larr; Volver
            </x-action-button>
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Pago a Proveedor</h2>
                <p class="text-sm text-gray-500 mt-0.5">
                    Registra un pago para <strong>{{ $proveedor->nombre }}</strong>
                    &mdash; {{ $proveedor->empresa }}
                </p>
            </div>
        </div>

        {{-- Alertas --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg mb-5 flex items-center gap-2">
                <svg class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-300 text-red-800 px-4 py-3 rounded-lg mb-5 flex items-center gap-2">
                <svg class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- ══════════════════════════════
                 COLUMNA IZQUIERDA — Info proveedor
            ══════════════════════════════ --}}
            <div class="space-y-4">

                {{-- Tarjeta del proveedor --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center text-white text-xl font-bold shrink-0"
                             style="background-color: #4DC9C2;">
                            {{ strtoupper(substr($proveedor->nombre, 0, 1)) }}
                        </div>
                        <div>
                            <p class="font-bold text-gray-900 leading-tight">{{ $proveedor->nombre }}</p>
                            <p class="text-xs text-gray-500">{{ $proveedor->empresa }}</p>
                        </div>
                    </div>

                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between text-gray-600">
                            <span class="font-medium">Documento</span>
                            <span>{{ $proveedor->documento }}</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span class="font-medium">Teléfono</span>
                            <span>{{ $proveedor->telefono }}</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span class="font-medium">Correo</span>
                            <span class="text-right truncate ml-2">{{ $proveedor->correo }}</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span class="font-medium">Ciudad</span>
                            <span>{{ $proveedor->ciudad }}</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span class="font-medium">Mercancía</span>
                            <span>{{ $proveedor->mercancia }}</span>
                        </div>
                    </div>
                </div>

                {{-- Resumen financiero --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5">
                    <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-4">Resumen Financiero</h3>

                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">Total pagado</span>
                            <span class="text-base font-bold text-green-600">
                                ${{ number_format($pagos->where('estado', 'completado')->sum('monto'), 2) }}
                            </span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">Pagos registrados</span>
                            <span class="text-base font-bold" style="color: #4DC9C2;">
                                {{ $pagos->count() }}
                            </span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">Último pago</span>
                            <span class="text-sm font-semibold text-gray-700">
                                @if($pagos->count() > 0)
                                    {{ $pagos->first()->fecha_pago->format('d/m/Y') }}
                                @else
                                    Sin pagos
                                @endif
                            </span>
                        </div>
                    </div>
                </div>

            </div>

            {{-- ══════════════════════════════
                 COLUMNA DERECHA — Formulario + historial
            ══════════════════════════════ --}}
            <div class="lg:col-span-2 space-y-6">

                {{-- Formulario de nuevo pago --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <h3 class="text-base font-bold text-gray-800 mb-5 pb-3 border-b border-gray-100">
                        Registrar Nuevo Pago
                    </h3>

                    <form action="{{ route('proveedores.pago.store', $proveedor->id) }}" method="POST">
                        @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                            {{-- Monto --}}
                            <div class="sm:col-span-2">
                                <label class="block text-xs font-semibold text-gray-600 mb-1">
                                    Monto a pagar <span class="text-red-400">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 font-bold text-sm">$</span>
                                    <input type="number" name="monto" step="0.01" min="0.01"
                                           value="{{ old('monto') }}"
                                           placeholder="0.00"
                                           class="w-full pl-8 pr-4 py-2.5 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#4DC9C2]
                                                  {{ $errors->has('monto') ? 'border-red-400' : 'border-gray-300' }}">
                                </div>
                                @error('monto')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Método de pago --}}
                            <div>
                                <label class="block text-xs font-semibold text-gray-600 mb-1">
                                    Método de pago <span class="text-red-400">*</span>
                                </label>
                                <select name="metodo_pago"
                                        class="w-full border rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#4DC9C2]
                                               {{ $errors->has('metodo_pago') ? 'border-red-400' : 'border-gray-300' }}">
                                    <option value="">Seleccionar...</option>
                                    <option value="transferencia" {{ old('metodo_pago') == 'transferencia' ? 'selected' : '' }}>Transferencia bancaria</option>
                                    <option value="efectivo"      {{ old('metodo_pago') == 'efectivo'      ? 'selected' : '' }}>Efectivo</option>
                                    <option value="cheque"        {{ old('metodo_pago') == 'cheque'        ? 'selected' : '' }}>Cheque</option>
                                    <option value="nequi"         {{ old('metodo_pago') == 'nequi'         ? 'selected' : '' }}>Nequi</option>
                                    <option value="daviplata"     {{ old('metodo_pago') == 'daviplata'     ? 'selected' : '' }}>Daviplata</option>
                                    <option value="otro"          {{ old('metodo_pago') == 'otro'          ? 'selected' : '' }}>Otro</option>
                                </select>
                                @error('metodo_pago')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Fecha --}}
                            <div>
                                <label class="block text-xs font-semibold text-gray-600 mb-1">
                                    Fecha del pago <span class="text-red-400">*</span>
                                </label>
                                <input type="date" name="fecha_pago"
                                       value="{{ old('fecha_pago', now()->format('Y-m-d')) }}"
                                       class="w-full border rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#4DC9C2]
                                              {{ $errors->has('fecha_pago') ? 'border-red-400' : 'border-gray-300' }}">
                                @error('fecha_pago')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Referencia --}}
                            <div class="sm:col-span-2">
                                <label class="block text-xs font-semibold text-gray-600 mb-1">
                                    Número de referencia / comprobante
                                </label>
                                <input type="text" name="referencia"
                                       value="{{ old('referencia') }}"
                                       placeholder="Ej: TRF-20260526-001"
                                       class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#4DC9C2]">
                            </div>

                            {{-- Concepto --}}
                            <div class="sm:col-span-2">
                                <label class="block text-xs font-semibold text-gray-600 mb-1">
                                    Concepto / Notas
                                </label>
                                <textarea name="concepto" rows="2"
                                          placeholder="Descripción del pago (opcional)..."
                                          class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#4DC9C2] resize-none">{{ old('concepto') }}</textarea>
                            </div>

                        </div>

                        {{-- Botones --}}
                        <div class="flex gap-3 justify-end pt-4 mt-2 border-t border-gray-100">
                            <x-action-button color="gray" href="{{ route('proveedores.index') }}">
                                Cancelar
                            </x-action-button>
                            <x-action-button color="green" type="submit" class="min-w-[150px]">
                                Confirmar Pago
                            </x-action-button>
                        </div>

                    </form>
                </div>

                {{-- Historial de pagos --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <h3 class="text-base font-bold text-gray-800 mb-4 pb-3 border-b border-gray-100">
                        Historial de Pagos
                    </h3>

                    @if($pagos->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead>
                                    <tr style="background-color: #F4A7B9;">
                                        <th class="px-3 py-2 text-left text-white font-semibold rounded-tl-lg">Fecha</th>
                                        <th class="px-3 py-2 text-left text-white font-semibold">Monto</th>
                                        <th class="px-3 py-2 text-left text-white font-semibold">Método</th>
                                        <th class="px-3 py-2 text-left text-white font-semibold">Referencia</th>
                                        <th class="px-3 py-2 text-left text-white font-semibold">Concepto</th>
                                        <th class="px-3 py-2 text-left text-white font-semibold rounded-tr-lg">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pagos as $pago)
                                        <tr class="border-b border-gray-100 hover:bg-pink-50 transition-colors">
                                            <td class="px-3 py-2.5 text-gray-600 whitespace-nowrap">
                                                {{ $pago->fecha_pago->format('d/m/Y') }}
                                            </td>
                                            <td class="px-3 py-2.5 font-bold text-green-600 whitespace-nowrap">
                                                ${{ number_format($pago->monto, 2) }}
                                            </td>
                                            <td class="px-3 py-2.5 text-gray-600 whitespace-nowrap">
                                                {{ $pago->metodo_pago_label }}
                                            </td>
                                            <td class="px-3 py-2.5 text-gray-500 text-xs">
                                                {{ $pago->referencia ?? '—' }}
                                            </td>
                                            <td class="px-3 py-2.5 text-gray-500 text-xs max-w-[180px] truncate">
                                                {{ $pago->concepto ?? '—' }}
                                            </td>
                                            <td class="px-3 py-2.5">
                                                @php
                                                    $estadoClases = match($pago->estado) {
                                                        'completado' => 'bg-green-100 text-green-700',
                                                        'pendiente'  => 'bg-yellow-100 text-yellow-700',
                                                        'anulado'    => 'bg-red-100 text-red-600',
                                                        default      => 'bg-gray-100 text-gray-600',
                                                    };
                                                @endphp
                                                <span class="inline-flex px-2 py-0.5 rounded-full text-xs font-semibold {{ $estadoClases }}">
                                                    {{ ucfirst($pago->estado) }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="bg-gray-50">
                                        <td class="px-3 py-2.5 font-bold text-gray-700 text-sm">Total</td>
                                        <td class="px-3 py-2.5 font-bold text-green-600">
                                            ${{ number_format($pagos->where('estado', 'completado')->sum('monto'), 2) }}
                                        </td>
                                        <td colspan="4"></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-10 text-gray-400">
                            <svg class="w-12 h-12 mx-auto mb-3 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                            </svg>
                            <p class="text-sm">No hay pagos registrados para este proveedor.</p>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>

</x-with-sidebar-layout>