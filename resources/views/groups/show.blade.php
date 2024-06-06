@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $group->Name }}</h1>
    <p>Líder: {{ $group->leader->name }}</p>
    <a href="{{ route('groups.add-leader', $group) }}" class="btn btn-primary mb-3">Agregar Líder</a>
    <a href="{{ route('groups.add-collaborator', $group) }}" class="btn btn-primary mb-3">Agregar Colaborador</a>

    <h2>Colaboradores</h2>
    <ul class="list-group">
        @foreach ($group->collaborators as $collaborator)
            <li class="list-group-item">{{ $collaborator->name }}</li>
        @endforeach
    </ul>
</div>
@endsection
