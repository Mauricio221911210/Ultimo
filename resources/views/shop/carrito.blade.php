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
                        {{ $item->id }}
                        {{ $item->nombre }}
                    </td>
                    <td>
                        {{ $item->precio }}
                    </td>
                    <td>
                        {{ $item->cantidad }}
                    </td>
                    <td>
                        {{ $item->total }}
                    </td>
                    <td>
                        <form action="{{ route('eliminar',['id' => $item->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="quitar" class="btn btn-link btn-sm">
                        </form>
                    </td>
                </tr>
                @endforEach
            </tbody>
        </table>

        <div class="row g-3">
            <div class="col-sm-10">
                <input hidden type="text" name="subtotal" value="{{ $total }}">
                <p class="text-end mt-3">${{ $total }}</p>
            </div>

            <div class="col-sm">
                <input type="submit" value="Finalizar pedido">
            </div>
        </div>
    </form>


</div>

@endsection
