<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Product;
use App\Models\Pedido;
use App\Models\TemporatyPedido;


class PedidoController extends Controller
{
    public function index()
    {
        return view('pedidos.index',compact('pedidos'));
    }

    public function store(Request $request)
    {
        $pedido = Pedido::create([
            'user_id' => auth()->user()->id,
            'fecha' => date('Y-m-d'),
        ]);

        return redirect()->route('pedido.show', compact('pedido'));
    }

    public function show(Pedido $pedido)
    {
        $$users = User::all();
        $products = Product::Where('status','1')->get();
        $temporary = TemporatyPedido::where('status','0')->get();
        return view('pedido.show', compact('clients','products', 'pedido'));
    }

    public function destroy($temporary)
    {
        $temporary = TemporatyPedido::findOrFail($temporary);
        $product = $temporary->product;
        $product->update(['stock' => $product->stock + $temporary->quantity]);
        $temporary->delete();
        return back();


    }

    public function temporaryProduct(Request $request, Pedido $pedido, Product $product)
    {
        if ($product->wholesale_price > 0 && $request->quantity >= $product->wholesale_quantity) {
            $total = $request->quantity * $product->whole_price;
        } else {
            $total = $request->quantity * $product->price;
        }
        $temporary = TemporatyPedido::create([
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'total' => $total,
            'status' => '0',
            'user_id' => auth()->user()->id,
            'sale_id' => $pedido->id
        ]);
        $product->update(['stock' => $product->stock - $request->quantity]);

        return back();

    }

    public function newPedido(Request $request, Pedido $pedido)
    {
        $total = 0;
        $temporaries = TemporatyPedido::Where('pedido_id', $pedido->id);
        
        foreach ($temporaries as $key => $temporary){
            $total += $temporary->total;
           
        }
        $pedido->update([
            'total' =>$total
        ]);
        return redirect()->route('pedidos.index');

    }

    public function pedidoDelete(Pedido $pedido)
    {
       return back();
    }
}
