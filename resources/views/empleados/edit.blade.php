<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Editar Empleado
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

        <form action="{{ route('empleados.update', $empleado) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-4">
                <div>
    <label class="block mb-1">Documento</label>
    <input type="text" name="documento" value="{{ $empleado->documento }}" class="border p-2 w-full">
</div>
                <div>
                    <label class="block mb-1">Nombre</label>
                    <input type="text" name="nombre" value="{{ $empleado->nombre }}" class="border p-2 w-full">
                </div>

                <div>
                    <label class="block mb-1">Teléfono</label>
                    <input type="text" name="telefono" value="{{ $empleado->telefono }}" class="border p-2 w-full">
                </div>

                <div>
                    <label class="block mb-1">Correo</label>
                    <input type="email" name="correo" value="{{ $empleado->correo }}" class="border p-2 w-full">
                </div>

                <div>
                    <label class="block mb-1">Cargo</label>
                    <input type="text" name="cargo" value="{{ $empleado->cargo }}" class="border p-2 w-full">
                </div>

            </div>

            <div class="mt-6">
                <button class="w-full bg-blue-500 text-white py-2 rounded">
                    Actualizar
                </button>
            </div>

        </form>

    </div>

</x-app-layout>