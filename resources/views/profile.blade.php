@extends('layouts.main')

@section('title', 'Profile - GameLogger' )
@section('header')
{{$user->username}}'s Profile
@endsection

@section('content')
@if (session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif
<div class="row justify-content-center my-5">
    <a href="/{{$user->username}}/lists" class="btn btn-primary">View your lists</a>
</div>

@endsection
