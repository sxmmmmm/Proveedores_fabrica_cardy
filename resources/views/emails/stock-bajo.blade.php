@extends('emails.layout')

@section('content')
    <div class="title">⚠️ Alerta: Stock bajo en {{ $entidad }}</div>

    <p class="text">
        El sistema detectó que los siguientes registros del módulo <strong>{{ $entidad }}</strong>
        tienen un stock igual o inferior a <strong>5 unidades</strong>.
        Se recomienda tomar acción a la brevedad.
    </p>

    <div class="highlight-box">
        <p><strong>Módulo:</strong> {{ $entidad }}</p>
        <p><strong>Registros en alerta:</strong> {{ $items->count() }}</p>
        <p><strong>Fecha de detección:</strong> {{ now()->setTimezone('America/Bogota')->format('d/m/Y H:i') }}</p>
    </div>

    <div class="table-container">
        <table class="data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Stock actual</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nombre }}</td>
                        <td><strong>{{ $item->stock }}</strong></td>
                        <td>
                            @if($item->stock == 0)
                                <span class="badge badge-danger">Sin stock</span>
                            @else
                                <span class="badge badge-danger">Stock crítico</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <p style="text-align:center;">
        <a href="{{ config('app.url') }}/dashboard" class="btn">Gestionar inventario</a>
    </p>

    <hr class="divider">

    <p class="text" style="font-size:12px; color:#94A3B8;">
        Esta alerta se genera automáticamente cuando se detectan ítems con stock ≤ 5 en el sistema.
    </p>
@endsection
