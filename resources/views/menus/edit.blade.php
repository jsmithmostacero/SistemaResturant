@extends('adminlte::page')

@section('title', 'Menú')

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
                    Editar Menú
                </div>
                <div class="card-body">
                    <form action="{{ route('menus.update', $menus->id) }}" method="post" enctype="multipart/form-data" class="p-3">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nombre del plato</label>
                            <input
                                @error('nombre')
                                is-invalid
                                @enderror
                                type="text" class="form-control" id="nombre" name="nombre" value="{{$menus->nombre}}" required>

                            @error('nombre')
                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Nombre de la categoría</label>
                            <input
                                @error('categoria')
                                is-invalid
                                @enderror
                                type="text" class="form-control" id="categoria" name="categoria" value="{{$menus->categoria}}" required>

                            @error('categoria')
                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Aperitivo de acompañamiento</label>
                            <select name="id_categoria" id="id_categoria" class="form-control">
                                <option value="">Seleccionar aperitivo</option>
                                @foreach ($categorias as $categoria)
                                @if($categoria->id == $menus->id_categoria)
                                <option value="{{$categoria->id}}" selected>{{$categoria->nombrec}}</option>
                                @endif
                                <option value="{{$categoria->id}}">{{$categoria->nombrec}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Precio</label>
                            <input
                                @error('precio')
                                is-invalid
                                @enderror
                                type="text" id="precio" name="precio" min="0.00" max="10000.00" step="0.01" class="form-control" value="{{$menus->precio}}">

                            @error('precio')
                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Stock</label>
                            <input class="form-control" name="stockDiario" id="stockDiario" type="number" min="0" value="{{$menus->stockDiario}}">
                        </div>

                        <div class="form-group">
                            <label>Descripción</label>
                            <input
                                @error('descripcion')
                                is-invalid
                                @enderror
                                name="descripcion" id="descripcion" class="form-control" value="{{$menus->descripcion}}" required>

                            @error('descripcion')
                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Modificar datos</button>
                            <a href="{{route ('menus.index')}}" class="btn btn-success float-right"><i class="fas fa-fw fa-check"></i>Regresar</a>
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
<script>
    document.addEventListener('keydown', function(event) {
        if (event.key === 'F1') {
            event.preventDefault(); // Previene el manual del navegador
            window.open('/manual_usuario.pdf', '_blank'); // Abre tu manual
        }
    });
</script>

@stop
