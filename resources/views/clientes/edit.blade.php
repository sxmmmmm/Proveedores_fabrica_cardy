@extends('layouts.app')

@section('content')

<h2>Editar Cliente</h2>

<form action="{{ route('clientes.update', $cliente->id) }}" method="POST">

@csrf
@method('PUT')

<input type="text" name="nombre" value="{{ $cliente->nombre }}">

<input type="text" name="telefono" value="{{ $cliente->telefono }}">

<button type="submit">Actualizar</button>

</form>

@endsection