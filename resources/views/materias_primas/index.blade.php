    <x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Materias Primas
        </h2>
    </x-slot>

    <div class="p-6">

        <a href="{{ route('materias-primas.create') }}"
           class="bg-green-500 text-black px-4 py-2 rounded">
            Nueva Materia Prima
        </a>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 mt-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">

            <table class="mt-4 w-full text-center border">

                <thead class="bg-gray-200">
                    <tr>
                        <th class="p-2 border">Nombre</th>
                        <th class="p-2 border">Tipo</th>
                        <th class="p-2 border">Color</th>
                        <th class="p-2 border">Stock</th>
                        <th class="p-2 border">Precio</th>
                        <th class="p-2 border">Proveedor ID</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($materias as $m)
                    <tr>
                        <td class="p-2 border">{{ $m->nombre }}</td>
                        <td class="p-2 border">{{ $m->tipo }}</td>
                        <td class="p-2 border">{{ $m->color }}</td>
                        <td class="p-2 border">{{ $m->stock }}</td>
                        <td class="p-2 border">{{ $m->precio }}</td>
                        <td class="p-2 border">{{ $m->proveedor_id }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">No hay materias primas</td>
                    </tr>
                    @endforelse
                </tbody>

            </table>

        </div>

    </div>

</x-app-layout>