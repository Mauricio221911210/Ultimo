document.addEventListener('DOMContentLoaded', (event) => {

    const dataInLocalStorage = () => {
        const getCart = localStorage.getItem('cart');

        const cart = JSON.parse(getCart);

        if (!cart) {
            localStorage.setItem('cart', '[]');
        }
    }

    dataInLocalStorage();

    const d = document;

    const divisa = '$';
    const DOMitems = d.querySelector('#items');
    const DOMcarrito = d.querySelector('#carrito');
    const DOMtotal = d.querySelector('#total');
    const DOMbotonVaciar = d.querySelector('#boton-vaciar');
    const DOMbtnSave = d.querySelector('#save-sale');

    const fetchData = (endpoint, data, method = 'GET') => {

        const url = endpoint;

        if (method === 'GET') {
            return fetch(url);
        } else {
            return fetch(url, {
                method,
                headers: { 'Content-type': 'application/json' },
                body: JSON.stringify(data)
            });
        }

    };


    const getProducts = async () => {

        const res = await fetchData(`/getProducts`);
        const data = await res.json();
        return data;
    }


    const añadirACarrito = (product) => {

        let cart = JSON.parse(localStorage.getItem('cart'));

        const productInCart = cart.find(cart => cart.product.id === product.id);

        if (!productInCart) {
            cart = [...cart, { product, quantity: 1 }]
            localStorage.setItem('cart', JSON.stringify(cart));

        }

        if (productInCart) {
            cart = cart.map((item) =>
                item.product.id === product.id
                    ? { ...item, quantity: item.quantity + 1 }
                    : { ...item }
            )
            localStorage.setItem('cart', JSON.stringify(cart));
        }
        renderizarCarrito();
    }


    const calcularTotal = () => {
        let total = 0;
        let cart = JSON.parse(localStorage.getItem('cart'));

        if (cart.length > 0) {
            total = cart.map(cart => cart.product.precio * cart.quantity);
            return total.reduce((a, b) => a + b, 0)
        }
        return total;
    }

    const borrarItemCarrito = (event) => {


        const product = event.target.getAttribute('data-item');

        let cart = JSON.parse(localStorage.getItem('cart'));

        const deleteProduct = cart.filter((item) => item.product.id != product);
        cart = [...deleteProduct]

        localStorage.setItem('cart', JSON.stringify(cart));

        renderizarCarrito();
    }

    function renderizarCarrito() {
        // Vaciamos todo el html
        DOMcarrito.textContent = '';
        // Quitamos los duplicados
        const carritoSinDuplicados = JSON.parse(localStorage.getItem('cart')) || []
        // Generamos los Nodos a partir de carrito
        carritoSinDuplicados.forEach((item) => {
            // Obtenemos el item que necesitamos de la variable base de datos

            const miNodo = document.createElement('li');
            miNodo.classList.add('list-group-item', 'text-right', 'mx-2');
            miNodo.textContent = `${item.quantity} x ${item.product.name} = ${item.quantity * item.product.precio}`;
            // Boton de borrar
            const miBoton = document.createElement('button');
            miBoton.classList.add('btn', 'btn-danger', 'mx-5');
            miBoton.textContent = 'X';
            miBoton.style.marginLeft = '1rem';
            miBoton.dataset.item = item.product.id;
            miBoton.addEventListener('click', borrarItemCarrito);
            // Mezclamos nodos
            miNodo.appendChild(miBoton);
            DOMcarrito.appendChild(miNodo);
        });
        // Renderizamos el precio total en el HTML
        DOMtotal.textContent = calcularTotal();
    }

    const renderizarProductos = async () => {
        let products = await getProducts();
        await products.forEach((info) => {
            // Estructura
            const miNodo = document.createElement('div');
            miNodo.classList.add('card', 'col-sm-4', 'mx-2');
            // Body
            const miNodoCardBody = document.createElement('div');
            miNodoCardBody.classList.add('card-body');
            // Titulo
            const miNodoTitle = document.createElement('h5');
            miNodoTitle.classList.add('card-title');
            miNodoTitle.textContent = info.name;
            // Imagen
            const miNodoImagen = document.createElement('img');
            miNodoImagen.classList.add('img-fluid');
            miNodoImagen.setAttribute('src', `http://localhost:8000/storage/${info.photo}`);
            // Precio
            const miNodoPrecio = document.createElement('p');
            miNodoPrecio.classList.add('card-text');
            miNodoPrecio.textContent = `${divisa}${info.precio}`;
            // Boton 
            const miNodoBoton = document.createElement('button');
            miNodoBoton.classList.add('btn', 'btn-primary', 'w-100');
            miNodoBoton.textContent = '+';
            miNodoBoton.setAttribute('marcador', info.id);
            miNodoBoton.addEventListener('click', () => { añadirACarrito(info) });
            // Insertamos
            miNodoCardBody.appendChild(miNodoImagen);
            miNodoCardBody.appendChild(miNodoTitle);
            miNodoCardBody.appendChild(miNodoPrecio);
            miNodoCardBody.appendChild(miNodoBoton);
            miNodo.appendChild(miNodoCardBody);
            DOMitems.appendChild(miNodo);
        });
    }

    const vaciarCarrito = () => {
        localStorage.removeItem('cart');
        localStorage.setItem('cart', '[]');
        renderizarCarrito();
    }

    const saveSale = async () => {
        const cart = localStorage.getItem('cart');
        const data = JSON.stringify(cart)
        const res = await fetchData('/saveSale', data, 'POST');
    }

    // Eventos
    DOMbotonVaciar.addEventListener('click', vaciarCarrito);
    DOMbtnSave.addEventListener('click', saveSale);

    renderizarProductos();
    renderizarCarrito();
}, false);