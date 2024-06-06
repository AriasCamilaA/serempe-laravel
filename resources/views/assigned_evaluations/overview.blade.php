@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex align-items-center">
        <h1>Resumen de Evaluaciones Asignadas</h1>
        <a href="{{ route('assigned_evaluations.create') }}" class="btn btn-primary ms-3">Asignar Nueva Evaluación</a>
    </div>

    @foreach ($evaluations as $evaluation)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $evaluation->Name }}</h5>
                <p class="card-text">{{ $evaluation->Description }}</p>

                <h6>Colaboradores que han completado la evaluación:</h6>
                <ul class="list-group mb-3">
                    @foreach ($evaluation->assignedEvaluations->where('CompletionDate', '!=', null) as $assignedEvaluation)
                        <li class="list-group-item">
                            {{ $assignedEvaluation->collaborator->name }} - Puntuación: {{ $assignedEvaluation->Score }}
                        </li>
                    @endforeach
                </ul>

                <h6>Colaboradores que no han completado la evaluación:</h6>
                <ul class="list-group">
                    @foreach ($evaluation->assignedEvaluations->where('CompletionDate', '=', null) as $assignedEvaluation)
                        <li class="list-group-item">
                            {{ $assignedEvaluation->collaborator->name }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endforeach
</div>
@endsection
