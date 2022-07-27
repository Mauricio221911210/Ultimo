<table>
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Apellido</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
        @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->lastname }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
                @empty

                @endforelse
    </tbody>
</table>