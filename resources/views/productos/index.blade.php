@extends('adminlte::page')

@section('title', 'Producto')

@section('content_header')

@stop

@section('content')
{{-- <h1 align="center" style="font-size: 50px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Gestionar Productos</h1> --}}



<div id="mensaje" style="margin-bottom: 20px">

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>

    @if(Session::has('datos'))
    <div class="alert alert-success shadow-lg">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
            <use xlink:href="#info-fill" />
        </svg>
        {{ Session::get('datos') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
</div>


<!--Ejemplo tabla con DataTables-->

<div class="card" style="margin-top: 40px">
    <div class="card-header" style="background-color:#0dcaf0">
        <h1 align="center" style="font-size: 40px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color:white">Gestionar Productos</h1>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="container">
                @can('productos.create')
                <a href="{{ route('productos.create') }}" class="btn btn-primary mb-3" data-toggle="modal" data-target="#nuevo_producto">Nuevo producto</a>
                @endcan


                <div id="productos" class="row d-flex align-items-stretch">




                    @foreach ( $productos as $producto )

                    {{-- @if ($producto->fecha_caducidad < $producto->created_at) --}}


                    <div prodavatar="" class=" col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column" style="margin-bottom: 40px">
                        @if ($producto->fecha_caducidad <= date('Y-m-d') )

                            <div class="card bg-danger  d-flex flex-fill elevation-2" style="color: #fff">
                            <div class="card-header text-muted border-bottom-0">
                                <i class="fas fa-lg fa-cubes mr-1" style="color: #fff"> Producto</i>
                            </div>

                            <div class="card-header text-muted border-bottom-0">
                                <h1 class="badge badge-secondary">No disponible</h1>
                            </div>

                            <h1 class="badge badge-warning" align="center">¡El producto se encuentra vencido!</h1>

                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead"><b>{{ $producto->nombre}}</b></h2>
                                        <h4 class="lead" style="color: #fff; font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif"><b><i class="fas fa-lg fa-dollar-sign mr-1" style="color: #fff"></i>{{ $producto->precio}}</b></h4>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small" style="color: #fff"><span class="fa-li"><i class="fas fa-lg fa-mortar-pestle"></i></span> Categoría: {{ $producto->categoria }}</li>
                                            <li class="small" style="color: #fff"><span class="fa-li"><i class="fas fa-lg fa-copyright"></i></span> Stock: {{ $producto->stock }}</li>
                                            <li class="small" style="color: #fff"><span class="fa-li"><i class="fas fa-lg fa-calendar-times"></i></span> Fecha de caducidad: {{$producto->fecha_caducidad}}</li>

                                        </ul>
                                    </div>
                                    <div class="col-5 text-center">
                                        <img src="{{$producto->imagen}}" alt="{{$producto->nombre}}" class="img-circle img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right btn-group" style="align-content:center">
                                    @can('productos.edit')
                                    <a href="{{route('productos.edit', $producto->id)}}">
                                        <button class=" btn btn-sm btn-success"><i class="fas fa-pencil-alt"></i></button>
                                    </a>
                                    @endcan


                                    @can('productos.destroy')
                                    <form action="{{route('productos.destroy', $producto->id)}}" method="POST" class="formulario-eliminar float-left" style="margin-left: 3px">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-warning"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                    @endcan
                                </div>
                            </div>
                    </div>

                    @else

                    <div class="card   d-flex flex-fill elevation-2" style="background-color: #F0F1F2">
                        <div class="card-header text-muted border-bottom-0">
                            <i class="fas fa-lg fa-cubes mr-1"> Producto</i>
                        </div>

                        <div class="card-header text-muted border-bottom-0">
                            <h1 class="badge badge-info">{{ $producto->estado}}</h1>
                        </div>

                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b>{{ $producto->nombre}}</b></h2>
                                    <h4 class="lead" style="color: rgb(255, 65, 65); font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif"><b><i class="fas fa-lg fa-dollar-sign mr-1" style="color: rgb(255, 65, 65)"></i>{{ $producto->precio}}</b></h4>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-mortar-pestle"></i></span> Categoría: {{ $producto->categoria }}</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-copyright"></i></span> Stock: {{ $producto->stock }}</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-calendar-times"></i></span> Fecha de caducidad: {{$producto->fecha_caducidad}}</li>

                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="{{$producto->imagen}}" alt="{{$producto->nombre}}" class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right btn-group" style="align-content:center">
                                @can('productos.edit')
                                <a href="{{route('productos.edit', $producto->id)}}">
                                    <button class=" btn btn-sm btn-success"><i class="fas fa-pencil-alt"></i></button>
                                </a>
                                @endcan


                                @can('productos.destroy')
                                <form action="{{route('productos.destroy', $producto->id)}}" method="POST" class="formulario-eliminar float-left" style="margin-left: 3px">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </form>
                                @endcan
                            </div>
                        </div>
                    </div>


                    @endif
                </div>

                @endforeach
                {{-- @endif --}}


            </div>




        </div>
    </div>

</div>
</div>



{{-- REGISTRAR --}}
<div id="nuevo_producto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="my-modal-title" style="font-size: 40px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif" align="center">Nuevo Producto</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('productos.store') }}" method="post" enctype="multipart/form-data" class="p-3">
                    @csrf
                    <div class="form-group">
                        <label>Fecha de caducidad</label>
                        <input type="date" class="form-control" id="fecha_caducidad" name="fecha_caducidad" required>
                    </div>

                    <div class="form-group">
                        <label>Nombre de la categoría</label>
                        <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Ingrese el nombre de la categoría" required>
                    </div>

                    <div class="form-group">
                        <label>Estado</label>
                        <input type="text" class="form-control" id="estado" name="estado" placeholder="Ingrese el estado del producto" required>
                    </div>

                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre del producto" required>
                    </div>

                    <div class="form-group">
                        <label>Precio</label>
                        <input type="text" id="precio" name="precio" min="0.00" max="10000.00" step="0.01" class="form-control" placeholder="S/.">
                    </div>

                    <div class="form-group">
                        <label>Stock</label>
                        <input type="text" class="form-control" id="stock" name="stock" placeholder="Ingrese la cantidad de stock" required>
                    </div>

                    <div class="form-group">
                        <label>Imagen del producto</label>
                        <input type="file" id="imagen" name="imagen" class="form-control" required>
                    </div>


                    <div>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Registrar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@stop

@section('css')
<link rel="stylesheet" href="sweetalert2.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<link href="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.css" rel="stylesheet">



@stop

@section('js')

<script src="sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('keydown', function(event) {
        if (event.key === 'F1') {
            event.preventDefault(); // Previene el manual del navegador
            window.open('/manual_usuario.pdf', '_blank'); // Abre tu manual
        }
    });
</script>

@if (session::has('eliminar')== '¡Categoria eliminada correctamente!')
<script>
    Swal.fire(
        '¡Eliminado!',
        'El producto ha sido eliminado con éxito',
        'success'
    )
</script>
@endif

<script>
    $('.formulario-eliminar').submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Este producto se eliminará definitivamente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#4d72de',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })

    });
</script>


<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        var funcion;

        console.log(response);
        const productos = JSON.parse(response);
        let template = '';
        productos.forEach(producto => {
            template += `
        <div productoId="${producto.id}" productoStock="${producto.stock}"  class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">`;
            if (producto.fecha_caducidad == 'light') {
                template += `<div class="card bg-light d-flex flex-fill elevation-2">`;
            }
            if (producto.fecha_caducidad == 'danger') {
                template += `<div class="card bg-danger d-flex flex-fill elevation-2">`;
            }
            if (producto.fecha_caducidad == 'warning') {
                template += `<div class="card bg-warning d-flex flex-fill elevation-2">`;
            }
            template += `<div class="card-header border-bottom-0">

        </div>
        <div class="card-header text-muted border-bottom-0">
            <h1 class="badge badge-info">${producto.estado}</h1>
          </div>
        <div class="card-body pt-0">
          <div class="row">
            <div class="col-7">
              <h2 class="lead"><b>{{ $producto->nombre}}</b></h2>
                <h4 class="lead" style="color: rgb(255, 65, 65); font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif"><b><i class="fas fa-lg fa-dollar-sign mr-1" style="color: rgb(255, 65, 65)"></i>${producto.precio}</b></h4>
                <ul class="ml-4 mb-0 fa-ul text-muted">
                  <li class="small"><span class="fa-li"><i class="fas fa-lg fa-mortar-pestle"></i></span> Categoría: ${producto.categoria}</li>
                  <li class="small"><span class="fa-li"><i class="fas fa-lg fa-copyright"></i></span> Stock: ${producto.stock}</li>
                  <li class="small"><span class="fa-li"><i class="fas fa-lg fa-calendar-times"></i></span> Fecha de caducidad: ${producto.fecha_caducidad}</li>
                </ul>
            </div>
            <div class="col-5 text-center">
              <img src="${producto.imagen}"  class="img-circle img-fluid">
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="text-right btn-group"  style="align-content:center">
              @can('productos.edit')
                <a href="{{route('productos.edit', $producto->id)}}"  >
                  <button class=" btn btn-sm btn-success"><i class="fas fa-pencil-alt"></i></button>
                </a>
              @endcan


              @can('productos.destroy')
                <form  action="{{route('productos.destroy', $producto->id)}}" method="POST" class="formulario-eliminar float-left" style="margin-left: 3px">
                  @csrf
                     @method('DELETE')
                     <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                </form>
              @endcan
            </div>
        </div>
      </div>
    </div>
        `;
        });
        $('#productos').html(template);


    });
</script>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>




@stop
