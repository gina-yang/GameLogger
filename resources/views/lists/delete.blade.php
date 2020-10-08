@extends('layouts.main')
@section('title', 'Delete List')
@section('header', 'Delete List')

@section('content')
    <div class="row justify-content-center">
        <form action="/{{$user->username}}/lists/delete" method="POST">
            @csrf
            <input type="hidden" name="listId" id="listId" value={{$list->listId}}>
            <h5 class="my-5">Are you sure you want to delete "{{$list->name}}"?</h5>
            <div class="row justify-content-center my-5">
                <button type="submit" class="btn btn-danger">Delete</button>
                <a href="/{{$user->username}}/lists" class="btn btn-secondary mx-2">Cancel</a>
                
            </div>
        </form>
    </div>
    
@endsection