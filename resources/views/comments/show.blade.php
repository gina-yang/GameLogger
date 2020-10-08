@extends('layouts.main')

@section('title')
{{$game->name}} - User Comments 
@endsection

@section('header')
{{$numcomments}} comments on {{$game->name}}
@endsection

@section('content')
@if (session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif
<div class="container container-fluid mt-4">
    <a href="/games/{{$game->gameId}}">&larr; Return to game details</a>
</div>
<div class="mx-5 my-5">
    <form class="pb-3 border-top mb-3" action="/games/{{$game->gameId}}/comments" method = "POST">
        @csrf
        <input type="hidden" name="gameId" id="gameId" value={{$game->gameId}}>
        <div class="form-group">
            <textarea name="comment" class="form-control" placeholder="Enter comment here" >{{old('comment')}}</textarea>
            @error('comment')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="text-right">
            <button class="btn btn-primary" type="submit">
                Post comment
            </button>
        </div>
    </form>
</div>

<div class="mx-5">
    @foreach($comments as $comment)
    <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
        <p>{{$comment->body}}</p><br>
        <div>
        <p><i>Posted by: </i>{{DB::table('users')->where('id', '=', $comment->id)->first()->username}}</p>
        <p class="text-right"> <i>At: </i>{{$comment->created_at}}</p>
        </div>
    </div>
@endforeach
</div>

@endsection