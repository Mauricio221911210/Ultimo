@extends('Auth.Layout.login')

@section('content')
@section('navbar') @endsection
<div class="container-fluid w-100 vh-100 row align-items-center m-0 bg-sm-login">
    <div class="row h-75">
        <div class="col-sm-12 col-md-4 align-items-center m-auto shadow-lg bg-light">
            <div class="row h-100">
                <div class="col-lg-12 col-sm-12 p-md-5 p-3">
                    <h1 class="text-center">Iniciar Sesion</h1>
                    <hr class="text-success">
                    <div class="row align-items-center">
                        <form method="post" action="{{ route('authenticate') }}" class="border-sm p-lg-5 p-sm-3 h-sm-100">
                            @csrf
                            <div class="form-group">
                                <label class="text-center w-100 mb-lg-3">Correo Electronico</label>
                                <input class="form-control" name="email" value="{{ old('email') }}">
                                {!! $errors->first('email', '<small class="text-danger">:message</small>') !!}

                            </div>
                            <div class="form-group">
                                <label class="text-center w-100 mt-lg-3">Contraseña</label>
                                <input type="password" class="form-control" name="password"><br>
                                {!! $errors->first('password', '<small class="text-danger">:message</small>') !!}
                            </div> 
                            <button type="submit" class="btn btn-success w-100">Iniciar Sesión</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>

</div>
@endsection


