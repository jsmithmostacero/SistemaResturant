@extends('adminlte::page')

@section('title', 'Mesas')

@section('content_header')
 
@stop

@section('content')
<h1 align="center" style="font-size: 50px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Detalles de la Mesa</h1>

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
        <section class="card card-green"  style="margin-top: 12%; margin-bottom:12%">
            <div class="product-image" align="center">
                <img src={{ asset("/images/mesas/mesa.png") }} alt="OFF-white Green Edition" draggable="false" />
            </div>
            <div class="product-info">
                {{-- <h1>Categoría</h1> --}}
                <h2>Nombre: {{$mesas->nombre}}</h2>
                <h5>Estado: {{$mesas->estado}}</h5>
                <p style="font-size: 20px">Ubicación: {{$mesas->locacion}}</p>
                <p style="font-size: 20px">Personas: {{$mesas->cantidad}}</p>
            </div>
            <div class="btn">
                <button class="buy-btn">Código: # {{$mesas->id}}</button>
            </div>
            <div style="margin-top: 20px; margin-bottom:20px">
                <a href="{{route ('mesas.index')}}" class="btn btn-success float-right" style="width: 40%; height:100%"><i class="fas fa-fw fa-check"></i>Regresar</a>
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