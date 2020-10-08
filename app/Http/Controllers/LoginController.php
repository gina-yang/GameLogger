<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function index(){
        return view('authentication.login');
    }

    public function login(Request $request){
        $isLoginSuccessful = Auth::attempt([
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ]);

        if( $isLoginSuccessful ){
            return redirect()->route('profile', ['username' => $request->input('username')])->with(
                'success',
                "Successfully logged in"
            );
        } else{
            return redirect()->route('login');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
