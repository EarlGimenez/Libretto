<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function store(Request $request){
        $valid = $request->validate([ 
            "name"=> "required",
            "password"=>"required|min:5",
            "password2"=>"required|confirmed:password2"
        ]);

        User::create([
            "name"=> $request->name,
            "password"=> bcrypt($request->password)
        ]);

        return redirect(route('login'))->with("success","User registered successfully!");
    }
    public function login(){
        return view('login');
    }
    public function logout(){
        Auth::logout();
        return redirect(route('login'));
    }
    public function register(){
        return view('register');
    }
    public function auth(Request $request){
        $valid = $request->validate([
            'name'=> 'required|exists:users,name',
            'password'=> 'required'
        ]);

        if(Auth::attempt($valid)){
            $request->session()->regenerate();
            return redirect()->intended(route('authors.index'));
        }

        return redirect(route('login'))->with('error','Invalid Credentials');
    }
}