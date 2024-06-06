@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $evaluation->Name }}</h1>
    <p>{{ $evaluation->Description }}</p>
    <a href="{{ route('questions.create', $evaluation) }}" class="btn btn-primary mb-3">Agregar Pregunta</a>

    @foreach ($evaluation->questions as $question)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $question->Text }}</h5>
                <a href="{{ route('answers.create', ['evaluation' => $evaluation, 'question' => $question]) }}" class="btn btn-primary">Agregar Respuesta</a>

                <ul class="list-group mt-3">
                    @foreach ($question->answers as $answer)
                        <li class="list-group-item">{{ $answer->Text }} @if($answer->IsCorrect) (Correcta) @endif</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endforeach
</div>
@endsection
