@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nuevo Grupo</h1>
    <form method="POST" action="{{ route('groups.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="leader_id">Líder</label>
            <select class="form-control" id="leader_id" name="leader_id" required>
                @foreach ($leaders as $leader)
                    <option value="{{ $leader->id }}">{{ $leader->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
</div>
@endsection
