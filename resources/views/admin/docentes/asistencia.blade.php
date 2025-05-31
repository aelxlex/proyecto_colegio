@extends('admin.layouts.app')

@section('title', 'Asistencia de Docente')

@section('content')
<div class="container">
    <h2>Asistencia de {{ $docente->nombres }} {{ $docente->apell_paterno }} {{ $docente->apell_materno }}</h2>

    @if($asistencias->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Hora de Ingreso</th>
                    <th>Hora de Salida</th>
                    <th>Minutos de Retraso</th>
                    <th>Abandono</th>
                </tr>
            </thead>
            <tbody>
                @foreach($asistencias as $asistencia)
                    <tr>
                        <td>{{ $asistencia->id_asistencia }}</td>
                        <td>{{ $asistencia->fecha }}</td>
                        <td>{{ $asistencia->hora_ingreso }}</td>
                        <td>{{ $asistencia->hora_salida }}</td>
                        <td>{{ $asistencia->minutos_atraso }}</td>
                        <td>{{ $asistencia->abandono ? 'Sí' : 'No' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $asistencias->links() }}
    @else
        <div class="alert alert-info">
            No hay registros de asistencia para este docente.
        </div>
    @endif
</div>
@endsection