

<div class="modal fade" id="createProvider" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createProviderLabel">Crear Proveedor </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('provider.store') }}" method="post" id="formulario">
                    @csrf
                    <div class="form-group has-success">
                        <label for="form-label mt-4" for="inputValid">Nombre de proveedor </label>
                        <input  type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                        {!! $errors->first('name', '<small>:message</small>') !!}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre del Encargado</label>
                        <input  type="text" class="form-control" name="contact" id="contact" value="{{ old('contact') }}">
                        {!! $errors->first('lastname', '<small>:message</small>') !!}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Telefono</label>
                        <input  type="text" class="form-control" name=" phone" id="phone" value="{{ old(' phone') }}">
                        {!! $errors->first('lastname', '<small>:message</small>') !!}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Dirección </label>
                        <input  type="text" class="form-control" name="address" id="address" value="{{ old('address') }}">
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



<script>
     document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("formulario").addEventListener('submit', validarFormulario);
    });

    function validarFormulario(evento) {
        evento.preventDefault();
        var name = document.getElementById('name').value;
        if (name.length == 0) {
            alert('No has escrito un nombre valido');
            return;
        }
        var contact = document.getElementById('contact').value;
        if (contact.length == 0) {
            alert('El nombre del Contacto no es valido');
            return;
        }
        var phone = document.getElementById('phone').value;
        if (phone.length == 0) {
            alert('No has escrito un numero de Telefono valido');
            return;
        }
        var address = document.getElementById('address').value;
        if (address.length == 0) {
            alert('No has escrito una Direccion Valida ');
            return;
        }
        this.submit();
    }
</script>