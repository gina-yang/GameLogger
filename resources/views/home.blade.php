@extends('layouts.main')

@section('title', 'Home - GameLogger' )
@section('header', 'Welcome!')

@section('content')
@if (session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="container container-fluid">
    <form action="/search" method="GET">
        @csrf
        <div class="form-group mx-5 my-3">
            <input type="text" name="name" id="name" class="form-control" placeholder="Search for a game by name">
            @error('name')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-secondary mx-5">
                <i class="fa fa-search"></i> Search
            </button>
        </div>
    </form>
    <div class="row my-5">
        <div class="col-sm-4">
            <div class="mx-3 my-3">
                <div class="card text-center m3" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Games</h5>
                        <img class="my-3" src="/images/game.png"><br>
                        <a href="/games" class="btn btn-primary btn-sm">Browse all games</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="mx-3 my-3">
                <div class="card text-center m3" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Consoles</h5>
                        <img class="my-3" src="/images/technology.png"><br>
                        <a href="/consoles" class="btn btn-primary btn-sm">Browse games by console</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-sm-4">
            <div class="mx-3 my-3">
                <div class="card text-center m3" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Genres</h5>
                        <img class="my-3" src="/images/genre.png"><br>
                        <a href="/genres" class="btn btn-primary btn-sm">Browse games by genre</a>
                    </div>
                </div>
            </div>
        </div>

            
    </div>
</div>


@endsection