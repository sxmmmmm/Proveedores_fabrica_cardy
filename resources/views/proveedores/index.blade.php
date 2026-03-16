<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FÁBRICA CARDY - Proveedores</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Proveedores</h2>
            <a href="{{ route('proveedores.create') }}"
               class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg">
                <i class="fas fa-plus mr-2"></i>Nuevo Proveedor
            </a>
        </div>

        {{-- Mensaje de éxito --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full min-w-max">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nombre</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Empresa</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Documento</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Teléfono</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fecha Nac.</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Correo</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Ciudad</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Dirección</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Mercancía</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">

                        @forelse($proveedores as $proveedor)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm">{{ $proveedor->nombre }}</td>
                                <td class="px-6 py-4 text-sm">{{ $proveedor->empresa }}</td>
                                <td class="px-6 py-4 text-sm">{{ $proveedor->documento }}</td>
                                <td class="px-6 py-4 text-sm">{{ $proveedor->telefono }}</td>
                                <td class="px-6 py-4 text-sm">{{ $proveedor->fecha_nacimiento }}</td>
                                <td class="px-6 py-4 text-sm">{{ $proveedor->correo }}</td>
                                <td class="px-6 py-4 text-sm">{{ $proveedor->ciudad }}</td>
                                <td class="px-6 py-4 text-sm">{{ $proveedor->direccion }}</td>
                                <td class="px-6 py-4 text-sm">{{ $proveedor->mercancia }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="px-6 py-4 text-center text-gray-400">
                                    No hay proveedores registrados aún.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>