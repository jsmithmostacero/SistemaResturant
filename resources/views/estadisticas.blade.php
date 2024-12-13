@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')

<!-- Encabezado con Glassmorphism -->
<div class="card-header" style="background: rgba(255, 255, 255, 0.6); backdrop-filter: blur(10px); border-radius: 16px; padding: 20px; text-align: center; box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);">
    <h1 style="font-size: 40px; font-family: 'Poppins', sans-serif; font-weight: 700; color: #1d3557; margin: 0;">
        📈 Gráficos Estadísticos Interactivos
    </h1>
    <p style="color: #457b9d; font-size: 16px; margin-top: 8px;">
        Análisis visual en tiempo real de tus datos más importantes.
    </p>
</div>

<!-- Gráficos con estilo unificado -->
<div class="row" style="margin-top: 30px; gap: 20px; justify-content: center;">
    @php
    $charts = [
    ['title' => 'Cantidad de Estados de Mesa', 'chart' => $chart],
    ['title' => 'Cantidad de Estado de Consultas', 'chart' => $chart2],
    ['title' => 'Cantidad de Direcciones para pedido', 'chart' => $chart0],
    ['title' => 'Evolución Actual del Stock de Productos', 'chart' => $chart3],
    ['title' => 'Proporción de Mesas por Cantidad', 'chart' => $chart4],
    ['title' => 'Total de Pedidos Registrados', 'chart' => $chart5],
    ['title' => 'Evolución Actual del Stock de Menú', 'chart' => $chart6],
    ['title' => 'Evolución Actual del Stock de Ingredientes', 'chart' => $chart7]
    ];
    @endphp

    @foreach ($charts as $data)
    <div class="col-lg-5">
        <div class="card" style="border: none; border-radius: 16px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
            <div class="card-header" style="background: linear-gradient(135deg, #6c5ce7, #74b9ff); color: white; font-size: 18px; font-weight: bold; padding: 15px; border-top-left-radius: 16px; border-top-right-radius: 16px;">
                {{ $data['title'] }}
            </div>
            <div class="card-body" style="background-color: #f8f9fa; border-bottom-left-radius: 16px; border-bottom-right-radius: 16px;">
                {!! $data['chart']->container() !!}
            </div>
        </div>
    </div>
    @endforeach
</div>



<!-- Scripts para gráficos -->
@foreach ($charts as $data)
{!! $data['chart']->script() !!}
@endforeach

@stop

@section('css')
<!-- Estilos personalizados -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<style>
    body {
        background-color: #f3f8ff;
    }
</style>
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<script>
    document.addEventListener('keydown', function(event) {
        if (event.key === 'F1') {
            event.preventDefault(); // Previene el manual del navegador
            window.open('/manual_usuario.pdf', '_blank'); // Abre tu manual
        }
    });
</script>

@stop
