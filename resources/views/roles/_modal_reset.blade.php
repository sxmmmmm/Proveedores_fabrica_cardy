{{--
    Partial reutilizable: modal de restablecimiento de contraseña.
    Variables esperadas:
      $targetUser     — instancia de User
      $closeVar       — nombre de la variable Alpine para cerrar (ej. 'openReset')
      $inputIdSuffix  — sufijo único para IDs de los inputs (ej. 'sol_3', 'row_7')
--}}
@php
    $pwdId  = 'pwd_'  . $inputIdSuffix;
    $pwd2Id = 'pwd2_' . $inputIdSuffix;
@endphp

{{-- Header --}}
<div class="px-6 py-4 border-b border-gray-200"
     style="background: linear-gradient(135deg, #0F172A, #1E3A5F); border-radius:12px 12px 0 0;">
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-2">
            <svg class="w-5 h-5 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
            </svg>
            <div>
                <h3 class="text-base font-bold text-white">Restablecer contraseña</h3>
                <p class="text-xs text-gray-300 mt-0.5">
                    {{ $targetUser->name }} — {{ $targetUser->email }}
                </p>
            </div>
        </div>
        <button @click="{{ $closeVar }} = false" class="text-gray-300 hover:text-white transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>
</div>

{{-- Formulario manual --}}
<form action="{{ route('roles.reset-password', $targetUser->id) }}" method="POST" class="p-6">
    @csrf

    <div class="bg-blue-50 border border-blue-200 rounded-lg px-4 py-3 mb-5 text-sm text-blue-700">
        La nueva contraseña se cifrará con <strong>bcrypt</strong> y se enviará
        automáticamente a <strong>{{ $targetUser->email }}</strong>.
    </div>

    {{-- Botón generar contraseña automática --}}
    <div class="mb-4">
        <button type="button"
                onclick="generarPasswordAutomatica('{{ $pwdId }}', '{{ $pwd2Id }}')"
                class="w-full inline-flex items-center justify-center gap-2 px-4 py-2 rounded-lg text-sm font-semibold border-2 transition hover:opacity-80"
                style="border-color: #14B8A6; color: #14B8A6; background: #F0FDFA;">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
            </svg>
            Generar contraseña automática
        </button>
        <p class="text-xs text-gray-400 mt-1.5 text-center">
            Genera una contraseña segura aleatoria y la rellena en los campos.
        </p>
    </div>

    <div class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nueva contraseña *</label>
            <div class="relative">
                <input type="password"
                       id="{{ $pwdId }}"
                       name="nueva_password"
                       required
                       placeholder="Mínimo 8 caracteres"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400 pr-10">
                <button type="button"
                        onclick="toggleVisibilidad('{{ $pwdId }}')"
                        class="absolute right-3 top-2.5 text-gray-400 hover:text-gray-600 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </button>
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Confirmar contraseña *</label>
            <div class="relative">
                <input type="password"
                       id="{{ $pwd2Id }}"
                       name="nueva_password_confirmation"
                       required
                       placeholder="Repite la nueva contraseña"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400 pr-10">
                <button type="button"
                        onclick="toggleVisibilidad('{{ $pwd2Id }}')"
                        class="absolute right-3 top-2.5 text-gray-400 hover:text-gray-600 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Preview de contraseña generada --}}
    <div id="preview_{{ $inputIdSuffix }}"
         class="hidden mt-3 px-3 py-2 rounded-lg text-xs font-mono text-center font-semibold"
         style="background:#0F172A; color:#14B8A6; letter-spacing:1px;">
    </div>

    <div class="flex justify-end gap-3 mt-6 pt-4 border-t border-gray-100">
        <button type="button" @click="{{ $closeVar }} = false"
                class="px-4 py-2 rounded-lg text-sm font-medium bg-gray-100 text-gray-700 hover:bg-gray-200 transition">
            Cancelar
        </button>
        <button type="submit"
                class="px-5 py-2 rounded-lg text-sm font-semibold text-white transition hover:opacity-90"
                style="background-color: #14B8A6;">
            Guardar y enviar correo
        </button>
    </div>
</form>

<script>
function generarPasswordAutomatica(pwdId, pwd2Id) {
    const chars   = 'abcdefghjkmnpqrstuvwxyz';
    const upper   = 'ABCDEFGHJKMNPQRSTUVWXYZ';
    const nums    = '0123456789';
    const special = '!@#$%&*';

    function rand(str, n) {
        let r = '';
        for (let i = 0; i < n; i++) r += str[Math.floor(Math.random() * str.length)];
        return r;
    }

    // Estructura: abc-123-ABC-@4  (mínimo 8, fácil de copiar)
    const pwd = rand(chars, 3) + '-' + rand(nums, 3) + '-' + rand(upper, 3) + '-' + rand(special, 1) + rand(nums, 2);

    const input1 = document.getElementById(pwdId);
    const input2 = document.getElementById(pwd2Id);
    if (input1) { input1.value = pwd; input1.type = 'text'; }
    if (input2) { input2.value = pwd; input2.type = 'text'; }

    // Mostrar preview
    const suffix = pwdId.replace('pwd_', '');
    const preview = document.getElementById('preview_' + suffix);
    if (preview) {
        preview.textContent = pwd;
        preview.classList.remove('hidden');
    }
}

function toggleVisibilidad(inputId) {
    const input = document.getElementById(inputId);
    if (input) input.type = input.type === 'password' ? 'text' : 'password';
}
</script>
