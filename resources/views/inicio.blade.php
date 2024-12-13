{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>


    <div class="col-sm-9 " style="margin-bottom: 30px">
        @foreach ( $menus as $menu )

        <div class="col" style="margin-top: 30px">
          <div class="card h-100 elevation-2">
            <img src="{{$menu->imagen}}" alt="{{$menu->nombre}}" class="card-img-top" width="8%">
<div class="card-header">
    <h2>{{$menu->nombre}}</h2>
    <p>S/. {{$menu->precio}}</p>
    <div class="col-7">
        <form action="{{route('cart.add')}}" method="post">
            @csrf
            <input type="hidden" name="producto_id" value="{{$menu->id}}">
            <input type="submit" name="btn" class="btn btn-success" value="addToCart">
        </form>
    </div>

</div>

</div>


</div>


@endforeach

</div>


</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script>
    document.addEventListener('keydown', function(event) {
        if (event.key === 'F1') {
            event.preventDefault(); // Previene el manual del navegador
            window.open('/manual_usuario.pdf', '_blank'); // Abre tu manual
        }
    });
</script>

</html> --}}

{{-- <!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <title>Menú</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="stylesheet" type="text/css" href="{{asset('/bootstrap.minnn.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/ssstyle.css')}}">
<link rel="stylesheet" href="{{asset('/rresponsive.css')}}">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,800;1,400&family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset('/jquery.mCustomScrollbar.min.css')}}">
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

--}}
{{-- </head>
   <body>
      <div class="header_section">
         <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <a class="navbar-brand" style="color: white">Restaurante Campestre "La Esquina del JC"</a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto">

                     <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}"> Login</a>
</li>

</ul>

</div>
</nav>
</div>
</div>
<div class="container-fluid">
    <div class="layout_border">
        <div class="vagetables_section layout_padding margin_bottom90">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="vagetables_taital">Menú del día</h1>
                    </div>
                </div>
                <div class="courses_section_2">

                    @if(Session::has('datos'))
                    <div class="alert alert-success shadow-lg" style="margin-top: 20px">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
                            <use xlink:href="#info-fill" />
                        </svg>
                        {{ Session::get('datos') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <div class="row">


                        @foreach ( $menus as $menu )

                        <div class="col-md-4">
                            <div class="hover01 column">
                                <figure><img src="{{$menu->imagen}}"></figure>
                            </div>
                            <h3 class="harshal_text">{{$menu->nombre}}</h3>
                            <h3 class="rate_text">S/. {{$menu->precio}}</h3>

                            <form action="{{route('cart.add')}}" method="post" align="center">
                                @csrf
                                <input type="hidden" name="producto_id" value="{{$menu->id}}">
                                <input type="submit" name="btn" class="btn btn-success">
                            </form>
                        </div>

                        @endforeach
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<script src="{{asset('/jjquery.min.js')}}"></script>
<script src="{{asset('/ppopper.min.js')}}"></script>
<script src="{{asset('/bbootstrap.bundle.min.js')}}"></script>
<script src="js/jquery-3.0.0.min.js"></script>
<script src="js/plugin.js"></script>
<script>
    document.addEventListener('keydown', function(event) {
        if (event.key === 'F1') {
            event.preventDefault(); // Previene el manual del navegador
            window.open('/manual_usuario.pdf', '_blank'); // Abre tu manual
        }
    });
</script>

</body>

</html> --}}


{{-- --}}
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('/eeeestilo.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/bootstrap.minnn.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/ssstyle.css')}}">
    <link rel="stylesheet" href="{{asset('/rresponsive.css')}}">
    <script src="{{asset('/app.js')}}" async></script>
    {{-- <script src="https://js.stripe.com/v3/"></script> --}}

    {{-- SDK MercadoPago.js--}}
    <script src="https://sdk.mercadopago.com/js/v2"></script>



    <!-- theme and plugins. should be loaded in the HEAD section -->


    <title>Restaurante | </title>
</head>

<body>
    <div class="header_section">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" style="color: white">Restaurante Campestre "La Esquina del JC"</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}">Iniciar sesión</a>
                        </li>

                    </ul>

                </div>
            </nav>
        </div>
    </div>


    <header>
        {{-- <h1 style="color: black">Menú del día</h1> --}}
    </header>
    <h1 style="color: black;font-family:Verdana, Geneva, Tahoma, sans-serif; font:bolder;margin-top:30px; font-size:40px" align="center">Menú del día</h1>


    <section class="contenedor">

        <!-- Contenedor de elementos -->
        <div class="contenedor-items">
            @foreach ( $menus as $menu )

            <div class="item">
                <span class="titulo-item">{{$menu->nombre}}</span>
                <img src="{{$menu->imagen}}" alt="" class="img-item">
                <span class="precio-item">${{$menu->precio}}</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>


            @endforeach
        </div>
        <!-- Carrito de Compras -->
        <div class="carrito" id="carrito">
            <div class="header-carrito">
                <h2>Tu Carrito</h2>
            </div>

            <div class="carrito-items">

            </div>
            <div class="carrito-total">
                <div class="fila">
                    <strong>Tu Total</strong>
                    <span class="carrito-precio-total">
                        $120.000,00
                    </span>
                </div>

                {{-- <button class="btn-pagar">Pagar <i class="fa-solid fa-bag-shopping"></i> </button>  --}}

                <div id="wallet_container"></div>
                <!-- payment form submit button -->
                {{-- <button class="btn-pagar">Pagar <i class="fa-solid fa-bag-shopping"></i></button> --}}


            </div>
        </div>
    </section>
</body>
<script>
    const mp = new MercadoPago('TEST-e7403f27-42db-4036-8717-e9c0387a7525', {
        locale: 'es-AR'
    });

    mp.bricks().create("wallet", "wallet_container", {
        initialization: {
            preferenceId: "<517017840>",
        },
    });

    document.addEventListener('keydown', function(event) {
        if (event.key === 'F1') {
            event.preventDefault(); // Previene el manual del navegador
            window.open('/manual_usuario.pdf', '_blank'); // Abre tu manual
        }
    });
</script>

</html>
