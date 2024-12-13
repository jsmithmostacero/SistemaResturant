@extends('adminlte::page')

@section('title', 'Reservas')

@section('content_header')
 
@stop

@section('content')
<h1 align="center" style="font-size: 50px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Detalles de la Reservación</h1>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href={{ asset("/show.css") }}>
</head>
<body>
    <main class="container">
        <section class="card card-white"  style="margin-top: 12%; margin-bottom:12%">
            <div class="product-image">
                <img src={{ asset("/images/reservacion/reserva.png") }} alt="OFF-white Green Edition" draggable="false" />
            </div>
            <div class="product-info">
                <p style=" color:#fdfdfd; font-size: 20px">
                        @foreach ($mesas as $item)
                                    @if ($reservaciones->id_mesa==$item->id)
                                        {{ $item->nombre }}
                                    @endif
                        @endforeach
                    
                </p>
                <p style="color: #fdfdfd; font-size: 15px">Fecha y hora: {{$reservaciones->fecha}}</p>
                 <p style="color: #fdfdfd; font-size: 15px">Nombres y Apellidos: {{$reservaciones->nombre}} {{$reservaciones->apellido}}</p>
                 <p style="color: #fdfdfd; font-size: 15px">Correo: {{$reservaciones->correo}}</p>
                 <p style="color: #fdfdfd; font-size: 15px">Teléfono: {{$reservaciones->numero}}</p>
                <p style="color: #fdfdfd; font-size: 15px">Personas: {{$reservaciones->cantidad}}</p>
            </div>
            <div style="margin-top: 20px; margin-bottom:20px">
                <a href="{{route ('reservaciones.index')}}" class="btn btn-success float-right" style="width: 40%; height:100%"><i class="fas fa-fw fa-check"></i>Regresar</a>
            </div>

        </section>        
       
    </main>
   
</body>
</html>
@stop

@section('css')

@stop

@section('js')

@stop