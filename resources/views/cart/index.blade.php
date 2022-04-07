@extends('layout.index')

@section('content')
@php
    $total = 0;
@endphp
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
                        <td>${{ $item->total }}</td>
                        <td>
                            <form action="{{ route('cart.delete', $item->product) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" title="Eliminar">x</button>
                            </form>
                        </td>
                    </tr>
                    @php
                        $total += ($item->quantity * $item->total);
                    @endphp
                @endforeach
            </tbody>
        </table>

        <div class="row">
            @if ($cart->count() > 0)
            <div class="col-sm-10">
                <p class="text-end mt-3"><span class="fw-bold fs-5">Total: </span>${{ $total }}</p>
            </div>
            <div class="col-sm-2">
                <form action="{{ route('pedidos.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="products" value="{{ $cart }}">
                    <input type="hidden" name="total" value="{{ $total }}">
                    <button type="submit" class="btn btn-warning">
                        Finalizar compra
                    </button>
                </form>
            </div>
            @endif
        </div>

        <div class="row g-3">
        </div>
    </div>
@endsection
