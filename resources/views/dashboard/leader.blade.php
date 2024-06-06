@extends('layouts.app')
{{$groups = $data}}
@section('content')
<div class="container">
    <h1 class="text-center my-4">Dashboard de Colaborador</h1>
    <div class="row">
        @foreach($groups as $group)
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Grupo: {{ $group->Name }}</h5>
                        <ul class="list-group">
                            @foreach($group->collaborators->flatMap->assignedEvaluations->groupBy('EvaluationID') as $evaluationID => $assignedEvaluations)
                                @php
                                    $total = $assignedEvaluations->count();
                                    $completed = $assignedEvaluations->whereNotNull('CompletionDate')->count();
                                @endphp
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        {{ $assignedEvaluations->first()->evaluation->Name }}
                                        <span class="badge badge-primary badge-pill">{{ $completed }}/{{ $total }}</span>
                                    </div>
                                    <a href="{{ route('assigned_evaluations.group.details', ['evaluationID' => $evaluationID, 'groupID' => $group->GroupID]) }}" class="btn btn-info btn-sm">Ver Detalles</a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="mt-3">
                            <a href="{{ route('assigned_evaluations.create', ['group_id' => $group->GroupID]) }}" class="btn btn-primary btn-block">Agregar Evaluación</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
