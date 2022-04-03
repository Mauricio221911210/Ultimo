@extends('layout.index')

@section('content')
 
   <div class="overflow-auto">
    <h1 class="text-center">Lista de Productos</h1>
   
    <div class="d-flex flex-row-reverse my-3">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createProduct">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-plus-fill"
                viewBox="0 0 16 16">
                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                <path fill-rule="evenodd"
                    d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
            </svg>
        </button>
        @include('products.partials.form')
    </div>
    <div>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>

                    <th>Precio</th>
                    <th> Existencias </th>
                    <th>Detalle</th>
                    <th>Proveedor</th>
                    <th>Foto</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody class="">
               
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->precio }}</td>
                        <td> {{ $product->stock}}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->provider->name }}</td>
                        
                       <td class="col-lg-4 col-xl-3 col-4 col-md-2" > 
                        @if($product->photo)
                        <img src="{{Storage::url($product->photo)}}"  class="w-25  border-rounded">
                        @else
                        <img src="{{ asset('img/product/product.png') }}" alt="product-image" class="w-25  border-rounded" >
                        @endif
                        
                     </td>
                        <td>

                            <a href="{{ route('product.edit', $product) }}" class="btn btn-info" title="Editar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-clipboard2-plus-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>
                            </a>
                        </td>
                        <td>
                            
                                <form action="{{ route('product.destroy', $product) }}" method="post" title="Eliminar"
                                    class="product-delete">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                            <path fill-rule="evenodd"
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                        </svg></button>
                                </form>
                           
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No hay Productos  en existencia</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

