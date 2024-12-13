@extends('adminlte::page')

@section('title', 'Mesa')

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


<!--Ejemplo tabla con DataTables-->
<div class="card" style="margin-top: 40px">
    <div class="card-header" style="background-color:#0dcaf0">
        <h1 align="center" style="font-size: 40px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color:white">Administrar Mesa</h1>
    </div>
    <div class="container">

        @can('mesas.create')
        <a href="{{ route('mesas.create') }}" class="btn btn-primary mb-3" data-toggle="modal" data-target="#nuevo_producto" style="margin-top: 20px">Nueva mesa</a>
        @endcan


        <div class="row row-cols-3 " style="margin-bottom: 30px">
            @foreach ( $mesas as $mesa )

            <div class="col" style="margin-top: 30px">
                <div class="card h-100 elevation-2">
                    <img src={{ asset("mesita.jpg") }} class="card-img-top" alt="...">
                    <div class="card-body" align="center" style="margin-top: 20px">

                        <div class="col-7">
                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                <h1 class="lead" style="font-size: 25px; color: #0083B0; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"><b>{{ $mesa->nombre }}</b></h1>
                                <li class="small" style="font-size: 15px"><span class="fa-li"><i class="fas fa-lg fa-users"></i></span> Personas: {{ $mesa->cantidad }}</li>
                                <li class="small" style="font-size: 15px"><span class="fa-li"><i class="fas fa-lg fa-pen"></i></span>Estado:

                                    @switch($mesa->estado)
                                    @case('Disponible')
                                    <h1 class="badge badge-success">Disponible</h1>
                                    @break
                                    @case('Pendiente')
                                    <h1 class="badge badge-warning">Pendiente</h1>
                                    @break
                                    @case('No disponible')
                                    <h1 class="badge badge-danger">No Disponible</h1>
                                    @break
                                    @endswitch

                                </li>
                                <li class="small" style="font-size: 15px"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Ubicación:
                                    @switch($mesa->locacion)
                                    @case('Entrada')
                                    <h1 class="badge badge-primary">Entrada</h1>
                                    @break
                                    @case('Frentecocina')
                                    <h1 class="badge badge-warning">Frente a la cocina</h1>
                                    @break
                                    @case('Salón')
                                    <h1 class="badge badge-info">Salón</h1>
                                    @break
                                    @endswitch
                                </li>
                            </ul>
                        </div>

                    </div>

                    <div class="card-footer " style="background-color:white">
                        <div class="text-right btn-group">
                            @can('mesas.edit')
                            <a href="{{route('mesas.edit', $mesa->id)}}">
                                <button class=" btn btn-sm btn-success"><i class="fas fa-pencil-alt"></i></button>
                            </a>
                            @endcan

                            @can('mesas.destroy')
                            <form action="{{route('mesas.destroy', $mesa->id)}}" method="POST" class="formulario-eliminar float-left" style="margin-left: 3px">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>
                            @endcan

                            @can('mesas.show')
                            <a href="{{route('mesas.show', $mesa->id)}}" style="margin-left: 3px">
                                <button class=" btn btn-sm btn-info"><i class="fas fa-eye"></i></button>
                            </a>
                            @endcan

                        </div>
                    </div>
                </div>


            </div>


            @endforeach

        </div>

    </div>



</div>

{{-- REGISTRAR --}}
<div id="nuevo_producto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="my-modal-title" style="font-size: 40px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif" align="center">Nueva Mesa</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('mesas.store') }}" method="post" enctype="multipart/form-data" class="p-3">
                    @csrf
                    <div class="form-group">
                        <label>Nombre de la mesa</label>
                        <input
                            type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre de la mesa" required>
                    </div>
                    <div class="form-group">
                        <label>Número de personas en la mesa</label>
                        <input type="number" id="cantidad" name="cantidad" class="form-control" placeholder="Ingrese la cantidad de personas" required>
                    </div>
                    <div class="form-group">
                        <label>Estado</label>
                        <select class="form-control" id="estado" name="estado" required>
                            <option value="">Seleccionar</option>
                            <option value="Disponible">Disponible</option>
                            <option value="Pendiente">Pendiente</option>
                            <option value="No disponible">No disponible</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ubicación</label>
                        <select name="locacion" id="locacion" class="form-control">
                            <option value="">Seleccione una ubicación</option>
                            <option value="Entrada">Entrada</option>
                            <option value="Frentecocina">Frente a la cocina</option>
                            <option value="Salón">Salón</option>
                        </select>
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
@if (session('eliminar')== '¡Menú eliminada correctamente!')
<script>
    Swal.fire(
        '¡Eliminado!',
        'Esta mesa ha sido eliminada con éxito',
        'success'
    )
</script>
@endif

<script>
    $('.formulario-eliminar').submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Esta mesa se eliminará definitivamente",
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

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>



@stop
