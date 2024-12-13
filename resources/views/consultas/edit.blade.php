@extends('adminlte::page')

@section('title', 'Consulta')

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
                        Editar Consulta
                    </div>
                    <div class="card-body">
                        <form action="{{ route('consultas.update',$consultas->id) }}" method="post" enctype="multipart/form-data" class="p-3">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Correo electrónico</label>
                                <div class="col-12">
                                    <select id="id_reservacions" name="id_reservacions" class="form-control">
                                    @foreach ($reservaciones as $reservacion)
                                        @if($reservacion->id == $consultas->id_reservacions)
                                        <option value="{{$reservacion->id}}" selected>{{$reservacion->correo}}</option>
                                         @endif 
                                        <option value="{{$reservacion->id}}">{{$reservacion->correo}}</option>     
                                    @endforeach 
                                 </select>
                                     </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-sm-2 col-form-label">Estado:</label>
                                <div class="form-check form-check-inline" style="margin-left: 20px">
                                  <input class="form-check-input" type="radio" name="estatus" id="estatus" value="Respondida">
                                  <label class="form-check-label" for="">Respondida</label>
                                </div>
                                <div class="form-check form-check-inline" style="margin-left: 20px">
                                  <input class="form-check-input" type="radio" name="estatus" id="estatus" value="Sin responder">
                                  <label class="form-check-label" for="">Sin responder</label>
                                </div>
                              </div> 

                            <div>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Modificar datos</button>
                                <a href="{{route ('consultas.index')}}" class="btn btn-success float-right"><i class="fas fa-fw fa-check"></i>Regresar</a>
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