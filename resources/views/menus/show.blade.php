@extends('adminlte::page')

@section('title', 'Menus')

@section('content_header')
 
@stop

@section('content')
 <h1 align="center" style="font-size: 50px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Detalles del Menú</h1> 


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

        <section class="card card-blue" style="margin-top: 8%; margin-bottom:12%">
            <div class="product-image" align="center">
                <img src={{ asset("/images/menus/chef.png") }} alt="OFF-white Red Edition" draggable="false" />
            </div>
            <div class="product-info">
                <p style="font-size: 20px">Nombre: {{$menus->nombre}}</p>
                <p style="font-size: 20px">
                    @foreach ($categorias as $item)
                                @if ($menus->id_categoria==$item->id)
                                    Categoría: {{ $item->nombre }}
                                @endif
                    @endforeach
                </p>
                <p style="font-size: 20px">
                    @foreach ($categorias as $item)
                                @if ($menus->id_categoria==$item->id)
                                    Aperitivo: {{ $item->nombrec }}
                                @endif
                    @endforeach
                </p>
                <div class="price">S/. {{$menus->precio}}.00</div>
            </div>
            <div class="btn">
                <button class="buy-btn">Código: # {{$menus->id}}</button>
            </div>
            <div style="margin-top: 20px; margin-bottom:20px">
                <a href="{{route ('menus.index')}}" class="btn btn-success float-right" style="width: 40%; height:100%"><i class="fas fa-fw fa-check"></i>Regresar</a>
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