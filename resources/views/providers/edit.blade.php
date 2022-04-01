@extends('layout.index')

@section('content')
    <h2 class="text-center">Editar Proveedor</h2>
    <hr>
    
    <section class="container-fluid">
        <form action="{{route('provider.update', $provider)}}" method="post">
            @csrf
            @method('put')
            <div class="form-group mt-3">
                <label class="font-weight-bold">Nombre del Proveedor</label>
                <input type="text" class="form-control" placeholder="Nombre" name="name" value="{{ $provider->name }}">
            </div>
            <div class="form-group mt-3">
                <label class="font-weight-bold">Nombre del Encargado </label>
                <input type="text" class="form-control" placeholder="Contacto" name="contact"
                    value="{{ $provider->contact }}">
            </div>
            <div class="form-group mt-3">
                <label class="font-weight-bold">Telefono</label>
                <input type="text" class="form-control" placeholder="Telefono" name="phone" value="{{ $provider->phone }}">
            </div>
            <div class="form-group mt-3">
                <label class="font-weight-bold">Direccion </label>
                <input type="text" class="form-control" placeholder="Direccion " name="address"
                    value="{{ $provider->address }}">
            </div>
            

            <div class="form-group mt-3">
                <button class="btn btn-primary w-100">Actualizar</button>
            </div>
        </form>
    </section>


@endsection
