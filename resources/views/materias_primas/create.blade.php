<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nueva Materia Prima
        </h2>
    </x-slot>

    <div class="p-6 max-w-3xl mx-auto">

    <div class="flex justify-between items-center mb-6">
    <a href="{{ route('materias-primas.index') }}"
       class="text-gray-500 hover:text-gray-700">
        ← Volver a la lista
    </a>
</div>

        @if($errors->any())
            <div class="bg-red-100 text-red-800 p-3 mb-4">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('materias-primas.store') }}" method="POST">
            @csrf

            <input type="text" name="nombre" placeholder="Nombre" class="border p-2 w-full mb-2">
            <input type="text" name="tipo" placeholder="Tipo" class="border p-2 w-full mb-2">
            <input type="text" name="color" placeholder="Color" class="border p-2 w-full mb-2">
            <input type="number" name="stock" placeholder="Stock" class="border p-2 w-full mb-2">
            <input type="number" step="0.01" name="precio" placeholder="Precio" class="border p-2 w-full mb-2">
            <input type="number" name="proveedor_id" placeholder="ID Proveedor" class="border p-2 w-full mb-2">

            <button class="bg-green-500 text-white px-4 py-2 rounded">
                Guardar
            </button>

        </form>

    </div>

</x-app-layout>