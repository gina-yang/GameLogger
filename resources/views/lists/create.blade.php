@extends('layouts.main')

@section('title', 'Create List')
@section('header', 'Create List')

@section('content')
    <form action="/{{$user->username}}/lists" method="POST">
        @csrf
        <div class="form-group mx-5 my-2">
            <label for="name">List name</label>
            <input type="text" name="name" id="name" class="form-control" value={{old('name')}}>
            @error('name')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group mx-5 my-2">
            <label for="description">List description</label>
            <input type="text" name="description" id="description" class="form-control" value={{old('description')}}>
            @error('description')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mx-5 my-2">
            Create
        </button>
    </form>
@endsection