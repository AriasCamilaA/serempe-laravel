@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Respuesta a "{{ $question->Text }}"</h1>
    <form method="POST" action="{{ route('answers.store', ['evaluation' => $evaluation, 'question' => $question]) }}">
        @csrf
        <div class="form-group">
            <label for="text">Respuesta</label>
            <input type="text" class="form-control" id="text" name="text" required>
        </div>
        <div class="form-group">
            <label for="is_correct">Es Correcta</label>
            <select id="is_correct" name="is_correct" class="form-control" required>
                <option value="0">No</option>
                <option value="1">Sí</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>
@endsection
