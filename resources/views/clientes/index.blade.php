@extends('layouts.app')

@section('content')

<h2>Lista de Clientes</h2>

<a href="{{ route('clientes.create') }}">
    Nuevo Cliente
</a>

<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Teléfono</th>
        <th>Acciones</th>
    </tr>

    @foreach ($clientes as $cliente)
    <tr>
        <td>{{ $cliente->id }}</td>
        <td>{{ $cliente->nombre }}</td>
        <td>{{ $cliente->telefono }}</td>
        <td>
            <a href="{{ route('clientes.edit', $cliente->id) }}">Editar</a>
        </td>
    </tr>
    @endforeach

</table>

@endsection