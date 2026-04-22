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
    <h1>Reporte de Productos</h1>
    <p>Generado el: {{ now()->format('d/m/Y H:i') }}</p>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Materia Prima</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->nombre }}</td>
                <td>{{ $p->descripcion }}</td>
                <td>${{ number_format($p->precio, 2) }}</td>
                <td>{{ $p->stock }}</td>
                <td>{{ $p->materiaPrima->nombre ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="footer">Fábrica Cardy &mdash; Total: {{ $productos->count() }} productos</div>
</body>
</html>
