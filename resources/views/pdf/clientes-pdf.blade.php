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
    <h1>Reporte de Clientes</h1>
    <p>Generado el: {{ now()->format('d/m/Y H:i') }}</p>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Documento</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Ciudad</th>
                <th>Dirección</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $c)
            <tr>
                <td>{{ $c->id }}</td>
                <td>{{ $c->nombre }}</td>
                <td>{{ $c->documento }}</td>
                <td>{{ $c->telefono }}</td>
                <td>{{ $c->correo }}</td>
                <td>{{ $c->ciudad }}</td>
                <td>{{ $c->direccion }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="footer">Fábrica Cardy &mdash; Total: {{ $clientes->count() }} clientes</div>
</body>
</html>
