@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Colaborador a {{ $group->Name }}</h1>
    <form method="POST" action="{{ route('groups.store-collaborator', $group) }}">
        @csrf
        <div class="form-group">
            <label for="collaborator_id">Colaborador</label>
            <select class="form-control" id="collaborator_id" name="collaborator_id" required>
                @foreach ($collaborators as $collaborator)
                    <option value="{{ $collaborator->id }}">{{ $collaborator->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>
@endsection
