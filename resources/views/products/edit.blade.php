@extends('layout.index')
@section('style')
<style>
    .wholesale-price-show {
        display: none;
    }
</style>
@endsection
@section('content')
<h2 class="text-center">Editar Producto</h2>
<hr>

<section class="container-fluid">
    <form action="{{ route('product.update', $product) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group has-success">
            <label for="form-label mt-4" for="inputValid">Nombre</label>
            <input required type="text" class="form-control" name="name" value="{{ $product->name }}">
        </div>
        <div class="form-group">
            <label>Stock</label>
            <input required type="text" class="form-control" name="stock" value="{{ $product->stock }}">
        </div>
        <div class="form-group">
            <label>Precio</label>
            <input required type="text" class="form-control" name="precio" value="{{ $product->precio }}">
        </div>
        <div class="form-group">
            <label>Descripción</label>
            <input required type="text" class="form-control" name="description" value="{{ $product->description }}">
        </div>

        <div class="form-group">
            <label>Proveedor</label>
            <select required class="form-control" name="provider_id" value="{{ $product->provider_id }}">
                <option value="">--Selecciona--</option>
                @foreach ($providers as $provider)
                <option value="{{ $provider->id }}" {{ $product->provider_id = $provider->id ? 'selected' : '' }}>{{ $provider->name }}</option>
                @endforeach
            </select>
        </div>


        <div>
            <p>Imagen</p>
            <img src=" {{ Storage::url($product->photo) }}" width="150px">
        </div>
        <div class="custom-file mt-5">
            <input type="file" class="form-control-file" accept="image/*" name="photo">
        </div>
        <div class="form-group mt-5">
            <input type="submit" class="btn btn-primary w-100 mb-5" value="Actualizar Producto">
        </div>
    </form>
</section>
@endsection
