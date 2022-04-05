@extends("layouts.app")


@section("status")
{{$status}}

@endsection

@section("content")
<div class="container-sm">
   <form action="{{route("detallepedido")}}" method="GET">
    {{csrf_field()}} 
    <table class="table  table-light table-borderless">
        <thead>
            <tr>
              {{-- <th scope="col">#</th> --}}
              <th scope="col">Producto</th>
              <th scope="col">Precio</th>
              <th scope="col">Cantidad</th>
              <th scope="col">Total</th>
              <th></th>
            </tr>
          </thead>
          <tbody>

            
              @foreach($carrito as $item)

            <tr>
              
              <td>
                  <input hidden type="text" name="id" value="{{$item->id}}">
                  <input type="text" name="nombre" readonly value="{{$item->nombre}}" style="border:0;outline:none">
                  
                </td>
              <td>
                <input type="text" name="precio" readonly value="{{$item->precio}}" style="border:0;outline:none">
                
            </td>
              <td>
                <input readonly type="number" name="cantidad" class="form-control" value="{{$item->cantidad}}" min="1" style="border:0;outline:none">
    
              </td>
            <td>
                
                <input type="text" name="total" readonly value="{{$item->total}}" style="border:0;outline:none">
            </td>
            <td>
                
                <form action="{{ route('eliminar',['id' => $item->id]) }}" method="POST">
                    {{csrf_field()}} 
                    {{method_field("DELETE")}}
                    <input type="submit" value="quitar" class="btn btn-link btn-sm">
                </form>
            </td>
            </tr>
            
            @endforEach
          </tbody>
          
          <tfoot>
              <td></td>
              <td></td>
              <td><p class="text-end mt-3">Subtotal:</p></td>
              <td></td>
              <td>
                  <input hidden type="text" name="subtotal" value="{{$sumtotal}}">
                  <p class="text-end mt-3">${{$sumtotal}}</p>
                </td>
          </tfoot>   
      </table>
      
        
        

      
      <div class="row g-3">
        <div class="col-sm-10">
          
        </div>
        
        <div class="col-sm">
            <input type="submit" value="Finalizar pedido">
        </div>
      </div>
    </form>
    
      
</div>

@endsection


