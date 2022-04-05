<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return redirect()->route('login');
    }

    public function authentication(Request $request)
    {
        
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('product.index');
        }
        return redirect()->route('login');
    }

    public function logout()
    {
        if (Auth::check()) {
            request()->session()->flush();
        }

        return redirect()->route('login');
    }
}
