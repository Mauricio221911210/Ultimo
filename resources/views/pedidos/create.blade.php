@extends('layout.index')

@section('content')

    <div class="container">
      
        <div class="mt-2">
            <p>Datos de cliente</p>
            <div class="d-flex justify-content-between">
                <div>
                    <p>Buscar productos</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProduct">
                        Buscar producto
                    </button>
                </div>
                @if (!$temporary->isEmpty())
                    <div>
                        <form action="{{ route('order.new') }}" method="POST">
                            @csrf
                            
                            <p>
                                Procesar venta
                            </p>
                            <button class="btn btn-success">
                                Procesar venta
                            </button>
                        </form>
                    </div>
                @endif
            </div>
            @include('sales.partials.form')
        </div>
        <div class="overflow-auto">
            <table class="table mt-5">
                <thead class="table-dark">
                    <tr>
                        <th>Código</th>
                        <th>Descripcion</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody class="">
                    @forelse ($temporary as $temporary)
                        <tr>
                            <td>{{ $temporary->product->code }}</td>
                            <td>{{ $temporary->product->description }}</td>
                            <td>{{ $temporary->quantity }}</td>
                            <td>${{ $temporary->total }}</td>
                            <td>
                                <form action="{{ route('orders.destroy', $temporary) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button>
                                        delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No hay usuarios en existencia</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
