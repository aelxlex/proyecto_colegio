@extends('admin.layouts.app')

@section('title', 'Editar Usuario')

@section('content')
<div class="container">
    <h2>Editar Usuario</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach( $errors->all() as $error )
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name', $user->name) }}">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email', $user->email) }}">
        </div>
        <div class="form-group">
            <label>Rol</label>
            <select name="role_id" class="form-control" required>
                <option value="">Seleccione un rol</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ (old('role_id', $user->role_id) == $role->id) ? "selected" : "" }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Contraseña (dejar vacío para no cambiar)</label>
            <input type="password" name="password" class="form-control" >
        </div>
        <div class="form-group">
            <label>Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" class="form-control" >
        </div>
        <button type="submit" class="btn btn-primary mt-2">Guardar Cambios</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
    </form>
</div>
@endsection