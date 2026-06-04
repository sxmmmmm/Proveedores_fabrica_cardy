<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FÁBRICA CARDY - Iniciar Sesión</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>[x-cloak]{display:none!important}</style>
</head>
<body class="bg-gray-100">

<div class="min-h-screen flex" x-data="{ showForgot: false }">

    {{-- ── Modal Olvidé mi contraseña ──────────────────────────────── --}}
    <div x-show="showForgot" x-cloak
         class="fixed inset-0 z-50 flex items-center justify-center p-4"
         style="background: rgba(0,0,0,0.55);">
        <div @click.stop
             class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden">

            {{-- Header --}}
            <div class="px-6 py-5 border-b border-gray-100"
                 style="background: linear-gradient(135deg, #0F172A 0%, #1E3A5F 100%);">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-full flex items-center justify-center"
                             style="background-color: #14B8A6;">
                            <i class="fas fa-lock text-white text-sm"></i>
                        </div>
                        <div>
                            <h3 class="text-base font-bold text-white">Restablecer contraseña</h3>
                            <p class="text-xs text-gray-300 mt-0.5">Te enviaremos un enlace por correo</p>
                        </div>
                    </div>
                    <button @click="showForgot = false" class="text-gray-400 hover:text-white transition">
                        <i class="fas fa-times text-lg"></i>
                    </button>
                </div>
            </div>

            {{-- Body --}}
            <div class="p-6">
                {{-- Estado (link enviado) --}}
                @if(session('status'))
                    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-4 text-sm flex items-center gap-2">
                        <i class="fas fa-check-circle"></i>
                        {{ session('status') }}
                    </div>
                @endif

                <p class="text-sm text-gray-600 mb-5">
                    Ingresa el correo electrónico asociado a tu cuenta y te enviaremos un enlace para crear una nueva contraseña.
                </p>

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="fas fa-envelope mr-1" style="color:#14B8A6;"></i>
                            Correo electrónico
                        </label>
                        <input type="email"
                               name="email"
                               value="{{ old('email') }}"
                               required
                               autofocus
                               placeholder="tu@correo.com"
                               class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg text-sm focus:outline-none transition-colors"
                               style="focus-border-color: #14B8A6;"
                               onfocus="this.style.borderColor='#14B8A6'"
                               onblur="this.style.borderColor='#E5E7EB'">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                            class="w-full py-2.5 rounded-lg text-sm font-semibold text-white transition hover:opacity-90"
                            style="background-color: #14B8A6;">
                        <i class="fas fa-paper-plane mr-2"></i>
                        Enviar enlace de restablecimiento
                    </button>
                </form>
            </div>

            {{-- Footer --}}
            <div class="px-6 pb-5 text-center">
                <button @click="showForgot = false"
                        class="text-xs text-gray-400 hover:text-gray-600 transition">
                    Volver al inicio de sesión
                </button>
            </div>
        </div>
    </div>

    {{-- ── Panel izquierdo decorativo ──────────────────────────────── --}}
    <div class="hidden lg:flex lg:w-1/2 flex-col items-center justify-center p-12"
         style="background: linear-gradient(135deg, #0F172A 0%, #1E3A5F 60%, #14B8A6 100%);">
        <img src="{{ asset('images/logocardy.jpg') }}"
             alt="Fábrica Cardy"
             class="w-40 h-40 object-contain rounded-full shadow-2xl mb-8 border-4 border-white border-opacity-20"
             onerror="this.style.display='none'">
        <h1 class="text-4xl font-bold text-white text-center mb-3 tracking-wide">
            FÁBRICA CARDY
        </h1>
        <p class="text-center text-sm font-medium mb-8" style="color: #14B8A6;">
            SISTEMA DE GESTIÓN INTEGRAL
        </p>
        <div class="w-16 h-0.5 mb-8" style="background-color: #14B8A6;"></div>
        <p class="text-gray-400 text-xs text-center max-w-xs leading-relaxed">
            Controla inventarios, proveedores, empleados y operaciones desde un solo lugar.
        </p>
    </div>

    {{-- ── Panel derecho con el formulario ─────────────────────────── --}}
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-white">
        <div class="w-full max-w-md">

            {{-- Logo para móvil --}}
            <div class="lg:hidden flex justify-center mb-8">
                <img src="{{ asset('images/logocardy.jpg') }}"
                     alt="Fábrica Cardy"
                     class="w-20 h-20 object-contain rounded-full border-2 border-gray-200"
                     onerror="this.style.display='none'">
            </div>

            <div class="mb-8">
                <h2 class="text-3xl font-bold" style="color: #0F172A;">Bienvenido</h2>
                <p class="text-gray-500 mt-1 text-sm">Inicia sesión para continuar en Cardy</p>
            </div>

            {{-- Errores --}}
            @if ($errors->any() && !$errors->has('email') )
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-5 text-sm">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            {{-- Formulario de login --}}
            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                {{-- Email --}}
                <div>
                    <label class="block text-sm font-semibold mb-1.5" style="color: #0F172A;">
                        <i class="fas fa-envelope mr-1.5" style="color:#14B8A6;"></i>
                        Correo electrónico
                    </label>
                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           required autofocus
                           placeholder="admin@cardy.com"
                           class="w-full px-4 py-3 border-2 rounded-lg text-sm focus:outline-none transition-colors"
                           style="border-color: {{ $errors->has('email') ? '#EF4444' : '#E5E7EB' }};"
                           onfocus="this.style.borderColor='#14B8A6'"
                           onblur="this.style.borderColor='{{ $errors->has('email') ? '#EF4444' : '#E5E7EB' }}'">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Contraseña --}}
                <div>
                    <label class="block text-sm font-semibold mb-1.5" style="color: #0F172A;">
                        <i class="fas fa-lock mr-1.5" style="color:#14B8A6;"></i>
                        Contraseña
                    </label>
                    <div class="relative">
                        <input type="password"
                               name="password"
                               id="password"
                               required
                               placeholder="••••••••"
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg text-sm focus:outline-none transition-colors pr-12"
                               onfocus="this.style.borderColor='#14B8A6'"
                               onblur="this.style.borderColor='#E5E7EB'">
                        <button type="button" onclick="togglePassword()"
                                class="absolute right-3 top-3.5 text-gray-400 hover:text-gray-600 transition-colors">
                            <i class="fas fa-eye text-sm" id="eye-icon"></i>
                        </button>
                    </div>
                </div>

                {{-- Recordarme + Olvidé contraseña --}}
                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 text-sm text-gray-600 cursor-pointer">
                        <input type="checkbox" name="remember"
                               class="w-4 h-4 rounded accent-teal-500">
                        Recordarme
                    </label>

                    {{-- ¿Olvidaste tu contraseña? — abre el modal Alpine --}}
                    <button type="button"
                            @click="showForgot = true"
                            class="text-sm font-medium transition hover:opacity-70"
                            style="color: #14B8A6;">
                        ¿Olvidaste tu contraseña?
                    </button>
                </div>

                {{-- Botón principal --}}
                <button type="submit"
                        class="w-full py-3 rounded-lg text-sm font-semibold text-white transition hover:opacity-90 flex items-center justify-center gap-2"
                        style="background-color: #14B8A6;">
                    <i class="fas fa-sign-in-alt"></i>
                    Iniciar Sesión
                </button>
            </form>

            <p class="text-center text-gray-400 text-xs mt-8">
                © 2026 Fábrica de Calzado Cardy
            </p>
        </div>
    </div>

</div>

<script>
    function togglePassword() {
        const input = document.getElementById('password');
        const icon  = document.getElementById('eye-icon');
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.replace('fa-eye-slash', 'fa-eye');
        }
    }
</script>

</body>
</html>
