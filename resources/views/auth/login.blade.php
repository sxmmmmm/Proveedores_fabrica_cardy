<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FÁBRICA CARDY - Iniciar Sesión</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'cardy-pink': '#F4A7B9',
                        'cardy-mint': '#4ECDC4',
                        'cardy-mint-dark': '#3DBDB5',
                        'cardy-gray': '#4A4A4A',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100">

    <div class="min-h-screen flex">

        {{-- Panel izquierdo decorativo --}}
        <div class="hidden lg:flex lg:w-1/2 bg-cardy-pink flex-col items-center justify-center p-12">
            <img src="{{ asset('images/logocardy.jpg') }}"
                 alt="Fábrica Cardy"
                 class="w-48 h-48 object-contain rounded-full shadow-lg mb-8"
                 onerror="this.style.display='none'">
            <h1 class="text-4xl font-bold text-white text-center mb-4">
                FÁBRICA CARDY
            </h1>
            <p class="text-white text-center text-lg opacity-80">
                Sistema de gestión integral
            </p>
            <div class="mt-12 flex space-x-4">
                <div class="w-3 h-3 bg-white rounded-full opacity-60"></div>
                <div class="w-3 h-3 bg-white rounded-full opacity-80"></div>
                <div class="w-3 h-3 bg-white rounded-full"></div>
            </div>
        </div>

        {{-- Panel derecho con el formulario --}}
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8">
            <div class="w-full max-w-md">

                {{-- Logo para móvil --}}
                <div class="lg:hidden flex justify-center mb-8">
                    <img src="{{ asset('images/logocardy.jpg') }}"
                         alt="Fábrica Cardy"
                         class="w-24 h-24 object-contain rounded-full"
                         onerror="this.style.display='none'">
                </div>

                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-cardy-gray">Bienvenido</h2>
                    <p class="text-gray-500 mt-2">Inicia sesión para continuar</p>
                </div>

                {{-- Errores --}}
                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 px-4 py-3 rounded-lg mb-6">
                        @foreach ($errors->all() as $error)
                            <p class="text-sm">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                {{-- Formulario --}}
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- Email --}}
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-cardy-gray mb-2">
                            <i class="fas fa-envelope mr-2 text-cardy-mint"></i>
                            Correo electrónico
                        </label>
                        <input type="email"
                               name="email"
                               value="{{ old('email') }}"
                               required
                               autofocus
                               placeholder="admin@cardy.com"
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-cardy-mint transition-colors">
                    </div>

                    {{-- Contraseña --}}
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-cardy-gray mb-2">
                            <i class="fas fa-lock mr-2 text-cardy-mint"></i>
                            Contraseña
                        </label>
                        <div class="relative">
                            <input type="password"
                                   name="password"
                                   id="password"
                                   required
                                   placeholder="••••••••"
                                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-cardy-mint transition-colors pr-12">
                            {{-- Botón mostrar/ocultar contraseña --}}
                            <button type="button"
                                    onclick="togglePassword()"
                                    class="absolute right-3 top-3.5 text-gray-400 hover:text-cardy-mint transition-colors">
                                <i class="fas fa-eye" id="eye-icon"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Recordarme --}}
                    <div class="flex items-center justify-between mb-6">
                        <label class="flex items-center text-sm text-gray-600 cursor-pointer">
                            <input type="checkbox"
                                   name="remember"
                                   class="mr-2 w-4 h-4 accent-cardy-mint">
                            Recordarme
                        </label>
                    </div>

                    {{-- Botón --}}
                    <button type="submit"
                            class="w-full bg-cardy-mint hover:bg-cardy-mint-dark text-white font-medium py-3 rounded-lg transition-colors flex items-center justify-center space-x-2">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Iniciar Sesión</span>
                    </button>

                </form>

                <p class="text-center text-gray-400 text-sm mt-8">
                    © 2026 Fábrica Cardy - Design of Jesús
                </p>

            </div>
        </div>

    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const icon = document.getElementById('eye-icon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>

</body>
</html>


