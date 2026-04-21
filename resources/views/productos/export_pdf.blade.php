<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Productos</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 13px; color: #333; }
        h1 { color: #1e3a5f; text-align: center; margin-bottom: 4px; }
        p.fecha { text-align: center; color: #666; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        thead tr { background-color: #F4A7B9; }
        th, td { padding: 10px 12px; border: 1px solid #ddd; text-align: center; }
        tbody tr:nth-child(even) { background-color: #f9f9f9; }
        .btn-print {
            display: block; margin: 20px auto; padding: 10px 30px;
            background-color: #4DC9C2; border: none; border-radius: 6px;
            font-size: 14px; cursor: pointer;
        }
        @media print { .btn-print { display: none; } }
    </style>
</head>
<body>
    <h1>Reporte de Productos - Fábrica Cardy</h1>
    <p class="fecha">Generado el {{ now()->format('d/m/Y H:i') }}</p>

    <button class="btn-print" onclick="window.print()">🖨️ Imprimir / Guardar PDF</button>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Materia Prima</th>
                <th>Fecha Creación</th>
            </tr>
        </thead>
        <tbody>
            @forelse($productos as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->nombre }}</td>
                    <td>${{ number_format($p->precio, 2) }}</td>
                    <td>{{ $p->stock }}</td>
                    <td>{{ $p->materiaPrima->nombre ?? 'N/A' }}</td>
                    <td>{{ $p->created_at->format('d/m/Y') }}</td>
                </tr>
            @empty
                <tr><td colspan="6">No hay productos registrados</td></tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>