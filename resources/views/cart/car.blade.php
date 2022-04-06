@extends('layout.index')

@section('content')
    <div class="container my-5">
        <h2 class="text-center my-5">Mi Compras</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">nombre</th>
                    <th scope="col">cantidad</th>
                    <th scope="col">precio</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $key => $item)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
