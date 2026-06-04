@extends('emails.layout')

@section('content')
    <div class="title">✅ Importación completada</div>

    <p class="text">Hola, <strong>{{ $nombreUsuario }}</strong>.</p>
    <p class="text">
        La importación de <strong>{{ $entidad }}</strong> se realizó correctamente en el sistema
        <strong>Fábrica de Calzado Cardy</strong>.
    </p>

    <div class="highlight-box">
        <p><strong>Módulo importado:</strong> {{ $entidad }}</p>
        <p><strong>Fecha y hora:</strong> {{ now()->setTimezone('America/Bogota')->format('d/m/Y H:i') }}</p>
        <p><strong>Realizado por:</strong> {{ $nombreUsuario }}</p>
    </div>

    <p class="text">
        Todos los registros del archivo fueron validados y guardados exitosamente. Puedes verificarlos
        desde el módulo correspondiente en el sistema.
    </p>

    <p style="text-align:center;">
        <a href="{{ config('app.url') }}/dashboard" class="btn">Ir al sistema</a>
    </p>

    <hr class="divider">

    <p class="text" style="font-size:12px; color:#94A3B8;">
        Si no reconoces esta acción, comunícate de inmediato con el administrador del sistema.
    </p>
@endsection
