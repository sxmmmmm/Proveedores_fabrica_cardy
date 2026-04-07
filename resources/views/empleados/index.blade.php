<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-center">Empleados</h2>
    </x-slot>

    <div class="p-6">

        <a href="{{ route('empleados.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded">
            Nuevo Empleado
        </a>

        <table class="w-full mt-4 border text-center">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border p-2">Nombre</th>
                    <th class="border p-2">Cargo</th>
                    <th class="border p-2">Teléfono</th>
                    <th class="border p-2">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($empleados as $e)
                <tr>
                    <td class="border p-2">{{ $e->nombre }}</td>
                    <td class="border p-2">{{ $e->cargo }}</td>
                    <td class="border p-2">{{ $e->telefono }}</td>

                    <td class="border p-2">
                        <a href="{{ route('empleados.edit', $e) }}"
                           class="bg-green-500 text-white px-2 py-1 rounded">
                            Editar
                        </a>

                        <form action="{{ route('empleados.destroy', $e) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white px-2 py-1 rounded">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</x-app-layout>