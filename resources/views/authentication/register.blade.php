@extends('layouts.main')

@section('title', 'Sign Up - GameLogger' )
@section('header', 'Sign Up')

@section('content')
<p class="text-center">Already have an account? <a href="/login">Log in here</a>.</p> <br>
<div class="row justify-content-center">

    <form method="post" action="/register">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value={{old('email')}}>
            @error('email')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" class="form-control" value={{old('username')}}>
            @error('username')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control">
            @error('password')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <input type="submit" value="Register" class="btn btn-primary">
    </form>
</div>
        
@endsection
