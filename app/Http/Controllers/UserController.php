<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $validated= $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:6|confirmed'
        ]);

        $user= User::create($validated);
        if($user){
           return redirect()->route('register')->with('success','User registered successfully');
        }

        return back()->with('error','Something went wrong');
    
    }

    public function login(Request $request)

    {
        $credentials= $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if(Auth::attempt($credentials)){
            return redirect()->route('login')->with('success','User logged in successfully');
        }

        return back()->with('error','Invalid login details');

       
       
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
        
    }
}
