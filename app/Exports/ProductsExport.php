<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

//**class ProductsExport implements FromCollection
//{
    /**
    * @return \Illuminate\Support\Collection
    */
    //public function collection()
    //{
    //    return Product::all();
  //  }
//}




class ProductsExport implements FromView
{
    public function view(): View
    {
        return view('products.excel', [
            'products' => Product::all()
        ]);
    }
}
