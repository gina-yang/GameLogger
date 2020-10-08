<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;

class RegistrationController extends Controller
{
    public function showRegistrationForm(){
        return view('authentication.register');
    }

    public function register(Request $request){
        $validatedData = $request->validate([
            'username' => 'required|max:30|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ]);
        $user = new User();
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        Auth::login($user);
        return redirect()->route('home', ['username' => $request->input('username')])->with(
            'success',
            "Successfully registered as {$user->username}"
        );
    }
}
