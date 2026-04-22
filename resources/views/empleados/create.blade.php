<x-with-sidebar-layout>
    <x-slot name="header">
        Crear Nuevo Empleado
    </x-slot>

    <div>
        <div class="mb-6">
            <a href="{{ route('empleados.index') }}" class="inline-flex items-center" style="color: #4DC9C2;">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Volver a Empleados
            </a>
        </div>

        @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6">
                <h4 class="font-semibold mb-2">Errores en el formulario:</h4>
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded-lg shadow p-6 max-w-2xl">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Información del Empleado</h2>

            <form action="{{ route('empleados.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Documento *</label>
                        <input type="text" name="documento" value="{{ old('documento') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:border-transparent" style="focus-ring-color: #4DC9C2;" required>
                        @error('documento')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nombre Completo *</label>
                        <input type="text" name="nombre" value="{{ old('nombre') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                        @error('nombre')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Teléfono</label>
                        <input type="tel" name="telefono" value="{{ old('telefono') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                        @error('telefono')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Correo Electrónico</label>
                        <input type="email" name="correo" value="{{ old('correo') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                        @error('correo')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Cargo</label>
                        <input type="text" name="cargo" value="{{ old('cargo') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Ej: Operario, Supervisor...">
                        @error('cargo')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Ciudad</label>
                        <input type="text" name="ciudad" value="{{ old('ciudad') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                        @error('ciudad')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Dirección</label>
                        <input type="text" name="direccion" value="{{ old('direccion') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                        @error('direccion')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-8 flex gap-4">
                    <button type="submit" class="flex-1 text-white px-6 py-3 rounded-lg font-semibold transition" style="background-color: #4DC9C2;">
                        Guardar Empleado
                    </button>
                    <a href="{{ route('empleados.index') }}" class="flex-1 bg-gray-300 text-gray-800 px-6 py-3 rounded-lg font-semibold text-center hover:bg-gray-400 transition">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-with-sidebar-layout>