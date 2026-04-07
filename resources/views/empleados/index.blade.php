<x-with-sidebar-layout>
    <x-slot name="header">
        Empleados
    </x-slot>

    <div>
        <div class="mb-6 flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-900">Gestión de Empleados</h2>
            <a href="{{ route('empleados.create') }}"
               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Nuevo Empleado
            </a>
        </div>

        @if($empleados->count() > 0)
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Nombre</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Documento</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Cargo</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Teléfono</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Correo</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Ciudad</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @foreach($empleados as $empleado)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $empleado->id }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $empleado->nombre }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $empleado->documento }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $empleado->cargo ?? 'N/A' }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $empleado->telefono ?? 'N/A' }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $empleado->correo ?? 'N/A' }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $empleado->ciudad ?? 'N/A' }}</td>
                                <td class="px-6 py-4 text-sm space-x-2">
                                    <a href="{{ route('empleados.edit', $empleado) }}"
                                       class="inline-flex items-center px-3 py-1 bg-blue-500 text-white text-xs rounded hover:bg-blue-600 transition">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                        Editar
                                    </a>

                                    <form action="{{ route('empleados.destroy', $empleado) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este empleado?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center px-3 py-1 bg-red-500 text-white text-xs rounded hover:bg-red-600 transition">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="bg-white rounded-lg shadow p-8 text-center">
                <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 10h4a2 2 0 012 2v4a2 2 0 01-2 2h-4M9 10H5a2 2 0 00-2 2v4a2 2 0 002 2h4m0-12V5a2 2 0 012-2h4a2 2 0 012 2v4m-6 0h6"></path>
                </svg>
                <p class="text-gray-600">No hay empleados registrados aún</p>
                <a href="{{ route('empleados.create') }}" class="mt-4 inline-block px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Crear primer empleado
                </a>
            </div>
        @endif

    </div>
</x-with-sidebar-layout>