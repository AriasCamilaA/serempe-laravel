@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Líder a {{ $group->Name }}</h1>
    <form method="POST" action="{{ route('groups.store-leader', $group) }}">
        @csrf
        <div class="form-group">
            <label for="leader_id">Líder</label>
            <select class="form-control" id="leader_id" name="leader_id" required>
                @foreach ($leaders as $leader)
                    <option value="{{ $leader->id }}">{{ $leader->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>
@endsection
