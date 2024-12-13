<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Gestión</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; line-height: 1.6; }
        h1, h2 { text-align: center; color: #333; }
        .chart-container { text-align: center; margin: 20px 0; }
        .chart-container img { max-width: 100%; height: auto; border: 1px solid #ddd; border-radius: 8px; }
    </style>
</head>
<body>
    <h1>Reporte de Gestión</h1>
    <div class="chart-container">
        <h2>Indicador de Ventas</h2>
        <img src="{{ $gra1 }}" alt="Indicador de Ventas">
    </div>
    <div class="chart-container">
        <h2>Ventas vs Compras Mensuales</h2>
        <img src="{{ $gra2 }}" alt="Ventas vs Compras">
    </div>
    <div class="chart-container">
        <h2>Proporción de Impuestos</h2>
        <img src="{{ $gra3 }}" alt="Proporción de Impuestos">
    </div>
</body>
</html>
