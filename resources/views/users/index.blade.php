@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex align-items-center">
        <h1>Usuarios</h1>
        <a href="{{ route('admin.register.form') }}" class="btn btn-primary ms-4">Crear Usuario</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo Electrónico</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    @if ($user->role->Name == 'Admin')
                        <td>{{ $user->role->Name }}</td>
                    @else
                        <td>{{ $user->role->Name }} ({{$user->Type}})</td>
                    @endif
                    <td>
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-primary">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
