@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Calificar Evaluación</h1>
    <form method="POST" action="{{ route('assigned_evaluations.update', $assignedEvaluation->AssignedEvaluationID) }}">
        @csrf
        @method('PUT')
        @foreach($questions as $question)
            <div class="form-group">
                <label for="question_{{ $question->QuestionID }}">{{ $question->Text }}</label>
                @foreach($question->answers as $answer)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answer_{{ $question->QuestionID }}" id="answer_{{ $answer->AnswerID }}" value="{{ $answer->AnswerID }}" {{ $assignedEvaluation->collaboratorAnswers->where('QuestionID', $question->QuestionID)->where('AnswerID', $answer->AnswerID)->isNotEmpty() ? 'checked' : '' }}>
                        <label class="form-check-label" for="answer_{{ $answer->AnswerID }}">
                            {{ $answer->Text }}
                        </label>
                    </div>
                @endforeach
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Calificar</button>
    </form>
</div>
@endsection
