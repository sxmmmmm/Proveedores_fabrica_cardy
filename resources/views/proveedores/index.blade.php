<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Proveedores
        </h2>
    </x-slot>

    <div class="p-6">

        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('proveedores.create') }}"
               class="bg-green-500 text-white px-4 py-2 rounded">
                Nuevo Proveedor
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow rounded">
 <table class="w-full text-center border border-gray-300">

    <thead class="bg-gray-200">
        <tr>
            <th class="p-3 border">Nombre</th>
            <th class="p-3 border">Empresa</th>
            <th class="p-3 border">Documento</th>
            <th class="p-3 border">Teléfono</th>
            <th class="p-3 border">Fecha Nac.</th>
            <th class="p-3 border">Correo</th>
            <th class="p-3 border">Ciudad</th>
            <th class="p-3 border">Dirección</th>
            <th class="p-3 border">Mercancía</th>
        </tr>
    </thead>

    <tbody>
        @forelse($proveedores as $proveedor)
            <tr class="hover:bg-gray-100">
                <td class="p-3 border">{{ $proveedor->nombre }}</td>
                <td class="p-3 border">{{ $proveedor->empresa }}</td>
                <td class="p-3 border">{{ $proveedor->documento }}</td>
                <td class="p-3 border">{{ $proveedor->telefono }}</td>
                <td class="p-3 border">{{ $proveedor->fecha_nacimiento }}</td>
                <td class="p-3 border">{{ $proveedor->correo }}</td>
                <td class="p-3 border">{{ $proveedor->ciudad }}</td>
                <td class="p-3 border">{{ $proveedor->direccion }}</td>
                <td class="p-3 border">{{ $proveedor->mercancia }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="9" class="p-4 text-gray-500">
                    No hay proveedores
                </td>
            </tr>
        @endforelse
    </tbody>

</table>
        </div>

    </div>

</x-app-layout>