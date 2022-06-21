<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Correo electronico</h1>

    <div>
        <div class="card-body">
            <h5 class="card-title">Correo Asunto </h5>
            <h6 class="card-subtitle mb-2 text-muted"><strong> Nombre: </strong>{{$contacto['name']}}</h6>
            <h6 class="card-subtitle mb-2 text-muted"><strong> Correo: </strong>{{$contacto['correo']}}</h6>
            <p class="card-text"><strong> Mensaje:</strong>{{$contacto['mensaje']}}</p>
          </div>
   </div>
    
</body>
</html>



   {{--<p>Este es el primer correo que mandare por laravel</p>

    <p><strong>Nombre: </strong>{{$contacto['name']}}</p>
    <p><strong>Correo: </strong>{{$contacto['correo']}}</p>
    <p><strong>Mensaje: </strong>{{$contacto['mensaje']}}</p>--}}