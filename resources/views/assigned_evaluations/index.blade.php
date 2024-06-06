@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Evaluaciones Asignadas</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Evaluación</th>
                <th>Fecha de Asignación</th>
                <th>Fecha de Compleción</th>
                <th>Puntuación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assignedEvaluations as $evaluation)
                <tr>
                    <td>{{ $evaluation->evaluation->Name }}</td>
                    <td>{{ $evaluation->AssignmentDate }}</td>
                    <td>{{ $evaluation->CompletionDate ? $evaluation->CompletionDate : 'Pendiente' }}</td>
                    <td>{{ $evaluation->Score }}</td>
                    <td>
                        <a href="{{ route('assigned_evaluations.show', $evaluation->AssignedEvaluationID) }}" class="btn btn-primary">Ver Detalles</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
