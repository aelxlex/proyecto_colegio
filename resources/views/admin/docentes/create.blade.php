@extends('admin.layouts.app')

@section('title', 'Crear Docente')

@section('content')
<div class="container">
    <h2>Crear Docente</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.docentes.store') }}" method="POST">
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
            <label>Carga Horaria</label>
            <input type="number" name="carga_horaria" class="form-control" value="{{ old('carga_horaria') }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Guardar</button>
        <a href="{{ route('admin.docentes.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
    </form>
</div>
@endsection