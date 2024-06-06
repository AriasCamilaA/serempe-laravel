@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Usuario</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('users.update', $user) }}">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>
        <div class="form-group">
            <label for="role_id">Rol</label>
            <select class="form-control" id="role_id" name="role_id" required>
                @foreach($roles as $role)
                    <option value="{{ $role->RoleID }}" {{ $user->RoleID == $role->RoleID ? 'selected' : '' }}>
                        {{ $role->Name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="type">Tipo de Usuario</label>
            <select class="form-control" id="type" name="type" required>
                <option value="Leader" {{ $user->Type == 'Leader' ? 'selected' : '' }}>Líder</option>
                <option value="Collaborator" {{ $user->Type == 'Collaborator' ? 'selected' : '' }}>Colaborador</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
