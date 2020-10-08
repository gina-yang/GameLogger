@extends('layouts.main')

@section('title')
{{$user->username}}'s Lists
@endsection

@section('header')
{{$user->username}}'s Lists
@endsection

@section('content')
@if (session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="text-center mb-3">
    <a href="/lists/create" class="btn btn-primary">Create a list</a>
</div>
<table class="table mx-5 col-11">
    <thead>
        <tr>
            <th>Name</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @if($lists->isEmpty())
        <tr>
            <td>No lists found!</td>
        </tr>
        @else
        @foreach($lists as $list)
        <tr>
            <td>
                <a href="/lists/{{$list->ListId}}">{{$list->ListName}}</a>
            </td>
            <td class="text-right col-2">
                <a class="btn btn-danger btn-sm" href="/lists/{{$list->ListId}}/delete">Delete</a>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>

@endsection