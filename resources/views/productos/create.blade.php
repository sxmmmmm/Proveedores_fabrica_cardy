<x-with-sidebar-layout>

    <x-slot name="header">
        Nuevo Producto
    </x-slot>

    <div class="p-6 max-w-3xl mx-auto">

        <div class="mb-6">
            <a href="{{ route('productos.index') }}" class="text-gray-500 hover:text-gray-700">
                ← Volver
            </a>
        </div>

        @if($errors->any())
            <div class="bg-red-100 text-red-800 p-3 mb-4">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('productos.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-2 gap-4">

                <div>
                    <label class="block mb-1">Nombre</label>
                    <input type="text" name="nombre" class="border p-2 w-full">
                </div>

                <div>
                    <label class="block mb-1">Stock</label>
                    <input type="number" name="stock" class="border p-2 w-full">
                </div>

                <div>
                    <label class="block mb-1">Precio</label>
                    <input type="number" step="0.01" name="precio" class="border p-2 w-full">
                </div>

                <div>
                    <label class="block mb-1">Materia Prima ID</label>
                    <input type="number" name="materia_prima_id" class="border p-2 w-full">
                </div>

            </div>

            <div class="mt-6">
                <button class="w-full bg-green-500 text-white py-2 rounded">
                    Guardar
                </button>
            </div>

        </form>

    </div>

</x-with-sidebar-layout>