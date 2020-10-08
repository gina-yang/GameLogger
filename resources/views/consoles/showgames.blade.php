@extends('layouts.main')

@section('title')
    Console - {{$console->ConsoleName}}
@endsection
@section('header')
    {{$console->ConsoleName}}
@endsection

@section('content')
<div class="container container-fluid mb-4">
    <a href="/consoles">&larr; Return to all consoles</a>
</div>
<div class="container container-fluid">
    <div class="my-3">
        <a href="/games/addgame" class="btn btn-primary">Add a game</a>
    </div>
    <div class="row row-cols-1 row-cols-md-3">
        @if($games->isEmpty())
            <p>No games found!</p>
        @else
        @foreach ($games as $game)
            <div class="col mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{$game->GameName}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{$game->GameDeveloper}}</h6>
                        <p class="card-text"><i>Genre: {{$game->GenreName}}</i></p>
                        <a href="/games/{{$game->GameId}}" class="card-link">Game details</a>
                    </div>
                </div>
            </div>
        @endforeach
        @endif
    </div>
</div>

@endsection