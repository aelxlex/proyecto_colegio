@extends('admin.layouts.app')

@section('title', 'Lista de Docentes')

@section('content')
<div class="container">
    <h2>Lista de Docentes</h2>

    <a href="{{ route('admin.docentes.create') }}" class="btn btn-success mb-3">Crear Nuevo Docente</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>CI</th>
                <th>Nombres</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Carga Horaria</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($docentes as $docente)
                <tr>
                    <td>{{ $docente->id_docente }}</td> <!-- Asegúrate de que este campo sea correcto -->
                    <td>{{ $docente->ci }}</td>
                    <td>{{ $docente->nombres }}</td>
                    <td>{{ $docente->apell_paterno }}</td>
                    <td>{{ $docente->apell_materno }}</td>
                    <td>{{ $docente->carga_horaria }}</td>
                    <td>
                        <a href="{{ route('admin.docentes.edit', $docente->id_docente) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('admin.docentes.destroy', $docente->id_docente) }}" method="POST" style="display:inline;" 
                              onsubmit="return confirm('¿Está seguro de eliminar este docente?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                       <a href="{{ route('admin.docentes.asistencia', $docente->id_docente) }}" class="btn btn-info">Ver Asistencia</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $docentes->links() }}
</div>
@endsection