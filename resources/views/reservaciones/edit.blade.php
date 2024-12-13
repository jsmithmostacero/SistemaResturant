@extends('adminlte::page')

@section('title', 'Reservaciones')

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

{{--  --}}
<div class="row">
    <div class="col-md-6 mx-auto">
                <div class="card" style="margin-top: 30px">
                    <div class="card-header bg-primary text-white" style="font-size: 40px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif" align="center"> 
                        Editar Reserva
                    </div>
                    <div class="card-body">
                        <form action="{{ route('reservaciones.update',$reservaciones->id) }}" method="post" enctype="multipart/form-data" class="p-3">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Nombres</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{$reservaciones->nombre}}" required>
                            </div>
                            <div class="form-group">
                                <label>Apellidos</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" value="{{$reservaciones->apellido}}" required>
                            </div>
                            <div class="form-group">
                                <label>Correo</label>
                                <input type="email" class="form-control" id="correo" name="correo" value="{{$reservaciones->correo}}" required>
                            </div>
                            <div class="form-group">
                                <label>Teléfono</label>
                                <input type="text" class="form-control" id="numero" name="numero" value="{{$reservaciones->numero}}" required>
                            </div>
                            <div class="form-group">
                                <label>Día de reservación</label>
                                <input type="datetime-local" class="form-control" id="fecha" name="fecha" value="{{$reservaciones->fecha}}" required>
                            </div>
                            <div class="form-group">
                                <label>Mesa</label>
                                <select name="id_mesa" id="id_mesa" class="form-control" value="{{$reservaciones->id_mesa}}">
                                    <option value="">Selecciona una mesa</option>
                                    @foreach ( $mesas as $mesa )
                                        <option value="{{$mesa->id}}">{{ $mesa->nombre }}</option>
                                    @endforeach               
                                  </select>                            
                            </div>
                            <div class="form-group">
                                <label>Número de personas en la reserva</label>
                                <input type="text" class="form-control" id="cantidad" name="cantidad" value="{{$reservaciones->cantidad}}" required>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Modificar datos</button>
                                <a href="{{route ('reservaciones.index')}}" class="btn btn-success float-right"><i class="fas fa-fw fa-check"></i>Regresar</a>
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