@extends('layouts.main')

@section('title', 'Consoles - GameLogger' )
@section('header', 'Consoles')

@section('content')
<div class="container container-fluid">
    <div class="row row-cols-1 row-cols-md-3">
        @foreach ($consoles as $console)
            <div class="col mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{$console->ConsoleName}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{$console->ConsoleCompany}}</h6>
                        <a href="/consoles/{{$console->ConsoleId}}" class="card-link">View games</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection