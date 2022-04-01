@extends('layout.index')

@section('content')

<body class="bg-light-joduma vh-100">
    <h1 class="text-center text-white fs-2 mt-5"> Editar Usuario</h1>
    <span class="text-center d-block text-white fst-italic text-shadow fs-6">{{ $user->name . ' ' . $user->lastname}}</span>
  
    <div class="row container justify-content-center align-content-center m-auto">
        <div class="col-md-8 col-lg-6 col-xl-5 bg-white p-3 p-md-5 mt-5 rounded-3 shadow-lg transition-300">
            <div class="container m-auto p-0">
                <form action="{{route('user.update', $user)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control ps-4" placeholder="Nombre" name="name" value="{{ $user->name }}" id="nameInput">
                                <label for="nameInput">Nombre</label>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control ps-4" placeholder="Apellido" name="lastname" value="{{ $user->lastname }}" id="lastnameInput">
                                <label for="lastnameInput">Apellido</label>
                            </div>
                        </div>
                    </div>

                    
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control ps-4" placeholder="Correo Electronico" name="email" value="{{ $user->email }}" id="emailInput">
                        <label for="emailInput">Correo</label>
                    </div>

                    
                   
                    <div class="form-group mt-3">
                        <button class="btn btn-primary w-100">Actualizar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>


    @endsection
