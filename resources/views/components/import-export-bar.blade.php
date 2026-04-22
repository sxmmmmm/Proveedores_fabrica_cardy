{{-- 
    Componente: resources/views/components/import-export-bar.blade.php
    Uso: <x-import-export-bar :importRoute="route('productos.import')" :exportExcel="route('productos.export.excel')" :exportCsv="route('productos.export.csv')" :exportPdf="route('productos.export.pdf')" />
--}}

@props(['importRoute', 'exportExcel', 'exportCsv', 'exportPdf'])

<div class="flex flex-wrap items-center gap-3 mb-6">
    {{-- Importar --}}
    <form action="{{ $importRoute }}" method="POST" enctype="multipart/form-data" class="flex items-center gap-2">
        @csrf
        <label class="flex items-center gap-2 cursor-pointer px-4 py-2 rounded-lg text-sm font-medium text-white transition" style="background-color: #4DC9C2;">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
            </svg>
            Importar CSV/Excel
            <input type="file" name="archivo" accept=".csv,.xlsx,.xls" class="hidden" onchange="this.form.submit()">
        </label>
    </form>

    {{-- Exportar Excel --}}
    <a href="{{ $exportExcel }}" class="flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-medium text-white transition" style="background-color: #1D6F42;">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
        </svg>
        Excel
    </a>

    {{-- Exportar CSV --}}
    <a href="{{ $exportCsv }}" class="flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-medium text-white transition" style="background-color: #6B7280;">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
        </svg>
        CSV
    </a>

    {{-- Exportar PDF --}}
    <a href="{{ $exportPdf }}" class="flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-medium text-white transition" style="background-color: #fab8c7;">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
        </svg>
        PDF
    </a>

    @if(session('success'))
        <span class="text-sm text-green-600 font-medium">✅ {{ session('success') }}</span>
    @endif
</div>
