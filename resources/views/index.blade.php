@extends('layout.index')

@section('content')
    <div class="overflow-auto">
        <h1 class="text-center">¿Quienes somos? </h1>


        <div>
            <div class="card text-black border-dark mb-3">
                <div class="card-header border-dark mb-3 text-black">
                    Mision
                </div>
                <div class="card text-black border-success mb-3">
                    <blockquote class="text center blockquote mb-0">
                        <p>Nuestra mision es ofrecerles lineas de productos que le generen amplio margen de utilidad, asi
                            mismo,
                            constantemente estamos ofreciendo nuevas novedades y dulces con precios competitivos<br>
                        
                            Este negocio está dedicado a la elaboración, comercialización y promoción de dulces.
                            Los productos que se comercializan en este negocio son muy variados, abarcando generalmente
                            desde: tamarindos, gomitas, agüitas etc.
                            El negocio se dirigirá al público en general, tratando de dirigirse al mayor número de personas
                            posible y de atender a clientes que tienen distintos puntos de venta cerca de la zona.</p>
                    </blockquote>
                </div>
            </div>

        </div>

        <div>
            <div class=" mx-auto card text-black border-dark mb-3 ">
                <div class="card-header border-dark mb-3 text-black">
                    Propuesta de Valor 
                </div>
                <div class="card text-black border-success mb-3">
                    <blockquote class="blockquote mb-0">
                        <p>Una propuesta de valor para el cliente es la forma en que un negocio satisface las necesidades de sus clientes. El éxito
                            de Frefrigel es que está basado en una propuesta de valor sustentada en satisfacer las necesidades del distribuidor o
                            canal, del cliente y del consumidor.
                            Los niños obtienen además de una rica golosina la experiencia de apoyar a una microempresa a ser mayormente
                            conocida mediante sus ricos productos.
                            El cliente es cada una de las dulcerías que consumen los productos elaborados por Frefrigel
                            El modelo de negocio de Frefrigel está basado en una propuesta de valor para el cliente efectiva y sustentable. En ella
                            todos ganan.</p>
                    </blockquote>
                </div>
            </div>

        </div>



        <div>
            <div class="card text-black border-dark mb-3">
                <div class="card-header border-dark mb-3">
                    Servicio
                </div>
                <div class="card text-black border-success mb-3">
                    <blockquote class="blockquote mb-0">
                        <p>Entregamos las mercancias en municipios del Estado de Mexico,
                            se hace devoluciones por productos sin rotacion,
                            dano u otra situacion, segun amerite
                            Contactanos al Tel. 722 273 4227 estamos a sus ordenes de
                            Lunes a Sábado 10:00 hrs a 17:00 hrs.</p>
                    </blockquote>
                    
                </div>
                <div class="card text-black border-success mb-3">
                    <blockquote class="blockquote mb-0">
                        <p>Para poder Tener una cuenta favor de llamar Tel. 722 273 4227
                            para otorgar una cuenta para poder hacer pedidos  </p>
                    </blockquote>
                    
                </div>
            </div>

        </div>
          
       
        <h1 class="text-center"> Productos FREFRIGEL</h1>
        <div class="card-group mx-auto " style="width: 50% ">
            <div class="card text-white border-primary mb-3" style="width: 18rem;">
                <img src="{{ asset('./img/empresa/Gelatinas.png') }}" alt="" class="card-img-top">
                <div class="card-body">
                    <p class="card-subtitle text-black fw-bold">Congeladas y Gelatinas </p>
                </div>
            </div>

            <div class="card text-white border-primary mb-3" style="width: 18rem;">
                <img src="{{ asset('./img/empresa/Gomitas.png') }}" alt="" class="card-img-top">
                <div class="card-body">
                    <p class="card-subtitle text-black fw-bold">Gomas y Malvaviscos </p>
                </div>
            </div>

            <div class=" card text-white border-primary mb-3" style="width: 18rem;">
                <img src="{{ asset('./img/empresa/Tamarindo.png') }}" alt="" class="card-img-top">
                <div class="card-body">
                    <p class="card-subtitle text-black fw-bold">Tamarindos </p>
                </div>
            </div>
        </div>
   


        <h1 class="text-center"> Distribución de Dulces</h1>
        <div class="card-group mx-auto" style="width: 50%">
            <div class="card text-white border-success mb-3" style="width: 18rem;">
                <img src="{{ asset('./img/empresa/Dulces.PNG') }}" alt="" class="card-img-top">
                <div class="card-body">
                    <p class="card-subtitle text-black fw-bold">DULCES </p>
                </div>
            </div>

            <div class="card text-white border-success mb-3" style="width: 18rem;">
                <img src="{{ asset('./img/empresa/Cocadas.png') }}" alt="" class="card-img-top">
                <div class="card-body">
                    <p class="card-subtitle text-black fw-bold">COCADAS Y COCOS </p>
                </div>
            </div>

            <div class="card text-white border-success mb-3" style="width: 18rem;">
                <img src="{{ asset('./img/empresa/Estuches.png') }}" alt="" class="card-img-top">
                <div class="card-body">
                    <p class="card-subtitle text-black fw-bold ">ESTUCHES </p>
                </div>
            </div>
        </div>
    @endsection
