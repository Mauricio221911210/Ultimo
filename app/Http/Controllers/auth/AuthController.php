<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return redirect()->route('welcome');
    }


    public function authentication()
    {
        request()->validate([
            'name' => 'required',
            'password' => 'requiered',
        ]);
        $credentials = request()->only('name', 'password'); 
            if (Auth::attempt($credentials)) {
                request()->session()->regenerate();
                return redirect()->route('home');
            }
        return redirect()->route('welcome');
    }

    public function logout(){
        if(Auth::check()){
            request()->route('welcome');
        }
    }
}
