<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Nuevo Empleado
        </h2>
    </x-slot>

    <div class="p-6 max-w-3xl mx-auto">

        <div class="mb-6">
            <a href="{{ route('empleados.index') }}" class="text-gray-500 hover:text-gray-700">
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

        <form action="{{ route('empleados.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-2 gap-4">
                <div>
    <label class="block mb-1">Documento</label>
    <input type="text" name="documento" class="border p-2 w-full">
</div>
                <div>
                    <label class="block mb-1">Nombre</label>
                    <input type="text" name="nombre" class="border p-2 w-full">
                </div>

                <div>
                    <label class="block mb-1">Teléfono</label>
                    <input type="text" name="telefono" class="border p-2 w-full">
                </div>

                <div>
                    <label class="block mb-1">Correo</label>
                    <input type="email" name="correo" class="border p-2 w-full">
                </div>

                <div>
                    <label class="block mb-1">Cargo</label>
                    <input type="text" name="cargo" class="border p-2 w-full">
                </div>

            </div>

            <div class="mt-6">
                <button class="w-full bg-blue-500 text-white py-2 rounded">
                    Guardar
                </button>
            </div>

        </form>

    </div>

</x-app-layout>