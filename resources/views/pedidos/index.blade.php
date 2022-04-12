
@extends('layout.index')

@section('content')
    <div class="container my-5">
        <h2 class="text-center my-5">Mi Compras</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Precio</th>
                    {{--<th scope="col">cantidad</th>--}}
                    <th scope="col"> Fecha</th>
               
                    
                </tr>
            </thead>
            <tbody>
                
            @foreach($pedidos as $pedido)
            <tr>
            <td>{{$pedido->id}}</td>
            <td>{{$pedido->total}}</td>
            <td>{{$pedido->created_at}}</td>
          
        </tr>
          <p>{{ $pedido->total }}</p> 
            
            @foreach (json_decode($pedido->products) as $item)
                {{json_encode($item)}}
            @endforeach
            

            
            @endforeach

            
         

            </tbody>
        </table>

    </div>
@endsection
