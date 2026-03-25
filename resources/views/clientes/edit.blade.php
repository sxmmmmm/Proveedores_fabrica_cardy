<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Editar Cliente
        </h2>
    </x-slot>

    <div class="p-6 max-w-3xl mx-auto">

        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('clientes.index') }}"
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
            <form action="{{ route('clientes.update', $cliente) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="grid grid-cols-2 gap-4">

                    <div>
                        <label class="block text-sm font-medium text-black mb-1">Nombre</label>
                        <input type="text" name="nombre" value="{{ $cliente->nombre }}" class="border p-2 w-full">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-black mb-1">Documento</label>
                        <input type="text" name="documento" value="{{ $cliente->documento }}" class="border p-2 w-full">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-black mb-1">Teléfono</label>
                        <input type="text" name="telefono" value="{{ $cliente->telefono }}" class="border p-2 w-full">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-black mb-1">Correo</label>
                        <input type="email" name="correo" value="{{ $cliente->correo }}" class="border p-2 w-full">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-black mb-1">Ciudad</label>
                        <input type="text" name="ciudad" value="{{ $cliente->ciudad }}" class="border p-2 w-full">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-black mb-1">Dirección</label>
                        <input type="text" name="direccion" value="{{ $cliente->direccion }}" class="border p-2 w-full">
                    </div>

                </div>

                <div class="mt-6">
                    <button style="background-color: #4DC9C2; color: black"
                        class="w-full py-2 rounded">
                        Actualizar Cliente
                    </button>
                </div>

            </form>
        </div>

    </div>

</x-app-layout>