@extends('layouts.app')

@section('content')

<h2>Crear Cliente</h2>

<form action="{{ route('clientes.store') }}" method="POST">

@csrf

<input type="text" name="nombre" placeholder="Nombre">

<input type="text" name="telefono" placeholder="Teléfono">

<button type="submit">Guardar</button>

</form>

@endsection