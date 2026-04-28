<x-with-sidebar-layout>

    <x-slot name="header">
        Registrar Nuevo Usuario
    </x-slot>

    <div class="p-6 max-w-4xl mx-auto">
        <div class="bg-white shadow-xl rounded-lg overflow-hidden border border-gray-200">
            <div class="px-6 py-4" style="background: linear-gradient(to right, #f9a8b8, #fbc8d4);">
                <h3 class="text-xl font-bold text-white flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                    Registrar Nuevo Usuario - Cardy
                </h3>
            </div>

            <div class="p-8">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nombre Completo</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:outline-none @error('name') border-red-500 @enderror"
                                placeholder="Ej. Juan Pérez" required>
                            @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Correo Electrónico</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:outline-none @error('email') border-red-500 @enderror"
                                placeholder="usuario@cardy.com" required>
                            @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Contraseña</label>
                            <input type="password" name="password"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:outline-none @error('password') border-red-500 @enderror"
                                required>
                            @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Confirmar Contraseña</label>
                            <input type="password" name="password_confirmation"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:outline-none"
                                required>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Asignar Rol de Usuario</label>
                            <select name="role_id" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:outline-none bg-gray-50">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                                @endforeach
                            </select>
                            <p class="text-xs text-gray-500 mt-2">
                                * Admin: Acceso total | Manager: Inventarios y Reportes | Employee: Solo registros.
                            </p>
                        </div>
                    </div>

                    <div class="mt-8 flex items-center justify-end space-x-4 border-t pt-6">
                        <a href="{{ route('roles.management') }}" class="text-gray-600 hover:text-gray-800 font-medium">
                            Cancelar
                        </a>
                        <button type="submit"
                            class="text-white font-bold py-2 px-8 rounded-lg shadow-lg transition duration-200"
                            style="background-color: #4DC9C2;">
                            Crear Usuario
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-with-sidebar-layout>
