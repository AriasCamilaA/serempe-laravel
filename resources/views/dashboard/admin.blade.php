@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Dashboard de Administrador</h1>
    <div class="row">
        <div class="col-md-4 mb-4">
            <a href="{{ route('users.index') }}" class="text-decoration-none">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-users fa-3x mb-3"></i>
                        <h4>Gestionar Usuarios</h4>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a href="{{ route('assigned_evaluations.index') }}" class="text-decoration-none">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-tasks fa-3x mb-3"></i>
                        <h4>Gestionar Evaluaciones</h4>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
