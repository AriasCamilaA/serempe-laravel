@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Evaluaciones Asignadas</h1>
    @foreach ($assignedEvaluations as $assignedEvaluation)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $assignedEvaluation->evaluation->Name }}</h5>
                <p class="card-text">Colaborador: {{ $assignedEvaluation->collaborator->name }}</p>
                <p class="card-text">Fecha de Asignación: {{ $assignedEvaluation->AssignmentDate }}</p>
                <p class="card-text">Fecha de Finalización: {{ $assignedEvaluation->CompletionDate ?? 'Pendiente' }}</p>
                <p class="card-text">Puntuación: {{ $assignedEvaluation->Score }}</p>
                <a href="{{ route('assigned_evaluations.show', $assignedEvaluation) }}" class="btn btn-primary">Ver Detalles</a>
                <form action="{{ route('assigned_evaluations.destroy', $assignedEvaluation) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
