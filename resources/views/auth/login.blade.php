<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FÁBRICA CARDY - Iniciar Sesión</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body style="background-color: #F9FAFB;">

    {{-- Modal recuperar contraseña --}}
    <div id="modal-forgot"
         style="display:none; position:fixed; inset:0; z-index:50; background:rgba(0,0,0,0.55);"
         class="flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden">

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
                            <h3 class="text-base font-bold text-white">Recuperar contraseña</h3>
                            <p class="text-xs mt-0.5" style="color:#94A3B8;">
                                Te enviaremos un enlace directo a tu correo
                            </p>
                        </div>
                    </div>
                    <button type="button" onclick="cerrarModalForgot()"
                            style="color:#94A3B8;" class="hover:text-white transition">
                        <i class="fas fa-times text-lg"></i>
                    </button>
                </div>
            </div>

            {{-- Body --}}
            <div class="p-6">
                @if(session('status'))
                    <div class="border px-4 py-3 rounded-lg mb-4 text-sm flex items-center gap-2"
                         style="background:#F0FDF4; border-color:#BBF7D0; color:#15803D;">
                        <i class="fas fa-check-circle"></i>
                        {{ session('status') }}
                    </div>
                @endif

                <p class="text-sm mb-5" style="color:#475569;">
                    Ingresa tu correo electrónico y recibirás un enlace para restablecer tu contraseña directamente.
                </p>

                <form method="POST" action="{{ route('password.email') }}" id="form-forgot">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1" style="color:#374151;">
                            <i class="fas fa-envelope mr-1" style="color:#14B8A6;"></i>
                            Correo electrónico
                        </label>
                        <input type="email"
                               name="email"
                               value="{{ old('email') }}"
                               required
                               placeholder="tu@correo.com"
                               class="w-full px-4 py-2.5 rounded-lg text-sm focus:outline-none transition-colors"
                               style="border: 2px solid #E5E7EB;"
                               onfocus="this.style.borderColor='#14B8A6'"
                               onblur="this.style.borderColor='#E5E7EB'">
                        @error('email')
                            <p class="text-xs mt-1" style="color:#EF4444;">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit"
                            class="w-full py-2.5 rounded-lg text-sm font-semibold text-white transition hover:opacity-90"
                            style="background-color: #14B8A6;">
                        <i class="fas fa-paper-plane mr-2"></i>
                        Enviar enlace de recuperación
                    </button>
                </form>
            </div>

            <div class="px-6 pb-5 text-center">
                <button type="button" onclick="cerrarModalForgot()"
                        class="text-xs transition hover:text-gray-600" style="color:#9CA3AF;">
                    Volver al inicio de sesión
                </button>
            </div>
        </div>
    </div>

    {{-- Layout principal --}}
    <div class="min-h-screen flex">

        {{-- Panel izquierdo --}}
        <div class="hidden lg:flex lg:w-1/2 flex-col items-center justify-center p-12"
             style="background: linear-gradient(160deg, #0F172A 0%, #1E3A5F 60%, #14B8A6 100%);">
            <img src="{{ asset('images/logocardy.jpg') }}"
                 alt="Fábrica Cardy"
                 class="w-28 h-28 object-contain rounded-full mb-8 shadow-2xl"
                 style="border: 3px solid #14B8A6;"
                 onerror="this.style.display='none'">
            <h1 class="text-4xl font-black text-center text-white tracking-wide mb-2">
                FÁBRICA CARDY
            </h1>
            <p class="text-center text-sm font-medium mb-8" style="color:#14B8A6;">
                SISTEMA DE GESTIÓN INTEGRAL
            </p>
            <div class="w-16 h-0.5 mb-8" style="background-color:#14B8A6;"></div>
            <p class="text-xs text-center max-w-xs leading-relaxed" style="color:#94A3B8;">
                Controla inventarios, proveedores, empleados y operaciones desde un solo lugar.
            </p>
        </div>

        {{-- Panel derecho --}}
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-white">
            <div class="w-full max-w-md">

                {{-- Logo móvil --}}
                <div class="lg:hidden flex justify-center mb-8">
                    <img src="{{ asset('images/logocardy.jpg') }}"
                         alt="Fábrica Cardy"
                         class="w-20 h-20 object-contain rounded-full"
                         style="border: 2px solid #E5E7EB;"
                         onerror="this.style.display='none'">
                </div>

                <div class="mb-8">
                    <h2 class="text-3xl font-bold" style="color:#0F172A;">Bienvenido</h2>
                    <p class="mt-1 text-sm" style="color:#6B7280;">
                        Inicia sesión para continuar en Cardy
                    </p>
                </div>

                {{-- Errores --}}
                @if($errors->has('email') || $errors->has('password'))
                    <div class="border px-4 py-3 rounded-lg mb-5 text-sm"
                         style="background:#FEF2F2; border-color:#FECACA; color:#DC2626;">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-semibold mb-1.5" style="color:#0F172A;">
                            <i class="fas fa-envelope mr-1.5" style="color:#14B8A6;"></i>
                            Correo electrónico
                        </label>
                        <input type="email"
                               name="email"
                               value="{{ old('email') }}"
                               required autofocus
                               placeholder="admin@cardy.com"
                               class="w-full px-4 py-3 rounded-lg text-sm focus:outline-none transition-colors"
                               style="border: 2px solid {{ $errors->has('email') ? '#EF4444' : '#E5E7EB' }};"
                               onfocus="this.style.borderColor='#14B8A6'"
                               onblur="this.style.borderColor='{{ $errors->has('email') ? '#EF4444' : '#E5E7EB' }}'">
                    </div>

                    {{-- Contraseña --}}
                    <div>
                        <label class="block text-sm font-semibold mb-1.5" style="color:#0F172A;">
                            <i class="fas fa-lock mr-1.5" style="color:#14B8A6;"></i>
                            Contraseña
                        </label>
                        <div class="relative">
                            <input type="password"
                                   name="password"
                                   id="pwd-login"
                                   required
                                   placeholder="••••••••"
                                   class="w-full px-4 py-3 rounded-lg text-sm focus:outline-none transition-colors pr-12"
                                   style="border: 2px solid #E5E7EB;"
                                   onfocus="this.style.borderColor='#14B8A6'"
                                   onblur="this.style.borderColor='#E5E7EB'">
                            <button type="button"
                                    onclick="toggleLoginPwd()"
                                    class="absolute right-3 top-3.5 transition-colors"
                                    style="color:#9CA3AF;">
                                <i class="fas fa-eye text-sm" id="eye-login"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Recordarme + ¿Olvidaste? --}}
                    <div class="flex items-center justify-between">
                        <label class="flex items-center gap-2 text-sm cursor-pointer" style="color:#4B5563;">
                            <input type="checkbox" name="remember" class="w-4 h-4 rounded accent-teal-500">
                            Recordarme
                        </label>
                        <button type="button"
                                onclick="abrirModalForgot()"
                                class="text-sm font-medium transition hover:opacity-70"
                                style="color:#D11A7A;">
                            ¿Olvidaste tu contraseña?
                        </button>
                    </div>

                    {{-- Submit --}}
                    <button type="submit"
                            class="w-full py-3 rounded-lg text-sm font-semibold text-white transition hover:opacity-90 flex items-center justify-center gap-2"
                            style="background-color:#14B8A6;">
                        <i class="fas fa-sign-in-alt"></i>
                        Iniciar Sesión
                    </button>
                </form>

                <p class="text-center text-xs mt-8" style="color:#9CA3AF;">
                    © 2026 Fábrica de Calzado Cardy
                </p>
            </div>
        </div>
    </div>

    <script>
        function abrirModalForgot() {
            document.getElementById('modal-forgot').style.display = 'flex';
        }
        function cerrarModalForgot() {
            document.getElementById('modal-forgot').style.display = 'none';
        }
        document.getElementById('modal-forgot').addEventListener('click', function(e) {
            if (e.target === this) cerrarModalForgot();
        });
        function toggleLoginPwd() {
            const input = document.getElementById('pwd-login');
            const icon  = document.getElementById('eye-login');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }
        @if(session('status'))
            window.addEventListener('load', function() {
                abrirModalForgot();
            });
        @endif
    </script>

</body>
</html>