@extends('adminlte::page')

@section('title', 'Mesa')

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
                            Editar Mesa
                        </div>
                        <div class="card-body">
                            <form action="{{ route('mesas.update',$mesas->id) }}" method="post" enctype="multipart/form-data" class="p-3">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Nombre de la mesa</label>
                                    <input 
                                    type="text" class="form-control" id="nombre" name="nombre" value="{{$mesas->nombre}}" required>
                                </div>

                                    <div class="form-group">  
                                    <label>Número de personas en la mesa</label>
                                    <input type="number" id="cantidad" name="cantidad" class="form-control" value="{{$mesas->cantidad}}"  required> 
                                    </div>
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <select class="form-control" id="estado" name="estado" required value="{{$mesas->estado}}">
                                            <option value="">Seleccione un estado</option>
                                              <option value="Disponible" >Disponible</option>
                                              <option value="Pendiente">Pendiente</option>
                                              <option value="No disponible">No disponible</option>
                                          </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Ubicación</label>
                                        <select name="locacion" id="locacion"  class="form-control" value="{{$mesas->locacion}}">
                                            <option value="">Seleccione una ubicación</option>
                                             <option value="Entrada">Entrada</option>
                                             <option value="Frentecocina">Frente a la cocina</option>
                                             <option value="Salón">Salón</option>
                                        </select>
                                    </div>  
    
                                <div>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Modificar datos</button>
                                    <a href="{{route ('mesas.index')}}" class="btn btn-success float-right"><i class="fas fa-fw fa-check"></i>Regresar</a>
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

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop

@section('js')
 
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>

@stop