@extends('layouts.main')

@section('title', 'Log In - GameLogger' )
@section('header', 'Log In')

@section('content')
<p class="text-center">Don't have an account? <a href="/register">Register here.</a></p>
<div class="row justify-content-center">

    <form method="post" action="/login">
        @csrf
        <div class="form-group">
            <label for="username">Username</label>
            <input type="username" id="username" name="username" class="form-control">
            @error('username')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>
        <input type="submit" value="Login" class="btn btn-primary">
    </form>
</div>
@endsection
