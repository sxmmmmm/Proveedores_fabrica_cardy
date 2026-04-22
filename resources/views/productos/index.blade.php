<x-with-sidebar-layout>

    <x-slot name="header">
        Productos
    </x-slot>

    <div class="p-6">

        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('productos.create') }}"
               style="background-color: #4DC9C2; color: black"
               class="px-4 py-2 rounded">
                Nuevo Producto
            </a>
        </div>
        <x-import-export-bar
            :importRoute="route('productos.import')"
            :exportExcel="route('productos.export.excel')"
            :exportCsv="route('productos.export.csv')"
            :exportPdf="route('productos.export.pdf')"
        />

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow rounded">

            <table class="w-full text-center border border-gray-300">

                <thead>
                    <tr style="background-color: #F4A7B9;">
                        <th class="p-3 border">Nombre</th>
                        <th class="p-3 border">Stock</th>
                        <th class="p-3 border">Precio</th>
                        <th class="p-3 border">Materia Prima</th>
                        <th class="p-3 border">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($productos as $producto)
                        <tr onmouseover="this.style.backgroundColor='#FCE4EC'" 
                            onmouseout="this.style.backgroundColor=''">

                            <td class="p-3 border">{{ $producto->nombre }}</td>
                            <td class="p-3 border">{{ $producto->stock }}</td>
                            <td class="p-3 border">{{ $producto->precio }}</td>

                            <!-- âœ… RELACIÃ“N SEGURA -->
                            <td class="p-3 border">
                                {{ optional($producto->materiaPrima)->nombre ?? 'Sin materia prima' }}
                            </td>

                            <td class="p-3 border">
                                <div class="flex gap-2 justify-center">

                                    <a href="{{ route('productos.edit', $producto) }}"
                                       style="background-color: #4DC9C2;"
                                       class="text-white px-3 py-1 rounded text-sm">
                                        Editar
                                    </a>

                                    <form action="{{ route('productos.destroy', $producto) }}" method="POST">
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
                            <td colspan="5" class="p-4 text-gray-500">
                                No hay productos registrados
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>

    </div>

</x-with-sidebar-layout>
