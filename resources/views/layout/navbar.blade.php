<header>
    <nav class="navbar navbar-expand-lg navbar navbar-light bg-ligth" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0 text-center fs-5">
                    <a class="nav-link" href="{{ route('Informacion')}}">¿Quienes Somos?</a>
                    @if(Auth::user()->role_id == 2)
                    <a class="nav-link" href="{{ route('product.index') }}">Productos</a>
                    @endif
                    @if(Auth::user()->role_id == 2)
                    <a class="nav-link" href="">Pedidos</a>
                    @endif
                    <a class="nav-link" href="{{ route('home') }}"> Home </a>
                    @if(Auth::user()->role_id == 2)
                    <a class="nav-link" href="{{ route('provider.index') }}">Proveedor</a>
                    <a class="nav-link" href="{{ route('user.index') }}">Clientes</a>
                    @endif
                    <li class="nav-item">
                        <span class="nav-link">{{ Auth::user()->name }}</span>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link">Cerrar Sesion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
