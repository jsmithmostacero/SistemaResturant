@extends('adminlte::page')

@section('title', 'Proveedor')

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
                        Editar Proveedor
                    </div>
                    <div class="card-body">
                        <form action="{{ route('proveedores.update',$proveedores->id) }}" method="post" enctype="multipart/form-data" class="p-3">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>RUC</label>
                                <input type="text" class="form-control" id="ruc" name="ruc" value="{{$proveedores->nombre}}" required>
                            </div>
              
                            <div class="form-group">
                                <label>Nombres y Apellidos del proveedor</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{$proveedores->nombre}}"  required>
                            </div>
              
                            <div class="form-group">
                              <label>DNI</label>
                              <input type="text" class="form-control" id="dni" name="dni"  value="{{$proveedores->dni}}" required>
                            </div>
              
                          <div class="form-group">
                            <label>Correo electrónico</label>
                            <input type="text" class="form-control" id="email" name="email"  value="{{$proveedores->email}}" required>
                        </div>
              
                          <div class="form-group">
                            <label>Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" value="{{$proveedores->telefono}}"  required>
                        </div>
              
                          <div class="form-group">
                            <label>Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" value="{{$proveedores->direccion}}"  required>
                        </div>
              
                          <div>
                            <button type="submit" class="btn btn-primary" class="formulario-ingresar"><i class="fas fa-fw fa-check"></i>Modificar datos</button> 
                            <a href="{{route ('proveedores.index')}}" class="btn btn-success float-right"><i class="fas fa-fw fa-check"></i>Regresar</a>
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