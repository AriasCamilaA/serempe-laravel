@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Grupos</h1>
    <a href="{{ route('groups.create') }}" class="btn btn-primary mb-3">Crear Nuevo Grupo</a>
    @foreach ($groups as $group)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $group->Name }}</h5>
                <p class="card-text">Líder: {{ $group->leader->name }}</p>
                <a href="{{ route('groups.show', $group) }}" class="btn btn-primary">Ver Grupo</a>
            </div>
        </div>
    @endforeach
</div>
@endsection
