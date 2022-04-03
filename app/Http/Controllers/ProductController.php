<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Provider;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(15);
        $providers = Provider::all();
        return view('products.index', compact('providers','products'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'stock' => 'required',
            'precio' => 'required',
            'description' => 'required',
            'provider_id' => 'required',
            
        ]);
      
        $product = new Product ($request->except('photo'));

        if($request->hasFile('photo'))
        {
            $product->photo = $request->file('photo')->store("products",'public');
        }
        $product->save();
          
       // Product::create([
         //   'name' => $request->name,
           // 'stock' => $request->stock,
       //     'precio' => $request->precio,
        //    'description' => $request->description,
         //   'provider_id' => $request->provider_id,
        //    'photo' => $request->photo,

        

        // ]);
        // return redirect()->route('home')->with('success','El Producto se creo con exito');
    }

    public function edit(Product $product)
    {
        $providers=Provider::all();
        
        return view('products.edit', compact('product','providers'));

    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'stock' => 'required',
            'precio' => 'required',
            'description' => 'required',
            'provider_id' => 'required',
            
        ]);

        

        $product->update($request->except('photo'));
        return redirect()->route('product.index')->with('success', 'El Producto se actualizo con exito');

    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success', 'El usuario se elimino con exito');
    }
}
