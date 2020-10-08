@extends('layouts.main')

@section('title', 'Edit List Description')
@section('header', 'Edit List Description')

@section('content')

<form action="/lists/{{$list->listId}}" method="POST">
    @csrf
    <input type="hidden" name="listId" id="listId" value={{$list->listId}}>
    <div class="form-group mx-5 my-2">
        <label for="description">New list description</label>
        <input type="text" name="description" id="description" class="form-control" value={{old('description')}}>
        @error('description')
            <small class="text-danger">{{$message}}</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary mx-5 my-2">
        Save
    </button>
</form>
@endsection