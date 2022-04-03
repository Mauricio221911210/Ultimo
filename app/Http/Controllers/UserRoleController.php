<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth()->user();

        if ($user->role_id == 1)  {
            return redirect()->route('welcome');
            
        }

        return $next($request);
    }
}
