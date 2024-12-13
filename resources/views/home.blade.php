@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

 <!-- <div class="card text-center bg-indigo">
    <div class="card-header" style="font-size: 30px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
        {{ Auth::user()->name}} - Bienvenido al Sistema La Esquina del JC
    </div>
</div> -->


<!-- <div class="flex flex-col justify-center text-center p-4 mx-20">
  <img class="mb-3 w-48 h-48 rounded-full shadow-lg shadow " src="{{asset('/banner.png')}}" alt="" width="80%">
</div> -->


    {{-- <h1 align="center" style="font-size: 55px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Panel de Administración</h1> --}}

 <div class="card text-center bg-indigo">
    <div class="card-header" style="font-size: 30px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
       Panel de Administración
    </div>
</div>


@stop

@section('content')


{{--  --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

<div class="container">
    <div class="row ">
        <div class="col-xl-6 col-lg-6">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-bread-slice"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Menú del día</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{ $menus }}
                            </h2>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6">
            <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Usuarios registrados</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{ $users }}
                            </h2>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Categorías registradas</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                               {{$categorias}}
                            </h2>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6">
            <div class="card l-bg-orange-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-couch"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Mesas totales</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{ $mesas }}
                            </h2>
                        </div>
                    </div>
                    {{-- <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6">
            <div class="card l-bg-red">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-flag"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Proveedores</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{ $proveedores }}
                            </h2>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6">
            <div class="card l-bg-blue">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-umbrella"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Productos</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{ $productos }}
                            </h2>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
{{-- </div> --}}


   </div>



@stop

@section('css')

    <style>
      .card {
    background-color: #fff;
    border-radius: 10px;
    border: none;
    position: relative;
    margin-bottom: 30px;
    box-shadow: 0 0.46875rem 2.1875rem rgba(90,97,105,0.1), 0 0.9375rem 1.40625rem rgba(90,97,105,0.1), 0 0.25rem 0.53125rem rgba(90,97,105,0.12), 0 0.125rem 0.1875rem rgba(90,97,105,0.1);
}
.l-bg-cherry {
    background: linear-gradient(to right, #493240, #f09) !important;
    color: #fff;
}

.l-bg-blue-dark {
    background: linear-gradient(to right, #373b44, #4286f4) !important;
    color: #fff;
}

.l-bg-green-dark {
    background: linear-gradient(to right, #0a504a, #38ef7d) !important;
    color: #fff;
}

.l-bg-orange-dark {
    background: linear-gradient(to right, #a86008, #ffba56) !important;
    color: #fff;
}

.l-bg-red {
    background: linear-gradient(to right, rgb(0, 68, 255), #15a9d6) !important;
    color: #fff;
}

.l-bg-blue {
    background: linear-gradient(to right, rgb(19, 68, 9), #73ff00) !important;
    color: #fff;
}

.card .card-statistic-3 .card-icon-large .fas, .card .card-statistic-3 .card-icon-large .far, .card .card-statistic-3 .card-icon-large .fab, .card .card-statistic-3 .card-icon-large .fal {
    font-size: 110px;
}

.card .card-statistic-3 .card-icon {
    text-align: center;
    line-height: 50px;
    margin-left: 15px;
    color: #000;
    position: absolute;
    right: -5px;
    top: 20px;
    opacity: 0.1;
}

.l-bg-cyan {
    background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
    color: #fff;
}

.l-bg-green {
    background: linear-gradient(135deg, #23bdb8 0%, #43e794 100%) !important;
    color: #fff;
}

.l-bg-orange {
    background: linear-gradient(to right, #f9900e, #ffba56) !important;
    color: #fff;
}

.l-bg-cyan {
    background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
    color: #fff;
}
    </style>


@stop

@section('js')

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

   {{--  --}}
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>


{{--  --}}

<script>
    document.addEventListener('keydown', function(event) {
        if (event.key === 'F1') {
            event.preventDefault(); // Previene el manual del navegador
            window.open('/manual_usuario.pdf', '_blank'); // Abre tu manual
        }
    });
</script>

@stop
