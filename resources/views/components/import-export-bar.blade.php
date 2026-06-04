{{--
    Componente: resources/views/components/import-export-bar.blade.php
    Uso: <x-import-export-bar :importRoute="..." :exportExcel="..." :exportCsv="..." :exportPdf="..." :filters="$filters" />
--}}

@props(['importRoute', 'exportExcel', 'exportCsv', 'exportPdf', 'filters' => []])

@php
    $qs = !empty($filters) ? '?' . http_build_query(array_filter($filters)) : '';
    $hasImportErrors = $errors->has('import_errors') || session('import_modal');
    $uniqueId = 'import_' . substr(md5($importRoute), 0, 8);
@endphp

{{-- ── MODAL DE ERRORES DE IMPORTACIÓN ──────────────────────────────── --}}
<div x-data="{ openImportErrors: {{ $hasImportErrors ? 'true' : 'false' }} }">

    {{-- Modal errores --}}
    <div x-show="openImportErrors" x-cloak
         class="fixed inset-0 z-50 flex items-center justify-center p-4"
         style="background: rgba(0,0,0,0.55);">
        <div @click.stop
             class="bg-white rounded-xl shadow-2xl w-full max-w-lg max-h-[80vh] flex flex-col">

            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200 flex-shrink-0"
                 style="background:#FEF2F2; border-radius:12px 12px 0 0;">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
                    </svg>
                    <h3 class="text-base font-bold text-red-700">Errores en la importación</h3>
                </div>
                <button @click="openImportErrors = false" class="text-gray-400 hover:text-gray-600 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <div class="p-6 overflow-y-auto flex-1">
                <p class="text-sm text-gray-600 mb-4">
                    El archivo contiene errores de validación.
                    Los registros válidos <strong>sí fueron importados</strong>.
                    Corrija los errores indicados para reimportar las filas omitidas.
                </p>
                @if($errors->has('import_errors'))
                    <ul class="space-y-2">
                        @foreach((array) $errors->get('import_errors') as $group)
                            @foreach((array) $group as $msg)
                                <li class="flex items-start gap-2 text-sm bg-red-50 border border-red-100 rounded-lg px-3 py-2 text-red-700">
                                    <svg class="w-4 h-4 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $msg }}
                                </li>
                            @endforeach
                        @endforeach
                    </ul>
                @endif
            </div>

            <div class="px-6 py-4 border-t border-gray-100 bg-gray-50 flex-shrink-0" style="border-radius:0 0 12px 12px;">
                <button @click="openImportErrors = false"
                        class="w-full px-4 py-2 rounded-lg text-sm font-semibold text-white transition hover:opacity-90"
                        style="background-color:#0F172A;">
                    Entendido, cerrar
                </button>
            </div>
        </div>
    </div>

    {{-- ── BARRA DE BOTONES ─────────────────────────────────────────────── --}}
    <div class="flex flex-wrap items-center gap-3 mb-6">

        {{-- ── Importar: form independiente fuera de Alpine para evitar problemas de CSRF --}}
        <form
            id="{{ $uniqueId }}_form"
            action="{{ $importRoute }}"
            method="POST"
            enctype="multipart/form-data"
            style="display:inline;">
            @csrf
            <input
                type="file"
                id="{{ $uniqueId }}_file"
                name="archivo"
                accept=".csv,.xlsx,.xls"
                style="display:none;"
                onchange="document.getElementById('{{ $uniqueId }}_form').submit();">

            <button
                type="button"
                onclick="document.getElementById('{{ $uniqueId }}_file').click()"
                class="flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-medium text-white transition"
                style="background-color: #14B8A6;"
                onmouseover="this.style.backgroundColor='#0d9488'"
                onmouseout="this.style.backgroundColor='#14B8A6'">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                </svg>
                Importar CSV/Excel
            </button>
        </form>

        {{-- Exportar Excel --}}
        <a href="{{ $exportExcel . $qs }}"
           class="flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-medium text-white transition"
           style="background-color: #16A34A;"
           onmouseover="this.style.backgroundColor='#15803d'"
           onmouseout="this.style.backgroundColor='#16A34A'">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            Excel
        </a>

        {{-- Exportar CSV --}}
        <a href="{{ $exportCsv . $qs }}"
           class="flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-medium text-white transition"
           style="background-color: #475569;"
           onmouseover="this.style.backgroundColor='#334155'"
           onmouseout="this.style.backgroundColor='#475569'">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            CSV
        </a>

        {{-- Exportar PDF --}}
        <a href="{{ $exportPdf . $qs }}"
           class="flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-medium text-white transition"
           style="background-color: #BE123C;"
           onmouseover="this.style.backgroundColor='#9f1239'"
           onmouseout="this.style.backgroundColor='#BE123C'">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
            </svg>
            PDF
        </a>

        @if(!empty(array_filter($filters ?? [])))
            <span class="text-xs text-amber-700 bg-amber-100 px-2 py-1 rounded-full font-medium">
                ⚡ Exportando con filtros activos
            </span>
        @endif
    </div>

</div>
