@extends('layout.index')

@section('content')
    <div class="container my-5">
        <h2 class="text-center my-5">Mi carrito</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">nombre</th>
                    <th scope="col">cantidad</th>
                    <th scope="col">precio</th>
                    <th colspan="2">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $key => $item)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->total }}</td>
                        <td>
                            <form action="{{ route('cart.delete', $item->product) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" title="Eliminar">x</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex flex-row-reverse">
            @if ($cart->count() > 0)
                <button class="btn btn-warning">
                    Finalizar compra
                </button>
            @endif
        </div>
    </div>
@endsection
