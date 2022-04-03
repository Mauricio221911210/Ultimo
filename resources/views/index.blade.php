@extends('layout.index')

@section('content')




<div class="col-12 p-3 border me-3 overflow-auto">
    <div class="row products-container">
        @forelse ($products as $product)
        <div class="col-lg-12 border-success py-1 px-2 mb-1 border border-secondary">
            <div class="row justify-content-between align-items-center">

                <div class="col-lg-2 col-xl-1 col-2 col-md-2">
                    @if($product->photo)
                    <img src="{{ $product->get_photo }}"  class="w-100 rounded-circle">
                    @else
                    <img src="{{ asset('img/product/product.png') }}" alt="product-image" class="w-100 rounded-circle">
                    @endif
                </div>
                <div class="col-lg-12 col-xl-8 col-12 text-center">
                    <div class="row">
                        <div class="col">
                            <p class="fw-bold">
                                {{ $product->code }}
                            </p>
                        </div>
                        <div class="col">
                            <div class="row">

                                <div class="col-lg-4">
                                    <p class="text-success">
                                        <i class="bi bi-shop"></i>
                                        ${{ $product->precio }}
                                    </p>
                                </div>
                                <div>
                                    <p class="fw-bold">
                                        {{ $product->description }}
                                    </p>
                                </div>
                                @if($product->wholesale)
                                <div class="col-lg-4">
                                    <p class="fw-bold m-0">Mayoreo</p>
                                    <p class="text-center m-0">
                                        ${{ $product->wholesale_precio }}/{{ $product->wholesale_quantity }}
                                    </p>
                                </div>
                                @else

                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="text-secondary">
                                {{ $product->get_description }}
                                <a data-bs-toggle="offcanvas" href="#detailProduct{{$product->id}}" role="button" aria-controls="offcanvasExample">
                                    [ver más]
                                </a>
                            </p>
                            <p class="">
                                <button class="btn btn-success " >Hacer Pedido</button>

                            </p>
                            <div class="offcanvas offcanvas-end bg-light" tabindex="-1" id="detailProduct{{$product->id}}" aria-labelledby="offcanvasExampleLabel">
                                <div class="offcanvas-header w-100 d-block">
                                    <h5 class="fs-6 fw-bold text-center" id="offcanvasExampleLabel">
                                        <span class="fst-italic d-block text-secondary mb-2">
                                           $ {{ $product->precio }} Precio del Producto
                                        </span>

                                        <span class="fst-italic d-block text-secondary mb-2">
                                            {{ $product->stock }} Disponible(s)

                                        </span>
                                        <span class="fst-italic d-block text-secondary mb-2">
                                            {{ $product->code}} Codigo del Producto
                                        </span>
                                        <span class="fst-italic d-block text-secondary mb-2">
                                            <button class="btn btn-success">Agregar</button>
                                        </span>


                                    </h5>
                                </div>
                                <div class="offcanvas-body text-center border-2 border-dark border-top">
                                    <div class="row">
                                        <div class="col-8 m-auto">
                                            @if($product->photo)
                                            <img src="{{ Storage::url($product->photo) }}"  class="w-25 border-rounded">
                                            @else
                                            <img src="{{ asset('img/product/product.png') }}" alt="product-image" class="w-25 border-rounded">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8 m-auto">
                                            <p class="fw-bold">Descripcion</p>
                                            <p>{{ $product->description }}</p>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <p class="fst-italic">
                                {{ $product->stock }} Disponible(s)
                            </p>
                        </div>
                    </div>
                </div>



            </div>
        </div>
        @empty
        <p>no hay productos</p>
        @endforelse
    </div>
</div>
  </div>
   </div>

 </div>
 </div>

 <script>
     document.addEventListener('DOMContentLoaded', () => {
         //variables

         const baseDeDatos = [
             {
            id: 1,
                  nombre: 'Patata',
                  precio: 1,
                  imagen: 'product.png'
                },
                {
                    id: 2,
                  nombre: 'Patata',
                  precio: 10,
                  imagen: 'product.png'
                }
         ];

         let carrito = [];
         const divisa = '$';
         const DOMitems = document.querySelector('#items');
         const DOMcarrito = document.querySelector('#carrito');
         const DOMtotal = document.querySelector('#total');
         const DOMbotonVaciar = document.querySelector('#boton-vaciar');


         //Funciones

         function renderizarProductos() {
             baseDeDatos.forEach((info) => {

                //Estructura
                const miNodo = document.createElement('div');
                miNodo.classList.add('card', 'col-sm-4');

                // Body
                const miNodoCardBody = document.createElement('div');
                miNodoCardBody.classList.add('card-body');
                // Titulo
                const miNodoTitle = document.createElement('h5');
                miNodoTitle.classList.add('card-title');
                miNodoTitle.textContent = info.nombre;
                // Imagen
                const miNodoImagen = document.createElement('img');
                miNodoImagen.classList.add('img-fluid');
                miNodoImagen.setAttribute('src', info.imagen);
                // Precio
                const miNodoPrecio = document.createElement('p');
                miNodoPrecio.classList.add('card-text');
                miNodoPrecio.textContent = `${info.precio}${divisa}`;
                // Boton
                const miNodoBoton = document.createElement('button');
                miNodoBoton.classList.add('btn'm 'btn-primary');
                miNodoBoton.textContent = '+';
                miNodoBoton.setAttribute('marcador', info.id);
                miNodoBoton.addEventListener('click', anyadirProductoAlCarrito);
                // Insertamos
                miNodoCardBody.appendChild(miNodoImagen);
                miNodoCardBody.appendChild(miNodoTitle);
                miNodoCardBody.appendChild(miNodoPrecio);
                miNodoCardBody.appendChild(miNodoBoton);
                miNodo.appendChild(miNodoCardBody);
                DOMitems.appendChild(miNodo);


             });
         }

         // Evento para añadir un producto  al carrito de la compra

         function anyadirProductoAlCarrito(Evento) {
             // Ayadimos el Nodo a nuestro carrito
             carrito.push(evento.target.getAttribute('marcador'))
             // Actualizamos el carrito
             renderizarCarrito();
         }
         // Dibujo todos los productos guardados en el carrito
         function renderizarCarrito() {
             // Vaciamos todo el html
             DOMcarrito.textContent = '';
             //Quitamos los duplicados
             const carritoSinDuplicados = [...new set(carrito)];
             // Generamos los Nodos a partir de carrito
             carritoSinDuplicados.forEach((item) => {
                 // Obtenemos el item que necesitamos de la variable base de datos
                 const miItem = baseDeDatos.filter((itemBaseDatos) => {
                     // ¿Coincide las id? Solo puede existir un caso
                     return itemBaseDatos.id === parseInt(item);

                 });
                 // Cuenta el número de veces que se repite el producto
                 const nunmeroUnidadesItem = carrito.reduce((total, itemId) => {
                    // ¿Coincide las id? Incrementando el contador, en caso contrario no mantengo
                    return itemId === item ? total += 1 : total;
                 }, 0);
                 // Creamos el nodo del item del carrito
                 const miNodo = document.createElement('li');
                 miNodo.classList.add('list-group-item', 'text-right', 'mx-2');
                 miNodo.textContent = `${nunmeroUnidadesItem} x ${miItem[0].nombre} - ${miItem[0].precio}${divisa}`;
                 // Boton de borrar

                 const miBoton = document.createElement('button');
                 miBoton.classList.add('btn', 'btn-danger', 'mx-5');
                 miBoton.textContent = 'X';
                 miBoton.style.marginLeft = '1rem';
                 miBoton.dataset.item = item;
                 miBoton.addEventListener('click', borrarItemCarrito);
                 // Mezclamos nodos
                 miNodo.appendChild(miBoton);
                 DOMcarrito.appendChild(miNodo);
             });
             // Renderizamos el precio total en el HTML
             DOMtotal.textContent = calcularTotal();
            }
             //Evento para borrar un elemento del carrito

             function borrarItemCarrito(evento) {
                 // Obtenemos el producto ID que hay en el boton pulsado
                 const id = evento.target.dataset.item;
                 // Borramos todos los productos
                 carrito = carrito.filter((carritoId) => {
                     return carritoId !== id;
                 });
                 // volvemos a renderizar
                 renderizarCarrito();
             }

             //Calcula el precio total teniendo en cuenta los productos repetidos

             function calcularTotal() {
                 // Recorremos el array del carrito
                 return carrito.reduce((total, item) => {
                     // De cada elemento obtenemos su precio
                     const miItem = baseDeDatos.filter((itemBaseDatos) => {
                         return itemBaseDatos.id === parseInt(item);
                     });
                     // Los sumas al total
                     return total + miItem[0].precio;
                 }, 0).toFixed(2);
             }

             //Varia el carrito  y vuelve a dibujarlo

             function vaciarCarrito() {
                 //Limpios los productos guardados
                 carrito = [];
                 // Renderizamos los cambios
                 renderizarCarrito();
             }

             //Eventos
             DOMbotonVaciar.addEventListener('click', vaciarCarrito);
             // Inicio
             renderizarProductos();
             renderizarCarrito();




       });


     </script>


<div class="container">
         <div class="row">
             <!-- Elementos generados a partir  del Json -->
             <main id="items" class="col-sm-8 row"></main>
             <!-- Carrito  -->
             <aside class="col-sm-4">
                 <h2> Carrito</h2>
                 <!-- Elemetnos del Carrito  -->
                 <ul id="carrito" class="lis-group"></ul>
                 <hr>
                 <!-- Precio total  -->
                 <p class="text-rigth">TOTAL: <span id="total"></span> $</p>
                 <button id="boton-vaciar" class="btn btn-danger">Vaciar</button>
             </aside>
         </div>

         </div>

     </div>

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


