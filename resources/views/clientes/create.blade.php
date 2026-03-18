<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nuevo Cliente
        </h2>
    </x-slot>

    <div class="p-6 max-w-3xl mx-auto">

        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('clientes.index') }}"
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

        <form action="{{ route('clientes.store') }}" method="POST">
            @csrf

            <input type="text" name="nombre" placeholder="Nombre" class="border p-2 w-full mb-2">
            <input type="text" name="documento" placeholder="Documento" class="border p-2 w-full mb-2">
            <input type="text" name="telefono" placeholder="Teléfono" class="border p-2 w-full mb-2">
            <input type="email" name="correo" placeholder="Correo" class="border p-2 w-full mb-2">
            <input type="text" name="ciudad" placeholder="Ciudad" class="border p-2 w-full mb-2">
            <input type="text" name="direccion" placeholder="Dirección" class="border p-2 w-full mb-2">

            <button class="bg-blue-500 text-white px-4 py-2 rounded">
                Guardar
            </button>
        </form>

    </div>

</x-app-layout>