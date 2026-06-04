<x-with-sidebar-layout>
    <x-slot name="header">Gestión de Roles y Usuarios</x-slot>

    {{-- ══════════════════════════════════════════════════════════
         MODAL: REGISTRAR NUEVO USUARIO
    ══════════════════════════════════════════════════════════ --}}
    <div x-data="{ openCrear: {{ ($errors->any() && !session('role_error')) ? 'true' : 'false' }} }">

        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Gestión de Roles y Usuarios</h2>
                <p class="text-sm text-gray-500 mt-0.5">Usuarios registrados en el sistema Cardy</p>
            </div>
            <button @click="openCrear = true"
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-semibold text-white transition hover:opacity-90"
                    style="background-color: #0F172A;">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                </svg>
                Registrar Usuario
            </button>
        </div>

        <div x-show="openCrear" x-cloak
             class="fixed inset-0 z-50 flex items-center justify-center p-4"
             style="background: rgba(0,0,0,0.5);">
            <div @click.stop class="bg-white rounded-xl shadow-2xl w-full max-w-xl max-h-[90vh] overflow-y-auto">
                <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200"
                     style="background: linear-gradient(135deg, #0F172A 0%, #1E3A5F 100%); border-radius: 12px 12px 0 0;">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                        <h3 class="text-lg font-bold text-white">Registrar Nuevo Usuario</h3>
                    </div>
                    <button @click="openCrear = false" class="text-gray-300 hover:text-white transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <form action="{{ route('users.store') }}" method="POST" class="p-6">
                    @csrf
                    @if($errors->any())
                        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-4 text-sm">
                            <ul class="list-disc list-inside space-y-1">
                                @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nombre completo *</label>
                            <input type="text" name="name" value="{{ old('name') }}" required placeholder="Ej. Juan Pérez"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Correo electrónico *</label>
                            <input type="email" name="email" value="{{ old('email') }}" required placeholder="usuario@cardy.com"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Contraseña *</label>
                            <input type="password" name="password" required placeholder="Mínimo 8 caracteres"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Confirmar contraseña *</label>
                            <input type="password" name="password_confirmation" required placeholder="Repite la contraseña"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Rol de usuario *</label>
                            <select name="role_id" required
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400 bg-gray-50">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                        {{ ucfirst($role->name) }}
                                    </option>
                                @endforeach
                            </select>
                            <p class="text-xs text-gray-400 mt-1">Administrador: acceso total · Bodeguero: inventarios · Vendedor: registros</p>
                        </div>
                    </div>
                    <div class="flex justify-end gap-3 mt-6 pt-4 border-t border-gray-100">
                        <button type="button" @click="openCrear = false"
                                class="px-4 py-2 rounded-lg text-sm font-medium bg-gray-100 text-gray-700 hover:bg-gray-200 transition">
                            Cancelar
                        </button>
                        <button type="submit"
                                class="px-5 py-2 rounded-lg text-sm font-semibold text-white transition hover:opacity-90"
                                style="background-color: #14B8A6;">
                            Crear Usuario
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- ══════════════════════════════════════════════════════════
         BANNER: SOLICITUDES PENDIENTES
    ══════════════════════════════════════════════════════════ --}}
    @if($solicitudes->isNotEmpty())
        <div class="rounded-xl border mb-6 overflow-hidden"
             style="border-color: #FCD34D; background: #FFFBEB;">
            <div class="flex items-center gap-3 px-5 py-3 border-b"
                 style="background: #F59E0B; border-color: #FCD34D;">
                <svg class="w-5 h-5 text-white flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                </svg>
                <span class="font-bold text-white text-sm">
                    {{ $solicitudes->count() }} solicitud(es) de restablecimiento pendiente(s)
                </span>
            </div>
            <div class="divide-y divide-yellow-100">
                @foreach($solicitudes as $sol)
                    @if($sol->user)
                    <div x-data="{ openReset: false }" class="flex items-center justify-between px-5 py-3 gap-4">
                        <div class="flex items-center gap-3 min-w-0">
                            <span class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold text-white flex-shrink-0"
                                  style="background-color: #D97706;">
                                {{ strtoupper(substr($sol->user->name, 0, 1)) }}
                            </span>
                            <div class="min-w-0">
                                <p class="text-sm font-semibold text-gray-800 truncate">{{ $sol->user->name }}</p>
                                <p class="text-xs text-gray-500 truncate">{{ $sol->user->email }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 flex-shrink-0">
                            <span class="text-xs text-gray-400">
                                {{ $sol->requested_at->setTimezone('America/Bogota')->format('d/m/Y H:i') }}
                            </span>
                            <button @click="openReset = true"
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold text-white transition hover:opacity-90"
                                    style="background-color: #0F172A;">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                                </svg>
                                Asignar contraseña
                            </button>
                        </div>

                        {{-- Modal reset (desde banner) --}}
                        <div x-show="openReset" x-cloak
                             class="fixed inset-0 z-50 flex items-center justify-center p-4"
                             style="background: rgba(0,0,0,0.55);">
                            <div @click.stop class="bg-white rounded-xl shadow-2xl w-full max-w-md overflow-hidden">
                                @include('roles._modal_reset', [
                                    'targetUser'   => $sol->user,
                                    'closeVar'     => 'openReset',
                                    'inputIdSuffix' => 'sol_' . $sol->id,
                                ])
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    @endif

    {{-- Mensajes de sesión --}}
    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-5 text-sm flex items-center gap-2">
            <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-5 text-sm">
            {{ session('error') }}
        </div>
    @endif

    {{-- ══════════════════════════════════════════════════════════
         TABLA DE USUARIOS
    ══════════════════════════════════════════════════════════ --}}
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr style="background-color: #0F172A;">
                    <th class="px-5 py-3 text-left font-semibold text-white">Nombre</th>
                    <th class="px-5 py-3 text-left font-semibold text-white">Correo</th>
                    <th class="px-5 py-3 text-left font-semibold text-white">Rol Actual</th>
                    <th class="px-5 py-3 text-left font-semibold text-white">Cambiar Rol</th>
                    <th class="px-5 py-3 text-center font-semibold text-white">Contraseña</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($users as $user)
                    <tr x-data="{ openResetRow: false }"
                        onmouseover="this.style.backgroundColor='#E6F9F8'"
                        onmouseout="this.style.backgroundColor=''">

                        <td class="px-5 py-3 font-medium text-gray-900">
                            <div class="flex items-center gap-2">
                                <span class="w-7 h-7 rounded-full flex items-center justify-center text-xs font-bold text-white flex-shrink-0"
                                      style="background-color: #14B8A6;">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </span>
                                <span>
                                    {{ $user->name }}
                                    @if($solicitudes->where('user_id', $user->id)->isNotEmpty())
                                        <span class="ml-1 inline-block w-2 h-2 rounded-full bg-amber-400" title="Solicitud pendiente"></span>
                                    @endif
                                </span>
                            </div>
                        </td>
                        <td class="px-5 py-3 text-gray-500 text-xs">{{ $user->email }}</td>
                        <td class="px-5 py-3">
                            @php
                                $roleName = $user->role->name ?? 'Sin Rol';
                                $colors = [
                                    'Administrador' => ['bg' => '#EFF6FF', 'text' => '#1D4ED8'],
                                    'Bodeguero'     => ['bg' => '#F0FDF4', 'text' => '#15803D'],
                                    'Vendedor'      => ['bg' => '#FFF7ED', 'text' => '#C2410C'],
                                ];
                                $c = $colors[$roleName] ?? ['bg' => '#F3F4F6', 'text' => '#6B7280'];
                            @endphp
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold"
                                  style="background-color: {{ $c['bg'] }}; color: {{ $c['text'] }};">
                                {{ $roleName }}
                            </span>
                        </td>
                        <td class="px-5 py-3">
                            <form action="{{ route('roles.update', $user->id) }}" method="POST">
                                @csrf
                                <select name="role_id" onchange="this.form.submit()"
                                        class="border border-gray-300 rounded-lg px-2 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400 bg-gray-50">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                            {{ ucfirst($role->name) }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                        </td>
                        <td class="px-5 py-3 text-center">
                            <button @click="openResetRow = true"
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold text-white transition hover:opacity-90"
                                    style="background-color: #475569;">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                                </svg>
                                Reset
                            </button>

                            {{-- Modal reset (desde tabla) --}}
                            <div x-show="openResetRow" x-cloak
                                 class="fixed inset-0 z-50 flex items-center justify-center p-4"
                                 style="background: rgba(0,0,0,0.55);">
                                <div @click.stop class="bg-white rounded-xl shadow-2xl w-full max-w-md overflow-hidden">
                                    @include('roles._modal_reset', [
                                        'targetUser'    => $user,
                                        'closeVar'      => 'openResetRow',
                                        'inputIdSuffix' => 'row_' . $user->id,
                                    ])
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if($users instanceof \Illuminate\Pagination\LengthAwarePaginator && $users->hasPages())
            <div class="px-5 py-3 border-t border-gray-100 bg-gray-50">{{ $users->links() }}</div>
        @endif
    </div>

</x-with-sidebar-layout>
