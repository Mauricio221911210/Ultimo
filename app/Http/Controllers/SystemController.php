<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pedido;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use App\Models\Provider;

class SystemController extends Controller
{
    public function index ()
    {
    $users = User::all();
     //$pedidos = Pedido::all();
     $products = Product::all();
     $roles= Role::all();
     $providers = Provider::all();

     return view('index', compact('users','products','roles','providers'));
    }
}
