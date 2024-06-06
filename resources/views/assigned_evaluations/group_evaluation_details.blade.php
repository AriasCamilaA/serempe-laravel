@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Detalles de la Evaluación: {{ $evaluation->Name }}</h1>
    <h2>Grupo: {{ $group->Name }}</h2>

    <div class="row">
        <div class="col-md-6">
            <h3>No Evaluados</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Colaborador</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($notEvaluated as $eval)
                        <tr>
                            <td>{{ $eval->collaborator->name }}</td>
                            <td>
                                <a href="{{ route('assigned_evaluations.edit', $eval->AssignedEvaluationID) }}" class="btn btn-success">Calificar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h3>Evaluados</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Colaborador</th>
                        <th>Puntuación</th>
                        <th>Fecha de Compleción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($evaluated as $eval)
                        <tr>
                            <td>{{ $eval->collaborator->name }}</td>
                            <td>{{ $eval->Score }}</td>
                            <td>{{ $eval->CompletionDate }}</td>
                            <td>
                                <a href="{{ route('assigned_evaluations.show', $eval->AssignedEvaluationID) }}" class="btn btn-primary">Ver Detalles</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
