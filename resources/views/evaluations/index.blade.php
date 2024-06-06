@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Evaluaciones</h1>
    <a href="{{ route('evaluations.create') }}" class="btn btn-primary mb-3">Crear Nueva Evaluación</a>
    @foreach ($evaluations as $evaluation)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $evaluation->Name }}</h5>
                <p class="card-text">{{ $evaluation->Description }}</p>
                <a href="{{ route('evaluations.show', $evaluation) }}" class="btn btn-primary">Ver Evaluación</a>
            </div>
        </div>
    @endforeach
</div>
@endsection
