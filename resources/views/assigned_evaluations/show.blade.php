@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de la Evaluación Asignada</h1>
    <h2>{{ $assignedEvaluation->evaluation->Name }}</h2>
    <p>Descripción: {{ $assignedEvaluation->evaluation->Description }}</p>
    <p>Colaborador: {{ $assignedEvaluation->collaborator->name }}</p>
    <p>Fecha de Asignación: {{ $assignedEvaluation->AssignmentDate }}</p>
    <p>Fecha de Finalización: {{ $assignedEvaluation->CompletionDate ?? 'Pendiente' }}</p>
    <p>Puntuación: {{ $assignedEvaluation->Score }}</p>
    
    <h3>Preguntas</h3>
    @foreach ($assignedEvaluation->evaluation->questions as $question)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $question->Text }}</h5>
                <ul class="list-group">
                    @foreach ($question->answers as $answer)
                        <li class="list-group-item">{{ $answer->Text }} 
                        @if ($answer->IsCorrect)
                            <span class="badge badge-success">Correcta</span>
                        @endif
                        </li>
                    @endforeach
                </ul>
                <a href="{{ route('collaborator_answers.create', ['assignedEvaluation' => $assignedEvaluation, 'question' => $question]) }}" class="btn btn-primary mt-3">Responder</a>
            </div>
        </div>
    @endforeach
</div>
@endsection
