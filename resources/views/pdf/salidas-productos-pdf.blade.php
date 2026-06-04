<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; color: #333; }
        h1 { color: #E11D48; border-bottom: 2px solid #E11D48; padding-bottom: 8px; }
        table { width: 100%; border-collapse: collapse; margin-top: 16px; }
        th { background-color: #0F172A; color: white; padding: 8px; text-align: left; }
        td { padding: 7px 8px; border-bottom: 1px solid #eee; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .badge { background-color: #E11D48; color: white; padding: 2px 6px; border-radius: 4px; font-size: 10px; }
        .footer { margin-top: 20px; font-size: 10px; color: #999; text-align: right; }
    </style>
</head>
<body>
    <h1>Reporte de Salidas de Productos</h1>
    <p>Generado el: {{ now()->format('d/m/Y H:i') }}</p>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Cliente</th>
                <th>Cantidad</th>
                <th>Fecha Movimiento</th>
                <th>Usuario</th>
                <th>Tipo</th>
                <th>Observación</th>
                <th>Registrado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salidas as $s)
            <tr>
                <td>{{ $s->id }}</td>
                <td>{{ optional($s->producto)->nombre ?? 'N/A' }}</td>
                <td>{{ optional($s->cliente)->nombre ?? 'N/A' }}</td>
                <td><strong>-{{ $s->cantidad }}</strong></td>
                <td>{{ $s->fecha?->format('d/m/Y') }}</td>
                <td>{{ $s->user?->name ?? $s->usuario_nombre }}</td>
                <td><span class="badge">SALIDA</span></td>
                <td>{{ $s->observacion ?? '—' }}</td>
                <td>{{ $s->created_at?->format('d/m/Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="footer">Fábrica Cardy &mdash; Total: {{ $salidas->count() }} salidas</div>
</body>
</html>
