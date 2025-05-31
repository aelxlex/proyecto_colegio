@extends('admin.layouts.app')

@section('title', 'Editar Docente')

@section('content')
<div class="container">
    <h2>Editar Docente</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.docentes.update', $docente->id_docente) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>CI</label>
            <input type="text" name="ci" class="form-control" value="{{ old('ci', $docente->ci) }}" required>
        </div>
        <div class="form-group">
            <label>Nombres</label>
            <input type="text" name="nombres" class="form-control" value="{{ old('nombres', $docente->nombres) }}" required>
        </div>
        <div class="form-group">
            <label>Apellido Paterno</label>
            <input type="text" name="apell_paterno" class="form-control" value="{{ old('apell_paterno', $docente->apell_paterno) }}" required>
        </div>
        <div class="form-group">
            <label>Apellido Materno</label>
            <input type="text" name="apell_materno" class="form-control" value="{{ old('apell_materno', $docente->apell_materno) }}" required>
        </div>
        <div class="form-group">
            <label>Carga Horaria</label>
            <input type="number" name="carga_horaria" class="form-control" value="{{ old('carga_horaria', $docente->carga_horaria) }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Actualizar</button>
        <a href="{{ route('admin.docentes.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
    </form>
</div>
@endsection