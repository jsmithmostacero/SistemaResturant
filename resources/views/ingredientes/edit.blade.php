@extends('adminlte::page')

@section('title', 'Ingredientes')

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
                        Editar Ingrediente
                    </div>
                    <div class="card-body">
                        <form action="{{ route('ingredientes.update',$ingredientes->id) }}" method="post" enctype="multipart/form-data" class="p-3">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Nombre del ingrediente</label>
                                <input 
                                @error('nombre')
                                 is-invalid
                                @enderror
                                type="text" class="form-control" id="nombre" name="nombre" value="{{$ingredientes->nombre}}" required >
              
                                @error('nombre')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Descripción</label>
                                <input 
                                @error('descripcion')
                                 is-invalid
                                @enderror
                                type="text" class="form-control" id="descripcion" name="descripcion" value="{{$ingredientes->descripcion}}" required>
              
                                @error('descripcion')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Medida</label>
                                <input
                                @error('medida')
                                 is-invalid
                                @enderror
                                 name="medida" id="medida"  class="form-control" required value="{{$ingredientes->medida}}">
              
                                 @error('medida')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Stock</label>
                                <input
                                @error('cantidad')
                                 is-invalid
                                @enderror
                                 name="cantidad" id="cantidad"  class="form-control" required value="{{$ingredientes->cantidad}}">
                
                                 @error('cantidad')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Precio</label>
                                <input 
                                @error('precio')
                                 is-invalid
                                @enderror
                                type="text" id="precio" name="precio" min="0.00" max="10000.00" step="0.01" class="form-control" value="{{$ingredientes->precio}}">
                
                                @error('precio')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>              

                            <div>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Modificar datos</button>
                                <a href="{{route ('categorias.index')}}" class="btn btn-success float-right"><i class="fas fa-fw fa-check"></i>Regresar</a>
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