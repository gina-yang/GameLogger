@extends('layouts.main')

@section('title', 'Browse Games')
@section('header', 'Games')

@section('content')
@if (session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif
<div class="container container-fluid">
    <div class="my-3">
        <a href="/games/addgame" class="btn btn-primary">Add a game</a>
    </div>
    <div class="row row-cols-1 row-cols-md-3">
        @foreach ($games as $game)
            <div class="col mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{$game->GameName}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{$game->GameDeveloper}}</h6>
                        <a href="/games/{{$game->GameId}}" class="card-link">Game details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection