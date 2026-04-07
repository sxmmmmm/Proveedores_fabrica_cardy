<x-with-sidebar-layout>

    <x-slot name="header">
        Materias Primas
    </x-slot>

    <div class="p-6">

        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('materias-primas.create') }}"
               style="background-color: #4DC9C2; color: black"
               class="px-4 py-2 rounded">
                Nueva Materia Prima
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow rounded">

            <table style="border-color: #F4A7B9;" class="w-full text-center border border-gray-300">

                <thead>
                    <tr style="background-color: #F4A7B9;">
                        <th class="p-3 border">Nombre</th>
                        <th class="p-3 border">Tipo</th>
                        <th class="p-3 border">Color</th>
                        <th class="p-3 border">Stock</th>
                        <th class="p-3 border">Precio</th>
                        <th class="p-3 border">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($materias as $m)
                        <tr onmouseover="this.style.backgroundColor='#FCE4EC'" 
                            onmouseout="this.style.backgroundColor=''">

                            <td class="p-3 border">{{ $m->nombre }}</td>
                            <td class="p-3 border">{{ $m->tipo }}</td>
                            <td class="p-3 border">{{ $m->color }}</td>
                            <td class="p-3 border">{{ $m->stock }}</td>
                            <td class="p-3 border">{{ $m->precio }}</td>

                            <td class="p-3 border">
                                <div class="flex gap-2 justify-center">

                                    <a href="{{ route('materias-primas.edit', $m) }}"
                                       style="background-color: #4DC9C2;"
                                       class="text-white px-3 py-1 rounded text-sm">
                                        Editar
                                    </a>

                                    <form action="{{ route('materias-primas.destroy', $m) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button style="background-color: #F4A7B9;"
                                                class="text-white px-3 py-1 rounded text-sm">
                                            Eliminar
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-4 text-gray-500">
                                No hay materias primas
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>

    </div>

</x-with-sidebar-layout>