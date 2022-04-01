<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0 text-center fs-5">
                    <a class="nav-link" href="{{ route('Informacion')}}">¿Quienes Somos?</a>
                    <a class="nav-link" href="{{ route('product.index') }}">Productos</a>
                    <a class="nav-link" href="">Pedidos</a>
                    <a class="navbar-brand me-0" href="{{ route('home') }}">
                        <img src="{{ asset('img/imagotipo.png')}}" alt="joduma-imagotipo" width="60px">
                    </a>
                    <a class="nav-link" href="{{ route('provider.index') }}">Proveedor</a>
                    <a class="nav-link" href="{{ route('user.index') }}">Clientes</a>
                </ul>
            </div>
        </div>
    </nav>
</header>
