@section('style')
<style>
    .wholesale-price-show {
        display: none;
    }
</style>
@endsection


<div class="modal fade" id="createProduct" tabindex="-1" aria-labelledby="createUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createUserLabel">Crear Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data" action="/file-upload" class="dropzone">
                    @csrf
                    <div class="form-group has-success">
                        <label for="form-label mt-4" for="inputValid">Codigo</label>
                        <input required type="text" class="form-control" name="code" value="{{ old('code') }}">
                    </div>
                    <div class="form-group has-success">
                        <label for="form-label mt-4" for="inputValid">Nombre</label>
                        <input required type="text" class="form-control" name="name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group has-success">
                        <label for="form-label mt-4" for="inputValid">Stock</label>
                        <input required type="text" class="form-control" name="stock" value="{{ old('stock') }}">
                    </div>
                    <div class="form-group">
                        <label>Precio</label>
                        <input required type="text" class="form-control" name="precio" value="{{ old('precio') }}">
                    </div>
                    <div class="form-group">
                        <label>Detalle</label>
                        <input required type="text" class="form-control" name="description" value="{{ old('description') }}">
                    </div>

                    <div class="form-group">
                        <label>Proveedor</label>
                        <select required class="form-control" name="provider_id" value="{{ old('provider_id') }}">
                            <option value="">--Selecciona--</option>
                            @foreach ($providers as $provider)
                            <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="file" name="photo" id="image">
                    </div>

                    </div>
                    <div class="form-group mt-5">
                        <button class="btn btn-primary w-100">
                            Crear Producto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
