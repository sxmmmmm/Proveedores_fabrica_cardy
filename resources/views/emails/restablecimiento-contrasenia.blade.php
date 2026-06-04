@extends('emails.layout')

@section('content')
    <div class="title">🔐 Restablecimiento de contraseña</div>

    <p class="text">Hola, <strong>{{ $nombreUsuario }}</strong>.</p>
    <p class="text">
        Recibimos una solicitud para restablecer la contraseña de tu cuenta en
        <strong>Fábrica de Calzado Cardy</strong>.
    </p>

    <p class="text">
        Haz clic en el botón a continuación para crear una nueva contraseña. Este enlace
        expirará en <strong>60 minutos</strong>.
    </p>

    <p style="text-align:center;">
        <a href="{{ $resetUrl }}" class="btn">Restablecer mi contraseña</a>
    </p>

    <div class="highlight-box">
        <p>
            Si el botón no funciona, copia y pega este enlace en tu navegador:
        </p>
        <p style="word-break:break-all; margin-top:8px; font-size:12px; color:#64748B;">
            {{ $resetUrl }}
        </p>
    </div>

    <hr class="divider">

    <p class="text" style="font-size:12px; color:#94A3B8;">
        Si <strong>no</strong> solicitaste este cambio, puedes ignorar este correo con seguridad.
        Tu contraseña seguirá siendo la misma.
    </p>
    <p class="text" style="font-size:12px; color:#94A3B8;">
        Si tienes dudas, contacta al administrador del sistema.
    </p>
@endsection
