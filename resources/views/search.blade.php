@extends('layouts.main')

@section('title', 'Browse Games')
@section('header', 'Games')

@section('content')
@if (session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif
<div class="container container-fluid mb-4">
    <a href="/">&larr; Return to home</a>
</div>
<div class="container container-fluid">
    <div class="row row-cols-1 row-cols-md-3">
        @if($results->isEmpty())
            <p>No results!</p>
        @else
        @foreach ($results as $result)
            <div class="col mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{$result->name}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{$result->developer}}</h6>
                        <a href="/games/{{$result->gameId}}" class="card-link">Game details</a>
                    </div>
                </div>
            </div>
        @endforeach
        @endif
    </div>
</div>

@endsection