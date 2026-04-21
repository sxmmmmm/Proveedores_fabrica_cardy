<x-with-sidebar-layout>
    <x-slot name="header">Salidas de Materia Prima</x-slot>
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('salidas-materia-prima.create') }}"
               style="background-color: #4DC9C2; color: black"
               class="px-4 py-2 rounded">
                + Nueva Salida
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow rounded">
            <table class="w-full text-center border border-gray-300">
                <thead>
                    <tr style="background-color: #F4A7B9;">
                        <th class="p-3 border">Materia Prima</th>
                        <th class="p-3 border">Cantidad</th>
                        <th class="p-3 border">Fecha</th>
                        <th class="p-3 border">Registrado por</th>
                        <th class="p-3 border">Observación</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($salidas as $salida)
                        <tr onmouseover="this.style.backgroundColor='#FCE4EC'"
                            onmouseout="this.style.backgroundColor=''">
                            <td class="p-3 border">{{ $salida->materiaPrima->nombre ?? 'N/A' }}</td>
                            <td class="p-3 border">{{ $salida->cantidad }}</td>
                            <td class="p-3 border">{{ $salida->fecha }}</td>
                            <td class="p-3 border">{{ $salida->usuario_nombre }}</td>
                            <td class="p-3 border">{{ $salida->observacion ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-4 text-gray-500">No hay salidas registradas</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="p-4">{{ $salidas->links() }}</div>
        </div>
    </div>
</x-with-sidebar-layout>