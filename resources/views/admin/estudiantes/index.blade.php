@extends('admin.layouts.app')

@section('title', 'Lista de Estudiantes')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between mb-3 align-items-center">
        <h2>Lista de Estudiantes</h2>
        <a href="{{ route('admin.estudiantes.create') }}" class="btn btn-success">Añadir Estudiante</a>
    </div>

    <form class="form-inline mb-3" method="GET" action="{{ route('admin.estudiantes.index') }}">
        <div class="form-group mr-2 mb-2 mb-sm-0">
            <select name="grado" class="form-control">
                <option value="">Seleccionar Grado</option>
                @foreach(['primero', 'segundo', 'tercero', 'cuarto', 'quinto', 'sexto'] as $gradoOption)
                    <option value="{{ $gradoOption }}" {{ request('grado') == $gradoOption ? 'selected' : '' }}>
                        {{ ucfirst($gradoOption) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mr-2 mb-2 mb-sm-0">
            <select name="paralelo" class="form-control">
                <option value="">Seleccionar Paralelo</option>
                @foreach(['A', 'B', 'C'] as $paraleloOption)
                    <option value="{{ $paraleloOption }}" {{ request('paralelo') == $paraleloOption ? 'selected' : '' }}>
                        {{ $paraleloOption }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mr-2">Filtrar</button>
        <a href="{{ route('admin.estudiantes.index') }}" class="btn btn-secondary">Limpiar</a>
    </form>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>CI</th>
                <th>Nombres</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Nombre Tutor</th>
                <th>Teléfono Tutor</th>
                <th>Grado</th>
                <th>Paralelo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($estudiantes as $estudiante)
                <tr>
                    <td>{{ $estudiante->id_estudiante }}</td>
                    <td>{{ $estudiante->ci }}</td>
                    <td>{{ $estudiante->nombres }}</td>
                    <td>{{ $estudiante->apell_paterno }}</td>
                    <td>{{ $estudiante->apell_materno }}</td>
                    <td>{{ $estudiante->nombre_tutor }}</td>
                    <td>{{ $estudiante->telefono_tutor }}</td>
                    <td>{{ $estudiante->curso->grado ?? '-' }}</td>
                    <td>{{ $estudiante->curso->paralelo ?? '-' }}</td>
                    <td>
                        <a href="{{ route('admin.estudiantes.edit', $estudiante->id_estudiante) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('admin.estudiantes.destroy', $estudiante->id_estudiante) }}" method="POST" 
                            style="display:inline;" onsubmit="return confirm('¿Está seguro de eliminar este estudiante?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="10" class="text-center">No se encontraron estudiantes.</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $estudiantes->links() }}
    </div>
</div>
@endsection