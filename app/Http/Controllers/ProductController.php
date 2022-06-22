<?php

namespace App\Http\Controllers;

use App\Exports\PostsExport;
use App\Exports\UsersExport;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Provider;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(15);
        $providers = Provider::all();
        return view('products.index', compact('providers','products'));
    }

    //public function export(){
      //  return Excel::download(new PostsExport, 'posts.xlsx');
    //}

    public function exportExcel(){
        return Excel::download(new UsersExport, 'user-list.xlsx');
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

        return redirect()->route('home')->with('success','El Producto se creo con exito');
    }

    public function edit(Product $product)
    {
        $providers=Provider::all();

        return view('products.edit', compact('product','providers'));

    }

    public function update(Request $request, Product $product)
    {
    
        // $request->validate([
        //     'code' => 'required',
        //     'name' => 'required',
        //     'stock' => 'required',
        //     'precio' => 'required',
        //     'description' => 'required',
        //     'provider_id' => 'required',
        // ]); 

        if ($request->hasFile('photo')) {
            Storage::disk('public')->delete($product->photo);
            $product->photo = $request->file('photo')->store('products', 'public');
        }


        $product->update($request->except('photo'));

        
        return redirect()->route('product.index')->with('success', 'El Producto se actualizo con exito');

    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success', 'El usuario se elimino con exito');
    }
}
