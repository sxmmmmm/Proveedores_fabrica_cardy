<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recuperar Contraseña - Fábrica Cardy</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased min-h-screen flex items-center justify-center" style="background: linear-gradient(135deg, #fab8c7 0%, #f08fab 50%, #4DC9C2 100%);">

    <div class="w-full max-w-md px-4">
        {{-- Logo --}}
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full text-white font-bold text-2xl mb-3 shadow-lg" style="background-color: #4DC9C2;">
                C
            </div>
            <h1 class="text-2xl font-bold text-white">Fábrica Cardy</h1>
            <p class="text-pink-100 text-sm mt-1">Sistema de Gestión</p>
        </div>

        {{-- Card --}}
        <div class="bg-white rounded-2xl shadow-2xl p-8">
            <div class="text-center mb-6">
                <div class="inline-flex items-center justify-center w-12 h-12 rounded-full mb-3" style="background-color: rgba(77, 201, 194, 0.1);">
                    <svg class="w-6 h-6" style="color: #4DC9C2;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-gray-900">Recuperar contraseña</h2>
                <p class="text-sm text-gray-500 mt-1">Ingresa tu correo y te enviaremos un enlace para restablecer tu contraseña.</p>
            </div>

            {{-- Status --}}
            @if (session('status'))
                <div class="mb-5 px-4 py-3 rounded-lg text-sm font-medium text-green-700" style="background-color: rgba(77, 201, 194, 0.1); border: 1px solid #4DC9C2;">
                    ✅ {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mb-5">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo electrónico</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                            </svg>
                        </div>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                            class="block w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent transition"
                            style="focus-ring-color: #4DC9C2;"
                            placeholder="tu@correo.com">
                    </div>
                    @error('email')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full flex items-center justify-center gap-2 py-2.5 px-4 rounded-lg text-sm font-semibold text-white transition hover:opacity-90 shadow-md"
                    style="background: linear-gradient(135deg, #4DC9C2, #3db5ae);">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Enviar enlace de recuperación
                </button>
            </form>

            <div class="mt-5 text-center">
                <a href="{{ route('login') }}" class="text-sm font-medium transition hover:opacity-70" style="color: #4DC9C2;">
                    ← Volver al inicio de sesión
                </a>
            </div>
        </div>

        <p class="text-center text-pink-100 text-xs mt-6">© {{ date('Y') }} Fábrica de Calzado Cardy</p>
    </div>

</body>
</html>