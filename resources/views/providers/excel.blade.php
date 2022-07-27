<table>
    <thead>
    <tr>
        <th>Id</th>
        <th>Nombre del Proveedor</th>
        <th>Nombre del Contacto </th>
        <th>Telefono</th>
        <th>Direccion</th>
    </tr>
    </thead>
    <tbody>
        @forelse ($providers as $provider)
        <tr>
            <td>{{ $provider->id }}</td>
            <td>{{ $provider->name }}</td>
            <td>{{ $provider->contact }}</td>
            <td>{{ $provider->phone }}</td>
            <td>{{ $provider->address }}</td>
        </tr>
        @empty

        @endforelse
    </tbody>
</table>