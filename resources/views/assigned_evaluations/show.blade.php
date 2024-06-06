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
                @php
                    $answered = $assignedEvaluation->collaboratorAnswers->where('QuestionID', $question->QuestionID)->first();
                @endphp
                @if ($answered)
                    <ul class="list-group">
                        @foreach ($question->answers as $answer)
                            @php
                                $isCorrect = $answer->IsCorrect;
                                $isSelected = $answered && $answered->AnswerID == $answer->AnswerID;
                            @endphp
                            <li class="list-group-item {{ $isSelected ? ($isCorrect ? 'list-group-item-success' : 'list-group-item-warning') : '' }}">
                                {{ $answer->Text }}
                            </li>
                        @endforeach
                    </ul>
                @else
                    <ul class="list-group">
                        @foreach ($question->answers as $answer)
                            <li class="list-group-item">{{ $answer->Text }}</li>
                        @endforeach
                    </ul>
                    <a href="{{ route('collaborator_answers.create', ['assignedEvaluation' => $assignedEvaluation->AssignedEvaluationID, 'question' => $question->QuestionID]) }}" class="btn btn-primary mt-3">Responder</a>
                @endif
            </div>
        </div>
    @endforeach
</div>
@endsection
