<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reporte Completo - Fábrica Cardy</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
            line-height: 1.4;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 3px solid #fab8c7;
        }
        .header h1 {
            margin: 0;
            color: #333;
            font-size: 28px;
        }
        .header p {
            margin: 5px 0;
            color: #666;
        }
        .date {
            text-align: right;
            font-size: 11px;
            color: #999;
            margin-bottom: 20px;
        }
        .section {
            margin-bottom: 40px;
            page-break-inside: avoid;
        }
        .section-title {
            background-color: #fab8c7;
            color: white;
            padding: 10px;
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 15px;
            border-radius: 3px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        thead {
            background-color: #f5f5f5;
        }
        th {
            padding: 8px;
            text-align: left;
            font-weight: bold;
            font-size: 11px;
            border: 1px solid #ddd;
        }
        td {
            padding: 8px;
            border: 1px solid #ddd;
            font-size: 10px;
        }
        tr:nth-child(even) {
            background-color: #fafafa;
        }
        .no-data {
            text-align: center;
            padding: 20px;
            color: #999;
            font-style: italic;
        }
        .page-break {
            page-break-after: always;
        }
        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 10px;
            color: #999;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>FÁBRICA CARDY</h1>
        <p>Reporte Completo del Sistema</p>
    </div>

    <div class="date">
        Generado: {{ $generatedAt }}
    </div>

    <!-- EMPLEADOS -->
    <div class="section">
        <div class="section-title">📋 EMPLEADOS ({{ $empleados->count() }})</div>
        @if($empleados->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Documento</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Cargo</th>
                        <th>Ciudad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado->id }}</td>
                        <td>{{ $empleado->nombre }}</td>
                        <td>{{ $empleado->documento }}</td>
                        <td>{{ $empleado->telefono ?? '-' }}</td>
                        <td>{{ $empleado->correo ?? '-' }}</td>
                        <td>{{ $empleado->cargo ?? '-' }}</td>
                        <td>{{ $empleado->ciudad ?? '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="no-data">No hay empleados registrados</div>
        @endif
    </div>

    <!-- PRODUCTOS -->
    <div class="section">
        <div class="section-title">📦 PRODUCTOS ({{ $productos->count() }})</div>
        @if($productos->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Materia Prima</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>${{ number_format($producto->precio, 2) }}</td>
                        <td>{{ $producto->stock }}</td>
                        <td>{{ $producto->materiaPrima?->nombre ?? '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="no-data">No hay productos registrados</div>
        @endif
    </div>

    <!-- MATERIAS PRIMAS -->
    <div class="section">
        <div class="section-title">🏭 MATERIAS PRIMAS ({{ $materias_primas->count() }})</div>
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
    </div>

    <!-- PROVEEDORES -->
    <div class="section">
        <div class="section-title">🤝 PROVEEDORES ({{ $proveedores->count() }})</div>
        @if($proveedores->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Empresa</th>
                        <th>Documento</th>
                        <th>Teléfono</th>
                        <th>Mercancía</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($proveedores as $proveedor)
                    <tr>
                        <td>{{ $proveedor->id }}</td>
                        <td>{{ $proveedor->nombre }}</td>
                        <td>{{ $proveedor->empresa }}</td>
                        <td>{{ $proveedor->documento }}</td>
                        <td>{{ $proveedor->telefono }}</td>
                        <td>{{ $proveedor->mercancia }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="no-data">No hay proveedores registrados</div>
        @endif
    </div>

    <!-- CLIENTES -->
    <div class="section">
        <div class="section-title">👥 CLIENTES ({{ $clientes->count() }})</div>
        @if($clientes->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Documento</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Ciudad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->nombre }}</td>
                        <td>{{ $cliente->documento ?? '-' }}</td>
                        <td>{{ $cliente->telefono ?? '-' }}</td>
                        <td>{{ $cliente->correo ?? '-' }}</td>
                        <td>{{ $cliente->ciudad ?? '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="no-data">No hay clientes registrados</div>
        @endif
    </div>

    <div class="footer">
        <p>Este documento fue generado automáticamente por el sistema de Fábrica Cardy</p>
    </div>
</body>
</html>
