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
        $pedidos = Pedido::all();
        return view('pedidos.index', compact('pedidos'));
    }

    public function store(Request $request)
    {
        $pedido = new Pedido;

        $pedido->total = $request->total;
        $pedido->products = $request->products;

        $pedido->save();

        return redirect()->route('pedidos.index');
    }

    public function show(Pedido $pedido)
    {

        $products = Product::Where('status', '1')->get();

        return view('pedidos.show', compact( 'products', 'sale'));
    }






}
