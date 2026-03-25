<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Editar Materia Prima
        </h2>
    </x-slot>

    <div class="p-6 max-w-3xl mx-auto">

        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('materias-primas.index') }}"
               style="color: black;"
               class="text-gray-500 hover:text-gray-700">
                ← Volver a la lista
            </a>
        </div>

        @if($errors->any())
            <div class="bg-red-100 text-red-800 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded-lg shadow-md p-6">
            <form action="{{ route('materias-primas.update', $materiaPrima) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="grid grid-cols-2 gap-4">

                    <div>
                        <label class="block text-sm font-medium text-black mb-1">Nombre</label>
                        <input type="text" name="nombre" value="{{ $materiaPrima->nombre }}" class="border p-2 w-full">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-black mb-1">Tipo</label>
                        <input type="text" name="tipo" value="{{ $materiaPrima->tipo }}" class="border p-2 w-full">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-black mb-1">Color</label>
                        <input type="text" name="color" value="{{ $materiaPrima->color }}" class="border p-2 w-full">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-black mb-1">Stock</label>
                        <input type="number" name="stock" value="{{ $materiaPrima->stock }}" class="border p-2 w-full">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-black mb-1">Precio</label>
                        <input type="number" step="0.01" name="precio" value="{{ $materiaPrima->precio }}" class="border p-2 w-full">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-black mb-1">ID Proveedor</label>
                        <select name="proveedor_id" class="border p-2 w-full">
                            <option value="">Seleccione un proveedor</option>
                            @foreach($proveedores as $proveedor)
                                <option value="{{ $proveedor->id }}"
                                    {{ $materiaPrima->proveedor_id == $proveedor->id ? 'selected' : '' }}>
                                    {{ $proveedor->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="mt-6">
                    <button style="background-color: #4DC9C2; color: black"
                        class="w-full py-2 rounded">
                        Actualizar Materia Prima
                    </button>
                </div>

            </form>
        </div>

    </div>

</x-app-layout>