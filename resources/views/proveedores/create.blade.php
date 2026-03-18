<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nuevo Proveedor
        </h2>
    </x-slot>

    <div class="p-6 max-w-3xl mx-auto">

        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('proveedores.index') }}"
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
            <form action="{{ route('proveedores.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-2 gap-4">

                    <input type="text" name="nombre" placeholder="Nombre" class="border p-2">
                    <input type="text" name="empresa" placeholder="Empresa" class="border p-2">
                    <input type="text" name="documento" placeholder="Documento" class="border p-2">
                    <input type="text" name="telefono" placeholder="Teléfono" class="border p-2">
                    <input type="date" name="fecha_nacimiento" class="border p-2">
                    <input type="email" name="correo" placeholder="Correo" class="border p-2">
                    <input type="text" name="ciudad" placeholder="Ciudad" class="border p-2">
                    <input type="text" name="direccion" placeholder="Dirección" class="border p-2">

                    <div class="col-span-2">
                        <input type="text" name="mercancia" placeholder="Mercancía" class="border p-2 w-full">
                    </div>

                </div>

                <div class="mt-6">
                    <button class="w-full bg-green-500 text-white py-2 rounded">
                        Guardar Proveedor
                    </button>
                </div>

            </form>
        </div>

    </div>

</x-app-layout>