<table>
    <thead>
    <tr>
        <th>Id</th>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Stock</th>
        <th>Precio</th>
        <th>Descripcion</th>
        <th>Proveedor</th>
    </tr>
    </thead>
    <tbody>
        @forelse ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->code  }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->precio }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->provider->name }}</td>
        </tr>
        @empty

        @endforelse
    </tbody>
</table>