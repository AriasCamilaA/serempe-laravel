@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Asignar Nueva Evaluación</h1>
    <form method="POST" action="{{ route('assigned_evaluations.store') }}">
        @csrf
        <div class="form-group">
            <label for="evaluation_id">Evaluación</label>
            <select class="form-control" id="evaluation_id" name="evaluation_id" required>
                @foreach ($evaluations as $evaluation)
                    <option value="{{ $evaluation->EvaluationID }}">{{ $evaluation->Name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="collaborator_id">Colaborador</label>
            <select class="form-control" id="collaborator_id" name="collaborator_id" required>
                @foreach ($collaborators as $collaborator)
                    <option value="{{ $collaborator->id }}">{{ $collaborator->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Asignar</button>
    </form>
</div>
@endsection
