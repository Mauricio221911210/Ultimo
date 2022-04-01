

<div class="modal fade" id="createProvider" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createProviderLabel">Crear Proveedor </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('provider.store') }}" method="post">
                    @csrf
                    <div class="form-group has-success">
                        <label for="form-label mt-4" for="inputValid">Nombre de proveedor </label>
                        <input required type="text" class="form-control" name="name" value="{{ old('name') }}">
                        {!! $errors->first('name', '<small>:message</small>') !!}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre del Encargado</label>
                        <input required type="text" class="form-control" name="contact" value="{{ old('contact') }}">
                        {!! $errors->first('lastname', '<small>:message</small>') !!}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Telefono</label>
                        <input required type="text" class="form-control" name=" phone" value="{{ old(' phone') }}">
                        {!! $errors->first('lastname', '<small>:message</small>') !!}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Dirección </label>
                        <input required type="text" class="form-control" name="address" value="{{ old('address') }}">
                        {!! $errors->first('username', '<small>:message</small>') !!}
                    </div>

                   

                    <div class="form-group">
                        <button class="btn btn-primary w-100">
                            Crear Proveedor
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
