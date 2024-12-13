@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
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


<div class="row">
    <div class="col-md-6 mx-auto">
                <div class="card" style="margin-top: 30px">
                    <div class="card-header bg-primary text-white" style="font-size: 40px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif" align="center"> 
                        Editar Producto
                    </div>
                    <div class="card-body">
                        <form action="{{ route('productos.update',$productos->id) }}" method="post" enctype="multipart/form-data" class="p-3">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Fecha de caducidad</label>
                                <input type="date" class="form-control" id="fecha_caducidad" name="fecha_caducidad"  value="{{$productos->fecha_caducidad}}" required>
                            </div>
                            <div class="form-group">
                                <label>Nombre de la categoría</label>
                                <input type="text" class="form-control" id="categoria" name="categoria" value="{{$productos->categoria}}" required>
                            </div>
                              <div class="form-group">
                                <label>Estado</label>
                                <input type="text" class="form-control" id="estado" name="estado" value="{{$productos->estado}}" required>
                            </div>
                              <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{$productos->nombre}}" required>
                            </div>
                              <div class="form-group">
                                <label>Precio</label>
                                <input type="text" class="form-control" id="precio" name="precio" value="{{$productos->precio}}" required>
                            </div>
                              <div class="form-group">
                                <label>Stock</label>
                                <input type="text" class="form-control" id="stock" name="stock" value="{{$productos->stock}}" required>
                              </div>
                            
           <div>
            <button type="submit" class="btn btn-primary" class="formulario-ingresar"><i class="fas fa-fw fa-check"></i>Modificar datos</button> 
            <a href="{{route ('productos.index')}}" class="btn btn-success float-right"><i class="fas fa-fw fa-check"></i>Regresar</a>
          </div>
                        </form>
                    </div>
                </div>
            </div>
</div>
</body>
</html>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
 

@stop