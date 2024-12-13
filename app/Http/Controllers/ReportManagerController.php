<?php

namespace App\Http\Controllers;

use App\Exports\RegistrosExport;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Maatwebsite\Excel\Facades\Excel;
use Intervention\Image\Facades\Image;

class ReportManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $kpiChart;
    protected $impuestosChart;
    protected $ventasComprasChart;


    public function __construct()
    {
        $this->middleware('auth');
    }



    // public function index()
    // {
    //     $mesas = Mesa::select('estado', DB::raw('count(*) as total'))
    //         ->groupBy('estado')
    //         ->get();

    //     $chartMesas = new Chart;
    //     $chartMesas->labels($mesas->pluck('estado')->toArray());
    //     $chartMesas->dataset('Estado de Mesas', 'bar', $mesas->pluck('total')->toArray())
    //         ->options([
    //             'responsive' => true,
    //             'maintainAspectRatio' => false,
    //             'animation' => [
    //                 'duration' => 500,
    //             ],
    //             'scales' => [
    //                 'yAxes' => [[
    //                     'ticks' => ['beginAtZero' => true],
    //                 ]],
    //             ],
    //         ]);

    //     return view('reports.index', compact('chartMesas'));
    // }

    public function index()
    {
        // Ventas Mensuales
        $ventasMensuales = DB::table('pedidos')
            ->selectRaw('MONTH(created_at) as mes, SUM(total) as total')
            ->groupBy('mes')
            ->pluck('total', 'mes');

        // Ventas del último mes y del mes anterior
        $ventasUltimoMes = $ventasMensuales->get($ventasMensuales->keys()->last(), 0);
        $ventasMesAnterior = $ventasMensuales->get($ventasMensuales->keys()->last() - 1, 0);

        // Calculando el cambio porcentual de las ventas
        if ($ventasMesAnterior != 0) {
            $porcentajeCambioVentas = (($ventasUltimoMes - $ventasMesAnterior) / $ventasMesAnterior) * 100;
        } else {
            $porcentajeCambioVentas = $ventasUltimoMes > 0 ? 100 : 0;  // Evitar la división por cero
        }

        // Determinamos el color y la flecha para el indicador de ventas
        if ($porcentajeCambioVentas > 0) {
            $colorIndicadorVentas = 'green';
            $flechaIndicadorVentas = 'up';
        } elseif ($porcentajeCambioVentas < 0) {
            $colorIndicadorVentas = 'red';
            $flechaIndicadorVentas = 'down';
        } else {
            $colorIndicadorVentas = 'yellow';
            $flechaIndicadorVentas = 'horizontal';
        }

        // Compras Mensuales
        $comprasMensuales = DB::table('compras')
            ->selectRaw('MONTH(created_at) as mes, SUM(precio_compra * cantidad) as total')
            ->groupBy('mes')
            ->pluck('total', 'mes');

        // Compras del último mes y del mes anterior
        $comprasUltimoMes = $comprasMensuales->get($comprasMensuales->keys()->last(), 0);
        $comprasMesAnterior = $comprasMensuales->get($comprasMensuales->keys()->last() - 1, 0);

        // Calculando el cambio porcentual de las compras
        if ($comprasMesAnterior != 0) {
            $porcentajeCambioCompras = (($comprasUltimoMes - $comprasMesAnterior) / $comprasMesAnterior) * 100;
        } else {
            $porcentajeCambioCompras = $comprasUltimoMes > 0 ? 100 : 0;  // Evitar la división por cero
        }

        // Determinamos el color y la flecha para el indicador de compras
        if ($porcentajeCambioCompras > 0) {
            $colorIndicadorCompras = 'green';
            $flechaIndicadorCompras = 'up';
        } elseif ($porcentajeCambioCompras < 0) {
            $colorIndicadorCompras = 'red';
            $flechaIndicadorCompras = 'down';
        } else {
            $colorIndicadorCompras = 'yellow';
            $flechaIndicadorCompras = 'horizontal';
        }

        // Gráfico de Ventas vs Compras
        $ventasComprasChart = new Chart();
        $ventasComprasChart->labels($ventasMensuales->keys());
        $ventasComprasChart->dataset('Ventas', 'bar', $ventasMensuales->values())->backgroundColor('#4CAF50');
        $ventasComprasChart->dataset('Compras', 'bar', $comprasMensuales->values())->backgroundColor('#F44336');
        $ventasComprasChart->options([
            'responsive' => true,
            'maintainAspectRatio' => true,
            'aspectRatio' => 2, // Relación ancho/alto
        ]);

        // Impuestos
        $impuestosVentas = DB::table('pedidos')->sum('tax');
        $impuestosCompras = DB::table('compras')->sum('impuesto');

        $impuestosChart = new Chart();
        $impuestosChart->labels(['Impuestos Ventas', 'Impuestos Compras']);
        $impuestosChart->dataset('Impuestos', 'doughnut', [$impuestosVentas, $impuestosCompras])
            ->backgroundColor(['#FFC107', '#03A9F4']);
        $impuestosChart->options([
            'responsive' => true,
            'maintainAspectRatio' => true,
            'aspectRatio' => 1.5, // Relación ancho/alto
        ]);

        // KPI General
        $totalVentas = DB::table('pedidos')->sum('total');
        $totalCompras = DB::table('compras')->sum(DB::raw('precio_compra * cantidad'));
        $pedidosActivos = DB::table('pedidos')->where('activo', 1)->count();


        // Controller
        $metaVentas = 20000;
        $kpiChart = new Chart;
        $kpiChart->labels(['Ventas', 'Metas']);
        $kpiChart->dataset('Ventas Totales', 'doughnut', [$totalVentas, $metaVentas])
            ->backgroundColor(['#28a745', '#dc3545'])
            ->options([
                'responsive' => true,
                'maintainAspectRatio' => true,
                'aspectRatio' => 1.4, // Relación ancho/alto
            ]);

        $this->kpiChart = $kpiChart;
        $this->ventasComprasChart = $ventasComprasChart;
        $this->impuestosChart = $impuestosChart;

        //$image = Image::make($kpiChart->toString());

        return view('reports.index', compact(
            'ventasMensuales',
            'comprasMensuales',
            'totalVentas',
            'totalCompras',
            'pedidosActivos',
            'colorIndicadorVentas',
            'flechaIndicadorVentas',
            'porcentajeCambioVentas',
            'colorIndicadorCompras',
            'flechaIndicadorCompras',
            'porcentajeCambioCompras',
            'ventasComprasChart',
            'impuestosChart',
            'kpiChart'
        ));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function descargarReporte()
    {
        // Renderizar la vista del PDF

        $pdf = FacadePdf::loadView('reports.pdf', [
            'kpiChart' => $this->kpiChart,
            'ventasComprasChart' => $this->ventasComprasChart,
            'impuestosChart' => $this->impuestosChart,
        ]);
        return $pdf->download('reporte.pdf');
    }

    public function descargarExcel()
    {
        return Excel::download(new RegistrosExport, 'registros.xlsx');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
