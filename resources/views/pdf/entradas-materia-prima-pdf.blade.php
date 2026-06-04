<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; color: #333; }
        h1 { color: #14B8A6; border-bottom: 2px solid #14B8A6; padding-bottom: 8px; }
        table { width: 100%; border-collapse: collapse; margin-top: 16px; }
        th { background-color: #0F172A; color: white; padding: 8px; text-align: left; }
        td { padding: 7px 8px; border-bottom: 1px solid #eee; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .badge { background-color: #14B8A6; color: white; padding: 2px 6px; border-radius: 4px; font-size: 10px; }
        .footer { margin-top: 20px; font-size: 10px; color: #999; text-align: right; }
    </style>
</head>
<body>
    <h1>Reporte de Entradas de Materia Prima</h1>
    <p>Generado el: {{ now()->format('d/m/Y H:i') }}</p>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Materia Prima</th>
                <th>Cantidad</th>
                <th>Fecha Movimiento</th>
                <th>Usuario</th>
                <th>Tipo</th>
                <th>Observación</th>
                <th>Registrado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($entradas as $e)
            <tr>
                <td>{{ $e->id }}</td>
                <td>{{ optional($e->materiaPrima)->nombre ?? 'N/A' }}</td>
                <td><strong>+{{ $e->cantidad }}</strong></td>
                <td>{{ $e->fecha?->format('d/m/Y') }}</td>
                <td>{{ $e->user?->name ?? $e->usuario_nombre }}</td>
                <td><span class="badge">ENTRADA</span></td>
                <td>{{ $e->observacion ?? '—' }}</td>
                <td>{{ $e->created_at?->format('d/m/Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="footer">Fábrica Cardy &mdash; Total: {{ $entradas->count() }} entradas</div>
</body>
</html>
