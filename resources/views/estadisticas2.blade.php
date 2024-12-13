@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')


<!-- Gráficos con estilo unificado -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Predicción de Ventas</h3>
                </div>
                <div class="card-body">
                    <iframe
                        src="http://localhost:8501"
                        width="100%"
                        height="1000"
                        frameborder="0"
                        style="overflow:hidden"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('css')
<!-- Estilos personalizados -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<style>
    iframe {
        min-height: 800px;
    }

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
