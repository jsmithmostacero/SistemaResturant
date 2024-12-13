@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')

@stop

@section('content')

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



<div class="card" style="margin-top: 40px">
    <div class="card-header" style="background-color:#0dcaf0">
        <h1 align="center" style="font-size: 40px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color:white">Administrar Categorías</h1>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="container">
                @can('categorias.create')
                <a href="{{ route('categorias.create') }}" class="btn btn-primary mb-3" data-toggle="modal" data-target="#nuevo_producto">Nueva categoría</a>
                @endcan

                <div class="row d-flex align-items-stretch">

                    @foreach ( $categorias as $categoria )

                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column" style="margin-bottom: 40px">
                        <div class="card  d-flex flex-fill elevation-2" style="background-color: #F0F1F2">
                            <div class="card-header text-muted border-bottom-0">
                                <i class="fas fa-lg fa-registered mr-1"> Categoría</i>
                            </div>

                            <div class="card-body pt-0" style="background-color: #F0F1F2">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead"><b>{{ $categoria->nombre}}</b></h2>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            {{-- <li class="small"><span class="fa-li"><i class="fas fa-lg fa-mortar-pestle"></i></span> Nombre: {{ $categoria->nombre }}</li> --}}
                                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-audio-description"></i></span>
                                                Aperitivo: {{ $categoria->nombrec}}
                                            </li>
                                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-pencil-alt"></i></span> Descripción: {{$categoria->descripcion}}</li>

                                        </ul>
                                    </div>
                                    <div class="col-5 text-center">
                                        <img src="{{$categoria->imagen}}" alt="{{$categoria->nombre}}" class="img-circle img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer" style="background-color: #F0F1F2">
                                <div class="text-right btn-group" style="align-content:center">
                                    @can('categorias.edit')
                                    <a href="{{route('categorias.edit', $categoria->id)}}">
                                        <button class=" btn btn-sm btn-success"><i class="fas fa-pencil-alt"></i></button>
                                    </a>
                                    @endcan


                                    @can('categorias.destroy')
                                    <form action="{{route('categorias.destroy', $categoria->id)}}" method="POST" class="formulario-eliminar float-left" style="margin-left: 3px">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach




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
                <h5 class="modal-title" id="my-modal-title" style="font-size: 40px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif" align="center">Nueva Categoría</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('categorias.store') }}" method="post" enctype="multipart/form-data" class="p-3">
                    @csrf
                    <div class="form-group">
                        <label>Nombre de la categoría</label>
                        <input
                            @error('nombre')
                            is-invalid
                            @enderror
                            type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre de la categoria" required>

                        @error('nombre')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nombre del aperitivo de acompañamiento</label>
                        <input
                            @error('nombrec')
                            is-invalid
                            @enderror
                            type="text" class="form-control" id="nombrec" name="nombrec" placeholder="Ingrese el nombre del aperitivo" required>

                        @error('nombrec')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Imagen</label>
                        <input type="file" id="imagen" name="imagen" class="form-control" placeholder="Amount" required>
                    </div>
                    <div class="form-group">
                        <label>Descripción</label>
                        <input
                            @error('descripcion')
                            is-invalid
                            @enderror
                            name="descripcion" id="descripcion" class="form-control" required>

                        @error('descripcion')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror
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

@if (session::has('eliminar')== '¡Categoria eliminada correctamente!')
<script>
    Swal.fire(
        '¡Eliminado!',
        'La categoría ha sido eliminada con éxito',
        'success'
    )
</script>
@endif

<script>
    document.addEventListener('keydown', function(event) {
        if (event.key === 'F1') {
            event.preventDefault(); // Previene el manual del navegador
            window.open('/manual_usuario.pdf', '_blank'); // Abre tu manual
        }
    });
</script>

<script>
    $('.formulario-eliminar').submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Esta categoría se eliminará definitivamente",
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

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>




@stop