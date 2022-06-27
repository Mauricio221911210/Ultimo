@extends('layout.index')

@section('content')
    @php
    // SDK de Mercado Pago
    require base_path('vendor/autoload.php');
    // Agrega credenciales
    MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

    // Crea un objeto de preferencia
    $preference = new MercadoPago\Preference();

    $shipments = new MercadoPago\Shipments();

    // **************** Gastos de envío **********************
    // $shipments->cost = 150;
    // $shipments->mode = "not_specified";

    // $preference->shipments = $shipments;

    // Crea un ítem en la preferencia

    foreach ($cart as $c) {
        $item = new MercadoPago\Item();

        $item->title = $c->product->name;
        $item->quantity = $c->quantity;
        $item->unit_price = $c->total;
        $item->picture_url = Storage::url($c->product->photo);

        $products[] = $item;
    }

    $preference->back_urls = [
        'success' => Request::root(),
        'failure' => Request::root() . '/my-cart',
        'pending' => Request::root(),
    ];

    $preference->auto_return = 'approved';

    $preference->items = $products;
    $preference->save();

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
                @endforeach
            </tbody>
        </table>

        <div class="row">
            {{-- @if ($cart->count() > 0)
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
            @endif --}}
            <div class="cho-container"></div>
        </div>

        <div class="row g-3">
        </div>
    </div>

    <script src="https://sdk.mercadopago.com/js/v2"></script>


    <script>
        // Agrega credenciales de SDK
        const mp = new MercadoPago("{{ config('services.mercadopago.key') }}", {
            locale: "es-AR",
        });

        // Inicializa el checkout
        mp.checkout({
            preference: {
                id: '{{ $preference->id }}',
            },
            render: {
                container: ".cho-container", // Indica el nombre de la clase donde se mostrará el botón de pago
                label: "Pagar", // Cambia el texto del botón de pago (opcional)
            },
        });
    </script>
@endsection
