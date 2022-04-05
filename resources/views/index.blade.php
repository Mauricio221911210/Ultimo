@extends('layout.index')

@section('content')




<div class="">
    <div class="row mt-5">
        <!-- Elementos generados a partir del JSON -->
        <main id="items" class="col-sm-8 row"></main>
        <!-- Carrito -->
        <aside class="col-sm-4">
            <h2>Carrito</h2>
            <!-- Elementos del carrito -->
            <ul id="carrito" class="list-group"></ul>
            <hr>
            <!-- Precio total -->
            <p class="text-right">Total: <span id="total"></span> pesos</p>
            <button id="boton-vaciar" class="btn btn-danger w-100">Vaciar Carrito</button>
        </aside>
    </div>
</div>

@section('js')
<script src="{{asset('js/carrito.js')}}"></script>
@endsection

@endsection
@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function(event) {
        let checkbox = document.getElementById('wholesale');
        let wholesale = document.getElementById('wholesale_price');
        let quantity = document.getElementById('wholesale_quantity');
        let show = document.querySelector('.isChecked');
        const isChecked = () => {
            let checked = checkbox.checked;
            if (checked) {
                wholesale.removeAttribute('hidden');
                quantity.removeAttribute('hidden');
                checkbox.value = "1";
                show.classList.remove('wholesale-price-show');
            } else {
                wholesale.setAttribute('hidden', "");
                wholesale.setAttribute("value", "0");
                quantity.setAttribute('hidden', "");
                quantity.setAttribute("value", "0");
                checkbox.value = "0";
                show.classList.add('wholesale-price-show');
            }
        }
        checkbox.addEventListener("change", isChecked, false);
    })
</script>
@endsection