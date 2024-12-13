@extends('adminlte::page')

@section('title', 'Reporte de Gestión')

@section('content_header')
<h1>Indicadores de Gestión</h1>
@stop

@section('content')
<div class="container">
    <!-- Selector de Fecha -->
    <div class="mb-4 text-center">
        <label for="fechaReporte" class="form-label"><strong>Seleccionar Fecha:</strong></label>
        <input type="date" id="fechaReporte" class="form-control" style="max-width: 300px; margin: auto;">
    </div>

    <div class="text-center mb-4">
        <a href="{{ route('reporte.descargar') }}" class="btn btn-primary">Descargar PDF</a>
        <a href="{{ route('excel.descargar') }}" class="btn btn-success">Descargar Excel</a>
    </div>

    <!-- Gráfico de Indicadores -->
    <div class="chart-container mb-5">
        <h2 id="tituloIndicadorVentas" class="text-center">Indicador de Ventas (Diciembre)</h2>
        {!! $kpiChart->container() !!}
    </div>

    <!-- Gráfico de Ventas vs Compras -->
    <div class="chart-container mb-5">
        <h2 id="tituloVentasCompras" class="text-center">Ventas vs Compras Mensuales (Diciembre)</h2>
        {!! $ventasComprasChart->container() !!}
    </div>

    <!-- Gráfico de Proporción de Impuestos -->
    <div class="chart-container mb-5">
        <h2 id="tituloImpuestos" class="text-center">Proporción de Impuestos (Diciembre)</h2>
        {!! $impuestosChart->container() !!}
    </div>

    <!-- Indicadores -->
    <div class="indicator-container">
        <div class="indicator" style="background-color: {{ $colorIndicadorVentas }};">
            <span class="indicator-text">
                Ventas:
                @if ($flechaIndicadorVentas == 'up')
                <i class="fas fa-arrow-up"></i>
                @elseif ($flechaIndicadorVentas == 'down')
                <i class="fas fa-arrow-down"></i>
                @else
                <i class="fas fa-arrows-alt-h"></i>
                @endif
                {{ number_format($porcentajeCambioVentas, 2) }}%
            </span>
        </div>
    </div>
</div>
@endsection

@section('js')
{!! $ventasComprasChart->script() !!}
{!! $impuestosChart->script() !!}
{!! $kpiChart->script() !!}

<script>
    document.getElementById('fechaReporte').addEventListener('change', function() {
        const fecha = new Date(this.value);
        const mes = fecha.toLocaleString('es-ES', { month: 'long' });
        const capitalizedMes = mes.charAt(0).toUpperCase() + mes.slice(1);

        document.getElementById('tituloIndicadorVentas').textContent = `Indicador de Ventas (${capitalizedMes})`;
        document.getElementById('tituloVentasCompras').textContent = `Ventas vs Compras Mensuales (${capitalizedMes})`;
        document.getElementById('tituloImpuestos').textContent = `Proporción de Impuestos (${capitalizedMes})`;

        // Aquí puedes hacer una petición AJAX para actualizar los gráficos si es necesario
    });

    document.addEventListener('keydown', function(event) {
        if (event.key === 'F1') {
            event.preventDefault(); // Previene el manual del navegador
            window.open('/manual_usuario.pdf', '_blank'); // Abre tu manual
        }
    });
</script>
@endsection

@section('css')
<style>
    .chart-container {
        max-width: 900px; /* Tamaño máximo */
        max-height: 600px; /* Altura máxima */
        margin: auto;
        padding: 40px;
        box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        border-radius: 8px;
        overflow: hidden; /* Asegura que no se desborde */
    }

    canvas {
        width: 100% !important; /* Fuerza el tamaño */
        height: auto !important; /* Mantiene la proporción */
    }

    .mb-5 {
        margin-bottom: 5rem !important; /* Espaciado entre gráficos */
    }
</style>

@endsection
