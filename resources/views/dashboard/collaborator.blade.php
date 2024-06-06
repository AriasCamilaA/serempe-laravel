@extends('layouts.app')
{{$assignedEvaluations = $data}}
@section('content')
<div class="container">
    <h1 class="text-center my-4">Dashboard de Colaborador</h1>
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if($assignedEvaluations->isEmpty())
                <p>No tienes evaluaciones asignadas.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre de la Evaluación</th>
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
                                <td>{{ $evaluation->CompletionDate ?? 'No completada' }}</td>
                                <td>{{ $evaluation->Score ?? 'N/A' }}</td>
                                <td>
                                    @if($evaluation->CompletionDate)
                                        <a href="{{ route('assigned_evaluations.show', $evaluation->AssignedEvaluationID) }}" class="btn btn-primary btn-sm">Ver Detalles</a>
                                    @else
                                        <p>La evaluación aún no ha sido completada.</p>    
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
    </div>
</div>
@endsection
