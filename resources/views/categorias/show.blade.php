@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')

@stop

@section('content')
<h1 align="center" style="font-size: 50px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Detalles de la Categoría</h1>

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
        <section class="card"  style="margin-top: 12%; margin-bottom:12%">
            <div class="product-image" align="center">
                <img src={{ asset("/images/menus/menu.png") }} alt="OFF-white Red Edition" draggable="false" />
            </div>
            <div class="product-info">
                {{-- <h1>Categoría</h1> --}}
                <h2 style="color: #fdfdfd">Nombre: {{$categorias->nombrec}}</h2>
                <p style="color: #fdfdfd; font-size:20px">Categoría: {{$categorias->nombre}}</p>
                <strong style="color: #fdfdfd; font-size:20px">Descripción: </strong><p style="color: #fdfdfd">{{$categorias->descripcion}}</p>
            </div>
             <div class="btn">
                <button class="buy-btn btn-sm" >Código: # {{$categorias->id}}</button>
                {{-- <strong  style="color: #fdfdfd; font-size:15px">Código: {{$categorias->id}}</strong > --}}
            </div>
            <div style="margin-top: 20px; margin-bottom:20px">
                <a href="{{route ('categorias.index')}}" class="btn btn-success float-right" style="width: 40%; height:100%"><i class="fas fa-fw fa-check"></i>Regresar</a>
            </div>
        </section>

    </main>

</body>
</html>



@stop

@section('css')

@stop

@section('js')
<script>
    document.addEventListener('keydown', function(event) {
        if (event.key === 'F1') {
            event.preventDefault(); // Previene el manual del navegador
            window.open('/manual_usuario.pdf', '_blank'); // Abre tu manual
        }
    });
</script>

@stop
