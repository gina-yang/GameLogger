@extends('layouts.main')

@section('title', 'Genres - GameLogger' )
@section('header', 'Genres')

@section('content')
<div class="container container-fluid">
    <div class="row row-cols-1 row-cols-md-3">
        @foreach ($genres as $genre)
            <div class="col mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{$genre->GenreName}}</h5>
                        <p class="card-text">{{$genre->GenreDesc}}</p>
                        <a href="/genres/{{$genre->GenreId}}" class="card-link">View games</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection