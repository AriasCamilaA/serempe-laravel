@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Evaluaciones de Grupos</h1>
    <div class="row">
        @foreach($groups as $group)
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Grupo: {{ $group->Name }}</h5>
                        <ul>
                            @foreach($group->collaborators->flatMap->assignedEvaluations->groupBy('EvaluationID') as $evaluationID => $assignedEvaluations)
                                @php
                                    $total = $assignedEvaluations->count();
                                    $completed = $assignedEvaluations->whereNotNull('CompletionDate')->count();
                                @endphp
                                <li>
                                    <span>{{ $assignedEvaluations->first()->evaluation->Name }} ({{ $completed }}/{{ $total }})</span>
                                    <a href="{{ route('assigned_evaluations.group.details', ['evaluationID' => $evaluationID, 'groupID' => $group->GroupID]) }}" class="btn btn-info btn-sm">Gestionar</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
