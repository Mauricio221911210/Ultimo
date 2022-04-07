@foreach($pedidos as $pedido)
<p>{{ $pedido->id }}</p>
<p>{{ $pedido->total  }}</p>
@endforeach