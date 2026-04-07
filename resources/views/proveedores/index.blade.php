<x-with-sidebar-layout>

    <x-slot name="header">
        Proveedores
    </x-slot>

    <div class="p-6">

        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('proveedores.create') }}"
                style="background-color: #4DC9C2; color: black"
               class="px-4 py-2 rounded">
                Nuevo Proveedor
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow rounded">
 <table style="border-color: #F4A7B9;"class="w-full text-center border border-gray-300">

    <thead>

        <tr style="background-color: #F4A7B9;">
            <th class="p-3 border">Nombre</th>
            <th class="p-3 border">Empresa</th>
            <th class="p-3 border">Documento</th>
            <th class="p-3 border">Teléfono</th>
            <th class="p-3 border">Fecha Nac.</th>
            <th class="p-3 border">Correo</th>
            <th class="p-3 border">Ciudad</th>
            <th class="p-3 border">Dirección</th>
            <th class="p-3 border">Mercancía</th>
            <th class="p-3 border">Acciones</th>
        </tr>
    </thead>

    <tbody>
        @forelse($proveedores as $proveedor)
            <tr class= style="" onmouseover="this.style.backgroundColor='#FCE4EC'" onmouseout="this.style.backgroundColor=''"">
                <td class="p-3 border">{{ $proveedor->nombre }}</td>
                <td class="p-3 border">{{ $proveedor->empresa }}</td>
                <td class="p-3 border">{{ $proveedor->documento }}</td>
                <td class="p-3 border">{{ $proveedor->telefono }}</td>
                <td class="p-3 border">{{ $proveedor->fecha_nacimiento }}</td>
                <td class="p-3 border">{{ $proveedor->correo }}</td>
                <td class="p-3 border">{{ $proveedor->ciudad }}</td>
                <td class="p-3 border">{{ $proveedor->direccion }}</td>
                <td class="p-3 border">{{ $proveedor->mercancia }}</td>
                <td class="p-3 border">
                    <div class="flex gap-2">   
                    <a href="{{ route('proveedores.edit', $proveedor->id) }}"
                            style="background-color: #4DC9C2;"
                            class="text-white px-3 py-1 rounded text-sm">
                            Editar
                         </a>
                         
                    <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST" style="display:inline;">
                         @csrf
                         @method('DELETE')
                        <button style="background-color: #F4A7B9;"
                                class="text-white px-3 py-1 rounded text-sm">
                            Eliminar
                        </button>
                    </form>
                    </div> 
                </td>
            </tr>
        @empty
            <tr onmouseover="this.style.backgroundColor='#FCE4EC'" 
    onmouseout="this.style.backgroundColor=''">
                <td colspan="9" class="p-4 text-gray-500">
                    No hay proveedores
                </td>
            </tr>
        @endforelse
    </tbody>

</table>
        </div>

    </div>

</x-with-sidebar-layout>