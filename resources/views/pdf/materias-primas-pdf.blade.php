<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; color: #333; }
        h1 { color: #4DC9C2; border-bottom: 2px solid #fab8c7; padding-bottom: 8px; }
        table { width: 100%; border-collapse: collapse; margin-top: 16px; }
        th { background-color: #fab8c7; color: white; padding: 8px; text-align: left; }
        td { padding: 7px 8px; border-bottom: 1px solid #eee; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .footer { margin-top: 20px; font-size: 10px; color: #999; text-align: right; }
    </style>
</head>
<body>
    <h1>Reporte de Materias Primas</h1>
    <p>Generado el: {{ now()->format('d/m/Y H:i') }}</p>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Color</th>
                <th>Stock</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($materias as $m)
            <tr>
                <td>{{ $m->id }}</td>
                <td>{{ $m->nombre }}</td>
                <td>{{ $m->tipo }}</td>
                <td>{{ $m->color }}</td>
                <td>{{ $m->stock }}</td>
                <td>${{ number_format($m->precio, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="footer">Fábrica Cardy &mdash; Total: {{ $materias->count() }} materias primas</div>
</body>
</html>
