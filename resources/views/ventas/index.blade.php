@extends('adminlte::page')

@section('title', 'Ventas')

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

<div class="card-header" style="background-color:#0dcaf0">
    <h1 align="center" style="font-size: 40px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color:white">Listar Venta</h1>
</div>

<div class="container" style="margin-top: 30px">

    <table class="table " id="example" style="margin-top: 30px">
        <thead class="table-dark">
            <tr align="center">
                <th>N° de ticket</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>IGV (%)</th>
                <th>Total</th>
                <th>Registrado por</th>
                <th>Estado</th>
                <th>Opciones</th>

            </tr>
        </thead>

        @foreach ( $pedidos as $pedido )

        <tbody>


            <tr align="center">
                <td align="center">{{ $pedido->id }}</td>
                <td align="center">{{ (explode(' ',$pedido->created_at))[0]}}</td>
                <td align="center">{{ $pedido->nombreCliente }}, {{ $pedido->apellidosCliente }}</td>
                <td align="center">{{ $pedido->tax }}</td>
                <td align="center">
                    {{ ($pedido->total * $pedido->tax/100) + $pedido->total}}
                </td>
                <td align="center">{{ Auth::user()->name}}</td>
                <td align="center">
                    <h1 class="badge badge-success" align="center">{{ $pedido->status }}</h1>
                </td>
                <td align="center">
                    @can('ventas.pdf')

                    <a href="{{route('ventas.pdf', $pedido->id)}}" style="margin-left: 3px">
                        <button class=" btn btn-sm btn-danger"><i class="fas fa-file-pdf"> Comprobante de pago</i></button>
                    </a>
                    @endcan

                </td>
            </tr>
        </tbody>

        @endforeach
    </table>
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

@if (session('eliminar')== '¡Pedido eliminado correctamente!')
<script>
    Swal.fire(
        '¡Eliminado!',
        'Esta pedido ha sido eliminada con éxito',
        'success'
    )
</script>
@endif

<script>
    $('.formulario-eliminar').submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Este pedido se eliminará definitivamente",
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
    document.addEventListener('keydown', function(event) {
        if (event.key === 'F1') {
            event.preventDefault(); // Previene el manual del navegador
            window.open('/manual_usuario.pdf', '_blank'); // Abre tu manual
        }
    });
</script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>



@stop
