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
        $pedidos = Pedido::all();
        return view('sales.index', compact('sales'));
    }

    public function store(Request $request)
    {
        $pedido = Pedido::create([
            'user_id' => auth()->user()->id,
            'date' => date('Y-m-d'),
        ]);

        return redirect()->route('sales.show', compact('sale'));
    }

    public function show(Pedido $pedido)
    {
       
        $products = Product::orderBy('id', 'desc')->get();
        $temporary = TemporatyPedido::where('status', '0')->get();
        return view('sales.show', compact('clients', 'products', 'temporary', 'sale'));
    }

    public function destroy($temporary)
    {
        $temporary = TemporatyPedido::findOrFail($temporary);
        $product = $temporary->product;
        $product->update(['stock' => $product->stock + $temporary->quantity]);
        $temporary->delete();
        return back();
    }

    public function temporaryProduct(Request $request, Pedido $pedido,  Product $product)
    {
        if ($product->wholesale_price > 0 && $request->quantity >= $product->wholesale_quantity) {
            $total = $request->quantity * $product->wholesale_price;
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

    public function newSale(Request $request, Pedido $pedido)
    {
        $total = 0;
        $temporaries = TemporatyPedido::Where('sale_id', $pedido->id)
            ->where('status', '0')
            ->get();
        foreach ($temporaries as $key => $temporary) {
            $total += $temporary->total;
            $temporary->update(['status' => '1']);
        }
        $pedido->update([
            'status' => '2',
            'total' => $total
        ]);
        return redirect()->route('store')->with('success','Venta realizada con exito!');
    }

    public function addClient(Request $request, Pedido $pedido)
    {
        $pedido->update(['client_id' => $request->client]);
        return back();
    }

    public function saleDelete(Pedido $pedido)
    {
        $pedido->update(['status' => '3']);
        return back();
    }

    public function saleReport(Pedido $pedido)
    {
        $details = $pedido->TemporarySale;
        $pdf = \PDF::loadView('pdf.sale-index', compact('sale', 'details'))->setPaper('commercial #10 envelope', 'landscape');
        // $pdf = \PDF::loadHTML($html)->setPaper('a4', 'landscape')->setWarnings(false)->loadview('pdf.sale-index', compact('sale', 'details'));
        return $pdf->stream('sale.pdf');
    }
}
