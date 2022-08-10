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
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data"
                    action="/file-upload" class="dropzone" id="formulario">
                    @csrf
                    <div class="form-group has-success">
                        <label for="form-label mt-4" for="inputValid">Codigo</label>
                        <input type="text" class="form-control" name="code" id="code" value="{{ old('code') }}">
                    </div>
                    <div class="form-group has-success">
                        <label for="form-label mt-4" for="inputValid">Nombre</label>
                        <input  type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group has-success">
                        <label for="form-label mt-4" for="inputValid">Stock</label>
                        <input  type="text" class="form-control" name="stock" id="stock" value="{{ old('stock') }}">
                    </div>
                    <div class="form-group">
                        <label>Precio</label>
                        <input  type="text" class="form-control" name="precio" id="precio" value="{{ old('precio') }}">
                    </div>
                    <div class="form-group">
                        <label>Detalle</label>
                        <input  type="text" class="form-control" name="description" id="description"
                            value="{{ old('description') }}">
                    </div>

                    <div class="form-group">
                        <label>Proveedor</label>
                        <select  class="form-control" name="provider_id" value="{{ old('provider_id') }}">
                            <option value="">--Selecciona--</option>
                            @foreach ($providers as $provider)
                                <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                            @endforeach
                        </select>
                    </div> <br>

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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("formulario").addEventListener('submit', validarFormulario);
    });

    function validarFormulario(evento) {
        evento.preventDefault();
        var code = document.getElementById('code').value;
        if (code.length == 0) {
            alert('No has escrito un codigo valido');
            return;
        }
        var name = document.getElementById('name').value;
        if (name.length == 0) {
            alert('No has escrito un nombre valido');
            return;
        }
        var stock = document.getElementById('stock').value;
        if (stock.length == 0) {
            alert('No has escrito un Stock valido');
            return;
        }
        var precio = document.getElementById('precio').value;
        if (precio.length == 0) {
            alert('No has escrito un Precio valido');
            return;
        }
        var description = document.getElementById('description').value;
        if (description.length == 0) {
            alert('No has escrito una Descripcion Valida ');
            return;
        }
        this.submit();
    }
</script>
