@extends("layouts.app")


@section("status")
{{$status}}

@endsection

@section("content")


<div class="container">
  @if($errors->any())

  <div class="alert alert-danger" role="alert">
    {{$errors->first()}}
  </div>
      
 @endif
    <div class="row">
    @forEach($products as $product)
      <div class="col mt-5">
        <div class="card" style="width: 18rem;">
            <img src="{{asset('archivos/'.$product->photo)}}" class="card-img-top" alt="..."  heigth="80px">
            <div class="card-body">
              <h5 class="card-title">{{$producto->name}}</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            
              
              <form method="POST" action="{{route('carrito')}}">
                {{csrf_field()}}
                <input hidden type="text" name="producto_id" value="{{$product->id}}" class="producto_id">
                <input hidden type="text" name="nombre" value="{{$product->name}}">
                <input hidden type="text" name="precio" value="{{$product->precio}}" class="precio{{$product->id}}">
                <label for="cantidad">Cantidad:</label>
                <input type="number" name="cantidad" class="form-control cantidad" id="{{$product->id}}" autocomplete="off">
                
                <input hidden type="text" name="total"  class="total{{$product->id}}">
                <input type="submit" class="btn btn-primary mt-3" value="Agregar">


              </form>
              
            </div>
          </div>
      </div>

      @endforEach

    </div>
  </div>


  
    
    
        {{-- @forEach($productos as $producto)
    
        @endforEach --}}
     
   
          
      

  
 
@endsection

@section("script")

<script>

  $(document).ready(function(){

   

    $(".cantidad").change(function(){
                let productoId=$(this).attr("id");
                var precio=Number($(".precio"+productoId).val());
                var total=$(this).val()*precio;
                
                $(".total"+productoId).val(total);

            
        });






  });

  
</script>

@endsection