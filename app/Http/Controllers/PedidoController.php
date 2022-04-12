<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Pedido;
use App\Models\Sale;
use App\Models\TemporatyPedido;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::Where('user_id ');
        return view('pedidos.index', compact('pedidos'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $carts = Cart::where('user_id', $user->id)->where('status', '0')->get();

        $final_price = $carts->sum(function($product){
            return $product->sum('total');
        });

        $sale = Sale::create([
            'user_id' => $user->id,
            'final_price' => $final_price,
        ]);

        foreach ($carts as $key => $cart) {
            $cart->update(['sale_id' => $sale->id, 'status' => '1']);
        }

        return redirect()->route('pedidos.index');
    }

    public function show(Pedido $pedido)
    {

        $products = Product::Where('status', '1')->get();

        return view('pedidos.show', compact( 'products', 'sale'));
    }



}
