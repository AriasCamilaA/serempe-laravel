@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Responder Pregunta</h1>
    <h2>{{ $question->Text }}</h2>
    <form method="POST" action="{{ route('collaborator_answers.store', ['assignedEvaluation' => $assignedEvaluation, 'question' => $question]) }}">
        @csrf
        <div class="form-group">
            <label for="answer_id">Respuesta</label>
            <select class="form-control" id="answer_id" name="answer_id" required>
                @foreach ($question->answers as $answer)
                    <option value="{{ $answer->AnswerID }}">{{ $answer->Text }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Enviar Respuesta</button>
    </form>
</div>
@endsection
