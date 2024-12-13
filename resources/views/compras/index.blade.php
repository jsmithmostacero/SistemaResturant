@extends('adminlte::page')

@section('title', 'Compras')

@section('content_header')
 
@stop

@section('content')

   <div id="mensaje" style="margin-bottom: 20px">

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
      </symbol>
      <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
      </symbol>
      <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
      </symbol>
    </svg>

    @if(Session::has('datos'))
        <div class="alert alert-success shadow-lg">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
            {{ Session::get('datos') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif 
  </div>

  <div class="card-header" style="background-color:#0dcaf0" >
    <h1 align="center" style="font-size: 40px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color:white">Gestionar orden de compra</h1>
  </div>

  <div class="container" style="margin-top: 30px">

    
  @can('compras.create')
  <a href="{{ route('compras.create') }}" class="btn btn-primary mb-3" data-toggle="modal" data-target="#nuevo_producto">Nueva compra</a>
 @endcan

  <table class="table " id="example" style="margin-top: 30px">
    <thead class="table-dark">
      <tr align="center">
        <th>#</th>
        <th>Fecha de compra</th>
        <th>N° compra</th>
        <th>Proveedor</th>
        <th>Tipo identificación</th>
        <th>Comprador</th>
        <th>Total</th>
        <th>Impuesto (%)</th>
        <th>Estado</th>
        <th>Opciones</th>

      </tr>
    </thead>

    @foreach ( $compras as $compra )

    <tbody>

      
      <tr align="center" >
        <td align="center">{{ $compra->id }}</td>
        <td align="center">{{ (explode(' ',$compra->created_at))[0]}}</td>
        <td align="center">{{ $compra->numero_compra }}</td>     
        <td align="center">

          @foreach ($proveedores as $item)
          @if ($compra->id_proveedors == $item->id)
              {{ $item->nombre}}
          @endif
          @endforeach

        </td>
        <td align="center">{{ $compra->documento}}</td>

        <td align="center">{{ Auth::user()->name}}</td>

        <td align="center">{{ (($compra->precio_compra * $compra->cantidad) * $compra->impuesto/100) + ($compra->precio_compra * $compra->cantidad)}}</td>

        <td align="center">{{ $compra->impuesto }}</td>

        <td align="center">
          <h1 class="badge badge-success" align="center">{{ $compra->status }}</h1>
        </td>
        <td align="center">
          @can('compras.destroy')
          <form  action="{{route('compras.destroy', $compra->id)}}" method="POST" class="formulario-eliminar float-left" style="margin-bottom: 10px" >
            @csrf
               @method('DELETE')
               <button class="btn btn-sm btn-danger"><i class="fas fa-window-close"> Anular</i></button>
          </form>
         @endcan

          <a href="{{route('compras.show', $compra->id)}}">
            <button class=" btn btn-sm btn-danger"><i class="fas fa-file-pdf"> Comprobante de pago</i></button>
          </a>
  

        </td>
      </tr>
    </tbody>

    @endforeach
  </table>
  </div>

  {{-- REGISTRAR --}}
<div id="nuevo_producto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="my-modal-title" style="font-size: 40px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif" align="center">Nueva Compra</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('compras.store') }}" method="post" enctype="multipart/form-data" class="p-3">
                @csrf
                <div class="form-group">
                    <label>Nombre del proveedor</label>
                    <select name="id_proveedors" id="id_proveedors" class="form-control">
                        <option value="">Selecciona un proveedor</option>
                        @foreach ( $proveedores as $proveedor )
                            <option value="{{$proveedor->id}}">{{ $proveedor->nombre }}</option>
                        @endforeach
                      </select>                  
                </div>
  
                <div class="form-group">
                    <label>Documento</label>
                    <input type="text" class="form-control" id="documento" name="documento" placeholder="BOLETA DE VENTA O FACTURA" required>
                  </div>
  
                <div class="form-group">
                  <label>Número de Compra</label>
                  <input type="text" class="form-control" id="numero_compra" name="numero_compra" placeholder="000" required>
                </div>
  
              <div class="form-group">
                <label>Producto</label>
                <select name="id_productos" id="id_productoss" class="form-control">
                    <option value="">Selecciona un producto</option>
                    @foreach ( $productos as $producto )
                        <option value="{{$producto->id}}">{{ $producto->nombre }}</option>
                    @endforeach
                  </select>                
              </div>
  
              <div class="form-group">
                <label>Cantidad</label>
                <input type="text" id="cantidad" name="cantidad" min="0.00" max="10000.00" step="0.01" class="form-control" >
              </div>

  
              <div class="form-group">
                <label>Precio de Compra</label>
                <input type="text" class="form-control" id="precio_compra" name="precio_compra" placeholder="S/." required>
            </div>

            <div class="form-group">
                <label for="">Impuesto (%)</label>
                <input name="impuesto" id="impuesto" class="form-control" type="number" min="1" value="20" required>
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

@if (session('eliminar')== '¡Compra eliminada correctamente!')
<script>
 Swal.fire(
   '¡Eliminado!',
 'Esta compra y su comprobante han sido anulados con éxito',
   'success'
 )
</script>
@endif

<script>
$('.formulario-eliminar').submit(function(e){
e.preventDefault();
Swal.fire({
title: '¿Estás seguro?',
text: "Esta compra y su comprobante se anularán definitivamente",
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#4d72de',
cancelButtonColor: '#d33',
confirmButtonText: '¡Sí, anular!',
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
  $(document).ready(function(){
    $('#example').DataTable();
  });
</script>



@stop