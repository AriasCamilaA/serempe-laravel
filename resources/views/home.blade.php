@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Auth::check())
                @if(Auth::user()->role->Name == 'Admin')
                    @include('dashboard.admin')
                @elseif(Auth::user()->Type == 'Leader')
                    @include('dashboard.leader')
                @elseif(Auth::user()->Type == 'Collaborator')
                    @include('dashboard.collaborator')
                @endif
            @endif
        </div>
    </div>
</div>
@endsection
