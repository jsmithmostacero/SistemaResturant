@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1 align="center" style="font-size: 50px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Productos</h1>
@stop

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Prepend and Append Inputs</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="m-4" >
    <form action="{{ route('productos.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row g-2" >
            <div class="col-6">
                <label for="nombre" class="form-label">Fecha de caducidad</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <span class="bi-person"></span>
                    </span>
                    <input type="date" class="form-control" id="fecha_caducidad" name="fecha_caducidad"  required>
                </div>
            </div>
            <div class="col-6">
                <label for="nombre" class="form-label">Nombre de la categoría</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <span class="bi-person"></span>
                    </span>
                    <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Ingrese el nombre de la categoría" required>
                </div>
            </div>
            <div class="col-6">
                <label for="nombre" class="form-label">Estado</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <span class="bi-person"></span>
                    </span>
                    <input type="text" class="form-control" id="estado" name="estado" placeholder="Ingrese el estado del producto" required>
                </div>
            </div>
            <div class="col-6">
                <label for="nombre" class="form-label">Nombre</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <span class="bi-person"></span>
                    </span>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre del producto" required>
                </div>
            </div>
            <div class="col-6">
                <label for="precio" class="form-label">Precio</label>
                <div class="input-group">            
                    <input type="text" id="precio" name="precio" min="0.00" max="10000.00" step="0.01" class="form-control" placeholder="S/.">
                    <span class="input-group-text">.00</span>
                </div>
            </div>
            <div class="col-6">
                <label for="nombre" class="form-label">Stock</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <span class="bi-person"></span>
                    </span>
                    <input type="text" class="form-control" id="stock" name="stock" placeholder="Ingrese la cantidad de stock" required>
                </div>
            </div>
   
           <div>
            <button type="submit" class="btn btn-primary" class="formulario-ingresar"><i class="fas fa-fw fa-check"></i>Registrar</button> 
            <a href="{{route ('productos.index')}}" class="btn btn-success float-right"><i class="fas fa-fw fa-check"></i>Regresar</a>
          </div>
    
        </div>

    </form>
</div>  
</body>
</html>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
 

@stop