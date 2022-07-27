<?php

namespace App\Exports;

use App\Models\Provider;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

//class ProvidersExport implements FromCollection
//{
    /**
    * @return \Illuminate\Support\Collection
    */
  //  public function collection()
    //{
      //  return Provider::all();
    //}
//}


class ProvidersExport implements FromView
{
    public function view(): View
    {
        return view('providers.excel', [
            'providers' => Provider::all()
        ]);
    }
}
