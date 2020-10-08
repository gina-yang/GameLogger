@extends('layouts.main')

@section('title', 'Add Game')
@section('header', 'Add Game')

@section('content')
    <form action="/games" method="POST">
        @csrf
        <div class="form-group mx-5 my-2">
            <label for="name">Game name</label>
            <input type="text" name="name" id="name" class="form-control" value={{old('name')}}>
            @error('name')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group mx-5 my-2">
            <label for="developer">Developed by</label>
            <input type="text" name="developer" id="developer" class="form-control" value={{old('developer')}}>
            @error('developer')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group mx-5 my-2">
            <label for="genre">Genre</label>
            <select name="genre" id="genre" class="form-control">
                <option value="">-- Select Genre --</option>
                @foreach($genres as $genre)
                    <option value="{{$genre->genreId}}" {{$genre->genreId === old('genre') ? "selected" : ""}}>
                        {{$genre->name}}
                    </option>
                @endforeach
            </select>
            @error('genre')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group mx-5 my-2">
            <label for="console">Console</label>
            <select name="console" id="console" class="form-control">
                <option value="">-- Select Console --</option>
                @foreach($consoles as $console)
                    <option value="{{$console->consoleId}}" {{$console->consoleId === old('console') ? "selected" : ""}}>
                        {{$console->name}}
                    </option>
                @endforeach
            </select>
            @error('console')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mx-5 my-2">
            Add
        </button>
    </form>
@endsection