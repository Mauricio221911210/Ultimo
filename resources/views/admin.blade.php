@extends('layout.index')
@section('css')
    <style>
        #cardtitle {
            align-items: center;
            text-align: center;

        }
        #cart {
           margin-bottom: 30px;
        }
        ,
        #bodycart {
            align-items: center;
            text-align: center;
        }

        #img {
            height: 50px;
        }
        #tablerow {
            height: 60px;
        }
        #text{
            justify-content: center;
            align-self: center;
        }
    </style>
@endsection

@section('content')
    <div class="container my-5">
        <h2 class="text-center my-5">Ventas</h2>
        <div class="row">
            @foreach ($sales as $sale)
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card" >
                            <h4 id='cardtitle'>Usuario {{ $sale->user->name }}</h4>
                            <div class="card-body">
                                <h5 class="card-title">Productos</h5>
                                
                                <table class="table" id=''>
                                    <thead>
                                        <tr>
                                          <th scope="col">Imagen</th>
                                          <th scope="col">Producto</th>
                                          <th scope="col">Precio</th>
                                          <th scope="col">Cantidad</th>
                                        </tr>
                                      </thead>
                                   @foreach ($sale->carts as $item) 
                                    <tbody>
                                      <tr id='tablerow'>
                                        <td id='text'><img src="{{ Storage::url(json_decode($item->product)->photo) }}"  id='img'
                                            alt="..."></td>
                                        <td id='text'>{{ json_decode($item->product)->name }}</td>
                                        <td id='text'>{{ json_decode($item->product)->precio }}</td>
                                        <td id='text'>{{ json_decode($item)->quantity }}</td>
                                        
                                      </tr>
                                    </tbody>
                                    @endforeach
                                    {{--<tr >
                                        <td id='text'>     </td>
                                        <td id='text'>Total</td>
                                        <td id='text'>{{$sale->final_price}}</td>
                                        <td id='text'>     </td>
                                      </tr>--}}
                                  </table>
                            </div>

                    </div>
                </div>
                @endforeach
        </div>
    </div>
    </div>
@endsection
