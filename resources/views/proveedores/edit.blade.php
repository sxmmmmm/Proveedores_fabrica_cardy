<x-with-sidebar-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl  leading-tight">
            
            Editar Proveedor
            
        </h2>
    </x-slot>

    <div class="p-6 max-w-3xl mx-auto">

        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('proveedores.index') }}"
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
            <form action="{{ route('proveedores.update', $proveedore) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="nombre" class="block text-sm font-medium text-black-700 mb-1">Nombre</label>
                        <input type="text" name="nombre" value="{{ $proveedore->nombre }}" placeholder="Nombre" class="border p-2">
                    </div>
                    <div>
                        <label for="empresa" class="block text-sm font-medium text-black-700 mb-1">Empresa</label>
                        <input type="text" name="empresa" value="{{ $proveedore->empresa }}" placeholder="Empresa" class="border p-2">
                    </div>
                    <div>
                        <label for="documento" class="block text-sm font-medium text-black-700 mb-1">Documento</label>
                        <input type="text" name="documento" value="{{ $proveedore->documento }}" placeholder="Documento" class="border p-2">
                    </div> 
                    <div>
                        <label for="telefono" class="block text-sm font-medium text-black-700 mb-1">Teléfono</label>
                        <input type="text" name="telefono" value="{{ $proveedore->telefono }}" placeholder="Teléfono" class="border p-2">
                    </div>
                    <div>
                        <label for="fecha_nacimiento" class="block text-sm font-medium text-black-700 mb-1">Fecha de Nacimiento</label>  
                        <input type="date" name="fecha_nacimiento" value="{{ $proveedore->fecha_nacimiento }}" class="border p-2">
                    </div>
                    <div>
                        <label for="correo" class="block text-sm font-medium text-black-700 mb-1">Correo</label>
                        <input type="email" name="correo" value="{{ $proveedore->correo }}" placeholder="Correo" class="border p-2">
                    </div>
                    <div>
                        <label for="ciudad" class="block text-sm font-medium text-black-700 mb-1">Ciudad</label>
                        <input type="text" name="ciudad" value="{{ $proveedore->ciudad }}" placeholder="Ciudad" class="border p-2">
                    </div>  
                    <div>
                        <label for="direccion" class="block text-sm font-medium text-black-700 mb-1">Dirección</label>
                        <input type="text" name="direccion" value="{{ $proveedore->direccion }}" placeholder="Dirección" class="border p-2">
                    </div>
                    <div class="col-span-2">
                        <label for="mercancia" class="block text-sm font-medium text-black-700 mb-1">Mercancía</label>
                        <input type="text" name="mercancia" value="{{ $proveedore->mercancia }}" placeholder="Mercancía" class="border p-2 w-full">
                    </div>
                </div>

                <div class="mt-6">
                    <button style="background-color: #4DC9C2; color: black"  class="w-full bg-green-500 text-black py-2 rounded">
                        Actualizar Proveedor
                    </button>
                </div>

            </form>
        </div>

    </div>

</x-app-layout>