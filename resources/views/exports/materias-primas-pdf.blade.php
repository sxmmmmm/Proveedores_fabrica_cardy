<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #fab8c7;
        }
        .header h1 {
            margin: 0;
            color: #333;
            font-size: 20px;
        }
        .date {
            text-align: right;
            font-size: 11px;
            color: #999;
            margin-bottom: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        thead {
            background-color: #f5f5f5;
        }
        th {
            padding: 8px;
            text-align: left;
            font-weight: bold;
            border: 1px solid #ddd;
        }
        td {
            padding: 8px;
            border: 1px solid #ddd;
        }
        tr:nth-child(even) {
            background-color: #fafafa;
        }
        .no-data {
            text-align: center;
            padding: 30px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $title }}</h1>
    </div>

    <div class="date">
        Generado: {{ $generatedAt }}
    </div>

    @if($materias_primas->count() > 0)
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
                @foreach($materias_primas as $materia)
                <tr>
                    <td>{{ $materia->id }}</td>
                    <td>{{ $materia->nombre }}</td>
                    <td>{{ $materia->tipo }}</td>
                    <td>{{ $materia->color ?? '-' }}</td>
                    <td>{{ $materia->stock }}</td>
                    <td>${{ number_format($materia->precio, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="no-data">No hay materias primas registradas</div>
    @endif
</body>
</html>
