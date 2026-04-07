<x-with-sidebar-layout>
    <x-slot name="header">
        Gestión de Roles
    </x-slot>

    <div>
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Gestión de Roles de Usuario</h2>
            <p class="text-gray-600 mt-2">Asigna y administra los roles de los usuarios del sistema</p>
        </div>

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow overflow-hidden">
            @if($users->count() > 0)
                <table class="w-full">
                    <thead class="bg-gray-50 border-b">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Nombre</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Correo</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Rol Actual</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @foreach($users as $user)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $user->id }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $user->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $user->email }}</td>
                                <td class="px-6 py-4 text-sm">
                                    @if($user->role)
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold
                                            @if($user->role->name === 'admin')
                                                bg-red-100 text-red-800
                                            @elseif($user->role->name === 'manager')
                                                bg-blue-100 text-blue-800
                                            @else
                                                bg-gray-100 text-gray-800
                                            @endif
                                        ">
                                            {{ ucfirst($user->role->name) }}
                                        </span>
                                    @else
                                        <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-xs">Sin rol</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <form action="{{ route('roles.update', $user) }}" method="POST" class="inline-flex items-center gap-2">
                                        @csrf
                                        <select name="role_id" class="border border-gray-300 rounded px-2 py-1 text-sm">
                                            <option value="">Seleccionar rol...</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}" {{ $user->role_id === $role->id ? 'selected' : '' }}>
                                                    {{ ucfirst($role->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="px-3 py-1 bg-blue-500 text-white text-xs rounded hover:bg-blue-600 transition">
                                            Guardar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="p-8 text-center">
                    <p class="text-gray-600">No hay usuarios registrados en el sistema</p>
                </div>
            @endif
        </div>

        <!-- Información sobre roles -->
        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-start">
                    <div class="bg-red-100 rounded-full p-3 mr-4">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900">Admin</h3>
                        <p class="text-sm text-gray-600 mt-1">Acceso completo a todas las funciones del sistema, puede crear, editar y eliminar registros.</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-start">
                    <div class="bg-blue-100 rounded-full p-3 mr-4">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900">Manager/Supervisor</h3>
                        <p class="text-sm text-gray-600 mt-1">Puede gestionar empleados y crear reportes, pero con restricciones de eliminación.</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-start">
                    <div class="bg-gray-100 rounded-full p-3 mr-4">
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900">Employee</h3>
                        <p class="text-sm text-gray-600 mt-1">Acceso limitado, principalmente lectura de datos y reportes básicos.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-with-sidebar-layout>
