@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Asignar Evaluación al Grupo: {{ $group->Name }}</h1>
    <form method="POST" action="{{ route('assigned_evaluations.store') }}">
        @csrf
        <input type="hidden" name="group_id" value="{{ $group->GroupID }}">
        <div class="form-group">
            <label for="evaluation_id">Evaluación</label>
            <select class="form-control" id="evaluation_id" name="evaluation_id" required>
                @foreach($evaluations as $evaluation)
                    <option value="{{ $evaluation->EvaluationID }}">{{ $evaluation->Name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Asignar</button>
    </form>
</div>
@endsection
