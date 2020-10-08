@extends('layouts.main')

@section('title')
{{$list->name}}
@endsection

@section('header')
{{$list->name}}
@endsection

@section('content')
@if (session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif
<div class="text-center mb-5">
    <p class="text-muted">{{$list->description}}</p>
    <a class="btn btn-secondary btn-sm" href="/lists/{{$list->listId}}/edit">Edit description</a>
</div>

<table class="table mx-5 col-11">
    <thead>
        <tr>
            <th>Name</th>
            <th>Developer</th>
            <th>Console</th>
            <th>Genre</th>
            {{-- <th></th> --}}
        </tr>
    </thead>
    <tbody>
        @if($games->isEmpty())
        <tr>
            <td>No games found! <br>Browse games from the homepage to add to this list.</td>
        </tr>
        @else
        @foreach($games as $game)
        <tr>
            <td class="col-5">
                <a href="/games/{{$game->GameId}}">{{$game->GameName}}</a>
            </td>
            <td class="col-2">
                {{$game->GameDeveloper}}
            </td>
            <td class="col-2">
                {{$game->ConsoleName}}
            </td>
            <td class="col-1">
                {{$game->GenreName}}
            </td>
            {{-- <td class="text-right col-1">
                <a class="btn btn-danger btn-sm" href="#">Remove</a>
            </td> --}}
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
@endsection