@extends('emails.layout')

@section('content')
    <div class="title">🔐 Contraseña restablecida</div>

    <p class="text">Hola, <strong>{{ $nombreUsuario }}</strong>.</p>
    <p class="text">
        El administrador del sistema <strong>Fábrica de Calzado Cardy</strong> ha procesado
        tu solicitud de restablecimiento de contraseña.
    </p>
    <p class="text">
        A continuación encontrarás tus nuevas credenciales de acceso.
        Te recomendamos cambiar tu contraseña después de iniciar sesión.
    </p>

    <div class="highlight-box">
        <p style="margin-bottom:10px;"><strong>Tus nuevas credenciales</strong></p>
        <p>
            <span style="color:#64748B;">Nueva contraseña provisional:</span>
        </p>
        <p style="margin-top:8px; padding:10px 16px; background:#0F172A; border-radius:6px;
                  font-family:monospace; font-size:18px; font-weight:700; color:#14B8A6;
                  letter-spacing:2px; text-align:center;">
            {{ $nuevaContrasenia }}
        </p>
        <p style="margin-top:10px; font-size:12px; color:#64748B;">
            Fecha: {{ now()->setTimezone('America/Bogota')->format('d/m/Y H:i') }}
        </p>
    </div>

    <p style="text-align:center;">
        <a href="{{ config('app.url') }}/login" class="btn">Iniciar sesión ahora</a>
    </p>

    <hr class="divider">

    <p class="text" style="font-size:12px; color:#94A3B8;">
        Si no solicitaste este cambio, contacta de inmediato al administrador del sistema.
        Por seguridad, cambia tu contraseña tan pronto como inicies sesión.
    </p>
@endsection
