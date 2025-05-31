@extends('admin.layouts.app')

@section('title', 'Crear Estudiante')

@section('content')
<div class="container">
    <h2>Crear Estudiante</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.estudiantes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>CI</label>
            <input type="text" name="ci" class="form-control" value="{{ old('ci') }}" required>
        </div>
        <div class="form-group">
            <label>Nombres</label>
            <input type="text" name="nombres" class="form-control" value="{{ old('nombres') }}" required>
        </div>
        <div class="form-group">
            <label>Apellido Paterno</label>
            <input type="text" name="apell_paterno" class="form-control" value="{{ old('apell_paterno') }}" required>
        </div>
        <div class="form-group">
            <label>Apellido Materno</label>
            <input type="text" name="apell_materno" class="form-control" value="{{ old('apell_materno') }}" required>
        </div>
        <div class="form-group">
            <label>Nombre Tutor</label>
            <input type="text" name="nombre_tutor" class="form-control" value="{{ old('nombre_tutor') }}" required>
        </div>
        <div class="form-group">
            <label>Teléfono Tutor</label>
            <input type="text" name="telefono_tutor" class="form-control" value="{{ old('telefono_tutor') }}" required>
        </div>

        <div class="form-group">
            <label>Curso</label>
            <select name="id_curso" class="form-control" required>
                <option value="">Seleccionar Curso</option>
                @foreach($cursos as $curso)
                    <option value="{{ $curso->id_curso }}" {{ old('id_curso') == $curso->id_curso ? 'selected' : '' }}>
                        {{ $curso->grado }} - {{ $curso->paralelo }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Guardar</button>
        <a href="{{ route('admin.estudiantes.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
    </form>
</div>
@endsection