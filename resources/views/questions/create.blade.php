@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Pregunta a {{ $evaluation->Name }}</h1>
    <form method="POST" action="{{ route('questions.store', $evaluation) }}">
        @csrf
        <div class="form-group">
            <label for="text">Pregunta</label>
            <input type="text" class="form-control" id="text" name="text" required>
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>
@endsection
