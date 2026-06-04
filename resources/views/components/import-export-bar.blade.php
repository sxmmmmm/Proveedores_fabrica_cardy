{{--
    Componente: resources/views/components/import-export-bar.blade.php
    Uso: <x-import-export-bar :importRoute="..." :exportExcel="..." :exportCsv="..." :exportPdf="..." :filters="$filters" />
--}}

@props(['importRoute', 'exportExcel', 'exportCsv', 'exportPdf', 'filters' => []])

@php
    $qs = !empty($filters) ? '?' . http_build_query(array_filter($filters)) : '';
@endphp

<div class="flex flex-wrap items-center gap-3 mb-6">
    {{-- Importar --}}
    <form action="{{ $importRoute }}" method="POST" enctype="multipart/form-data" class="flex items-center gap-2">
        @csrf
        <label class="flex items-center gap-2 cursor-pointer px-4 py-2 rounded-lg text-sm font-medium text-white transition"
               style="background-color: #14B8A6;"
               onmouseover="this.style.backgroundColor='#0d9488'"
               onmouseout="this.style.backgroundColor='#14B8A6'">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
            </svg>
            Importar CSV/Excel
            <input type="file" name="archivo" accept=".csv,.xlsx,.xls" class="hidden" onchange="this.form.submit()">
        </label>
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
