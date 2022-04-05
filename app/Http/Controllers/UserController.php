<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(15);
        $roles = Role::all();
        return view('users.index', compact('users','roles'));
    }



    public function store(Request $request)
    {

        $request->validate([
            'name' =>'required',
            'lastname' => 'required',
            'role_id' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'role_id' => $request->role_id,
            'email' => $request->email,
            'password' => $request->password,
        ]);


        return redirect()->route('home')->with('success','El usuario se creo con exito');
    }


    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('user','roles'));

    }

    public function update(Request $request, User $user)
    {
        // $request->validate([
        //     'name' =>'required',
        //    'lastname' => 'required',
        //     'role_id' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        // ]);

        $user->update($request->all());
        return redirect()->route('user.index')->with('success', 'El usuario se actualizo con exito');

    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('home')->with('success', 'El usuario se elimino con exito');
    }
}
