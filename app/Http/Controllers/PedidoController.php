<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Pedido;
use App\Models\TemporatyPedido;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PedidoController extends Controller
{
    public function index()
    {
        $pedido = Pedido::all();
        return view('pedidos.index', compact('pedidos'));
    }

    public function store(Request $request)
    {
        $pedido = Pedido::create([
            'user_id' => auth()->user()->id,
            'date' => date('Y-m-d'),
        ]);

        return redirect()->route('pedidos.show', compact('pedido'));
    }

    public function show(Pedido $pedido)
    {
        
        $products = Product::Where('status', '1')->get();
       
        return view('pedidos.show', compact( 'products', 'sale'));
    }



   
   

}
