@extends('layouts.main')

@section('title')
{{$game->GameName}}
@endsection

@section('header')
@endsection

@section('content')
@if (session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif
<div class="container container-fluid mb-4">
    <a href="/games">&larr; Browse all games</a>
</div>

<div class="container container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <h2>{{$game->GameName}}</h2>
            <h4 class="text-muted" style="font-weight:normal">Developed by: {{$game->Developer}}</h3>
            <h5 style="font-weight:normal">Console: {{$game->ConsoleName}}</h4>
            <h5 style="font-weight:normal">Genre: {{$game->GenreName}}</h4>
        </div>
        @if (Auth::check())
        <div class="col-sm-4">
            <form action="/games/add" method="POST">
                @csrf
                <input type="hidden" name="gameId" id="gameId" value={{$game->GameId}}>
                <div class="form-group">
                    <select name="list" id="list" class="form-control">
                        <option value="">-- Select List --</option>
                        @foreach($lists as $list)
                            <option value="{{$list->ListId}}" {{$list->ListId === old('list') ? "selected" : ""}}>
                                {{$list->ListName}}
                            </option>
                        @endforeach
                    </select>
                    @error('list')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">
                    Add to list
                </button>
            </form>
        </div>
        @else
            <a href="/login">
                Sign in to add to list
            </a>
        @endif
    </div>
    <div class="my-5">
        <a href="/games/{{$game->GameId}}/comments" class="btn btn-secondary">View comments</a>
    </div>
</div>

@endsection