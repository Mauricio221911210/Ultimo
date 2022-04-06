<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CarritoController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('home', compact('products'));
    }

    public function addToCart(Request $request, Product $product)
    {
        $user = auth()->user();
        if (!$product->stock > 0) {
            return back();
        }

        $productInCart = Cart::where('product_id', $product->id)->where('user_id', $user->id)
            ->where('status', '0')->first();

        if ($productInCart != null) {
            $productInCart->update([
                'quantity' => $productInCart->quantity + 1,
                'total' => $productInCart->total + $product->precio
            ]);
            $product->update(['stock' => $product->stock - 1]);
            return back();
        }

        $cart = Cart::create([
            'product_id' => $product->id,
            'quantity' => 1,
            'total' => $product->precio,
            'status' => '0',
            'user_id' => auth()->user()->id,
        ]);

        $product->update(['stock' => $product->stock - 1]);

        return back();
    }

    public function myCart()
    {
        $user = auth()->user();
        $cart = Cart::Where('user_id', $user->id)->where('status', '0')->get();
        return view('cart.index', compact('cart'));
    }

    public function deleteProductFromCart(Request $request, Product $product)
    {
        $user = auth()->user();

        $productInCart = Cart::where('product_id', $product->id)->where('user_id', $user->id)
        ->where('status', '0')->first();

        if ($productInCart != null) {
            $product->update(['stock'=> $product->stock + $productInCart->quantity]);
            $productInCart->delete();
            return back();
        }

    }
}
