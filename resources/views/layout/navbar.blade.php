<header>
    <nav class="navbar navbar-expand-lg navbar navbar-light bg-ligth" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0 text-center fs-5">
                    <a class="nav-link" href="{{ route('Informacion') }}">¿Quienes Somos?</a>
                    @if (Auth::user()->role_id == 2)
                        <a class="nav-link" href="{{ route('product.index') }}">Productos</a>
                    @endif
                    @if (Auth::user()->role_id == 2)
                        <a class="nav-link" href=""></a>
                    @endif
                    <a class="nav-link" href="{{ route('home') }}"> Home </a>
                    @if (Auth::user()->role_id == 2)
                        <a class="nav-link" href="{{ route('provider.index') }}">Proveedor</a>
                        <a class="nav-link" href="{{ route('user.index') }}">Clientes</a>
                        <a class="nav-link" href="">Compras</a>
                    @endif
                    <li class="nav-item">
                        <span class="nav-link">{{ Auth::user()->name }}</span>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link">Cerrar Sesion</a>
                    </li>
                </ul>
                <a href="{{ route('cart') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-cart" viewBox="0 0 16 16">
                        <path
                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg>
                </a>
            </div>
        </div>
    </nav>
</header>
