@extends('adminlte::page')

@section('title', 'Pedidos')

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

  <div class="card" style="margin-top: 40px">
    <div class="card-header" style="background-color:#0dcaf0" >
      <h1 align="center" style="font-size: 40px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color:white">Administrar Pedido</h1>
    </div>
  <div class="content" >
    <form id="formPedido" class="form needs-validation" novalidate action=" {{ route('pedido.update', $pedidos->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

    <div class="row" >
        <div class="col-md-6" style="margin-top: 30px">
            <div class="card card-danger elevation-4">
                <div class="card-header with-border">
                    <h3 class="card-title"><i class="fa fa-list"></i> Menú</h3>
                </div>
                <div class="card-body">

                <div class="col-12 py-3 px-2 h-100 "
                style="display: grid; grid-template-columns: repeat(2,1fr); grid-template-rows: repeat(auto-fill,170px); gap: 12px; overflow-y: auto"
                style="">

                @foreach ( $menus as $menu )
                <div class="card w-auto h-100 m-0">
                        <div class="card-body h-100 d-flex flex-column producto elevation-4"
                            style="justify-content:space-between" >

                            <p  style="font: 10px" align="center"><b>{{ $menu->nombre }}</b></p>
                            {{-- <small align="center">{{ $menu->descripcion }}</small> --}}
                            <div class="py-1" align="center">
                                <h1 class="lead" style="color:green; font-family:Verdana, Geneva, Tahoma, sans-serif"><b><i class="fas fa-lg fa-dollar-sign mr-1" style="color:green"></i>{{ $menu->precio}}</b></h1>
                            </div>
                            <div class="row" style="font-size: 12px">
                                <div class="col-12" style="display:flex; justify-content:center;">
                                    @if ($menu->stockDiario > 0)
                                        <div data-sign="-1"
                                            class="bg-secondary px-3 amount-controller amount.controller-minus"
                                            style="flex-shrink: 1; font-size: 1.4em; cursor: pointer; user-select: none;">
                                            - </div>
                                        <div class="bg-black text-center d-flex"
                                            style="flex-grow: 1; align-items:center; justify-content:center">
                                            <span class="amount-counter m-auto"
                                                data-max="{{ $menu->stockDiario }}"
                                                data-idProducto="{{ $menu->id }}"
                                                data-precio={{ $menu->precio }}
                                                style="user-select: none;">0
                                            </span>


                                        </div>
                                        <div data-sign="1"
                                            class="bg-pink px-3 amount-controller amount-controller-plus"
                                            style="flex-shrink: 1; font-size: 1.4em; cursor: pointer ; user-select: none;">
                                            +
                                        </div>
                                    @else
                                        <div class="bg-danger w-100 h-100 text-center" style="">
                                            Agotado
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                  </div>

              

                </div>
            </div>
        </div>

        <div class="col-md-6" style="margin-top: 30px">
            <div class="card card-primary elevation-2">
                <div class="card-header with-border">
                    <h3 class="card-title"><i class="fa fa-shopping-cart"></i> Datos del Cliente y el Pedido</h3>
                    <span class="float-right">Fecha: {{ date('d/m/Y') }}</span>
                </div>
                <div class="card-body">
                    <div class="row">

                    <div class="col-12 form-group">
                        <label for="">Tipo de comprobante</label>
                        <input value="BOLETA DE VENTA" name="ticket_type" id="ticket_type" class="form-control" type="text" value="{{ $pedidos->ticket_type }}" required />
                    </div>

                    <div class="col-6 form-group">
                        <label for="">Serie de comprobante</label>
                        <input name="ticket_serie" id="ticket_serie" placeholder="A, B, C" class="form-control" type="text" value="{{ $pedidos->ticket_serie }}" required />
                    </div>
                        
                    <div class="col-6 form-group">
                        <label for="">Número de comprobante</label>
                        <input name="ticket_number" id="ticket_number" class="form-control" value="{{ $pedidos->ticket_number }}" type="text" required />
                    </div>
                    <div class="col-6 form-group">
                        <label for="">Nombre del Cliente</label>
                        <input name="nombreCliente" id="nombreCliente" class="form-control" type="text" value="{{ $pedidos->nombreCliente }}" required />
                    </div>
                    <div class="col-6 form-group">
                        <label for="">Apellido del Cliente</label>
                        <input name="apellidosCliente" id="apellidosCliente" class="form-control" type="text" value="{{ $pedidos->apellidosCliente }}" required />
                    </div>
                    <div class="col-8 form-group">
                        <label for="">Correo</label>
                        <input name="correo" id="correo" class="form-control" value="{{ $pedidos->correo}}" type="email">
                    </div>
                    <div class="col-4 form-group">
                        <label for="">Telefono</label>
                        <input name="celular" id="celular" pattern="[0-9]{9}" class="form-control" type="text" value="{{ $pedidos->celular}}" required>
                    </div>
                    <div class="col-12 form-group">
                        <label for="">Dirección</label>
                        <input name="direccion" id="direccion" class="form-control" type="text" value="{{ $pedidos->direccion}}" required>
                    </div>
                    <div class="col-12 form-group">
                        <label for="">IGV (%)</label>
                        <input name="tax" id="tax" class="form-control" type="number" min="1" value="{{ $pedidos->tax}}"  required>
                    </div>
                    <div class="col-12 form-group">
                        <label for="">Notas:</label>
                        <textarea class="form-control" name="notas" id="notas" cols="3" rows="3" value="{{ $pedidos->notas}}"></textarea>
                    </div>
                    <div class="col-12 form-group">
                        <div class="row">
                            <div class="col-6 pl-3">
                                <label class="" for="chkDelivery">Delivery: &nbsp;</label>
                                <input type="checkbox" class="" name="delivery" id="delivery" value="{{ $pedidos->delivery}}">
                            </div>

                            <div class="col-6">
                                <label for="">Total [S/.]:</label>
                                <input style="border:none; background:none; text-align: right; font-size:20px" type="number"
                                    readonly name="total" id="total" value="{{ $pedidos->total}}"></input>
                            </div> 
                            
                        </div>
                    </div>

<div class="row form-group">
  <div class="col-12">
      <button class="form-control btn btn-primary btn-block" type="submit"
          onclick="enviarInformacion(event)"><i class="fas fa-save"></i> Registrar pedido
    </button>
    
  </div>

</div>



                    </div>
                </div>
            </div>
        </div>
      </form>
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
$('.formulario-eliminar').submit(function(e){
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
  $(document).ready(function(){
    $('#example').DataTable();
  });
</script>

{{--  --}}
  <script type="module" src="/js/amountController"></script>
    <script>
        class AmountController {
            static init(selector = null) {
                const context = selector || document;
                var controllers = document.querySelectorAll('.amount-controller');
                for (let controller of controllers) {
                    controller.addEventListener('click', ({
                        target
                    }) => {
                        const controlador = target;
                        const operation = parseInt(controlador.dataset.sign);
                        const amountCounter = controlador.parentNode.querySelector('.amount-counter');
                        console.log(amountCounter, amountCounter.dataset)
                        const maxValue = parseInt(amountCounter.dataset.max)
                        let newValue = parseInt(amountCounter.innerText) + operation
                        if (newValue >= 0 && newValue <= maxValue) {
                            amountCounter.innerText = newValue;
                            const total = document.getElementById("total")
                            let currValue = parseFloat(total.value || 0)
                            console.log(total, currValue);
                            total.value = currValue + (amountCounter.dataset.precio * operation);
                        } else if (operation == 1) {
                            alert('El valor máximo del stock fue alcanzado, no puede agregar más :)')
                        }
                    })
                }
            }
        }

        function enviarInformacion(ev) {
            ev.preventDefault();
            const productos = document.querySelectorAll('.amount-counter');
            const data = []
            let totalSum = 0;
            for (let producto of productos) {

                let tempData = {
                  idProducto: producto.dataset.idProducto,
                    cantidad: parseInt(producto.innerText),
                    precio: parseFloat(producto.dataset.precio),
                }
    
                totalSum += tempData.cantidad * tempData.precio;
                data.push(tempData)
            }
            document.getElementById("formPedido").submit()
            document.getElementById("total").value = totalSum;
            document.getElementById
            console.log(data);
        }
        window.onload = () => {
            console.log('domloaded')
            AmountController.init();
        }
    </script>



@stop
