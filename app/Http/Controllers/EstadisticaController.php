<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Compra;
use App\Models\Consulta;
use App\Models\Ingrediente;
use App\Models\Menu;
use App\Models\Mesa;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Reservacion;
use App\Models\Venta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class EstadisticaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        //PRIMERA GRAFICA
        $mesas = Mesa::select('estado', DB::raw('count(*) as total'))
        ->groupBy('estado')
        ->get();

        $chart = new Chart;
        $chart->labels(['Pendiente', 'Disponible', 'No disponible']);
        $chart->dataset('Estado de Mesas', 'bar', $mesas->pluck('total'))
        ->options([
            'backgroundColor' => [ 
                'rgba(237, 52, 61, 1)',
                'rgba(222, 102, 167, 1)',
                'rgba(52, 101, 237, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(201, 203, 207, 1)'
            ],

            'borderColor' => [
                'rgb(237, 52, 61)',
                'rgb(222, 102, 167)',
                'rgb(52, 101, 237)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
              ],
        ]);       
        // ->backgroundColor('rgba(75, 192, 192, 1)');



       //SEGUNDA GRAFICA
       $consultas = Consulta::select('estatus', DB::raw('count(*) as total'))
       ->groupBy('estatus')
       ->get();

       $chart2 = new Chart;
       $chart2->labels(['Respondida', 'Sin responder']);
       $chart2->dataset('Consultas', 'doughnut', $consultas->pluck('total'))
       ->options([
           'backgroundColor' => [ 
               'rgba(243, 131, 101 , 1)',
               'rgba(166, 237, 222, 1)',
               'rgba(196, 166, 237, 1)',
               'rgba(201, 203, 207, 1)'
           ],

           'borderColor' => [
               'rgb(243, 131, 101 )',
               'rgba(166, 237, 222)',
               'rgba(196, 166, 237)',
               'rgba(201, 203, 207)'
             ],
       ]);       


       //
       $proveedores=Proveedor::count();
       $users=User::count();

       $data=[
        'users' => $users, 'proveedores' => $proveedores
    ];

      //TERCERA GRAFICA
      $pedidos = Pedido::select('direccion', DB::raw('count(*) as total'))
      ->groupBy('direccion')
      ->get();

  $chart0 = new Chart;
  $chart0->labels($pedidos->pluck('direccion'));
  $chart0->dataset('Pedidos por Categoría', 'pie', $pedidos->pluck('total'))->backgroundColor(['#edde34', '#45f5c9', '#73f562']);


   //CUARTA GRAFICA
   $mesas = Mesa::select('cantidad', DB::raw('count(*) as total'))
   ->groupBy('cantidad')
   ->get();

   $chart4 = new Chart;
   $chart4->labels(['1 Persona', '2 Personas', '3 Personas', '4 Personas', '5 o Más Personas']);
   $chart4->dataset('Mesas por Cantidad ', 'bar', $mesas->pluck('total'))
   ->options([
       'backgroundColor' => [ 
           'rgba(178, 138, 183  , 1)',
           'rgba(160, 183, 138  , 1)',
           'rgb(138, 183, 163  , 1)',
           'rgb(171, 173, 214, 1)',
           'rgba(214, 171, 211 , 1)',


       ],

       'borderColor' => [
           'rgb(178, 138, 183  )',
           'rgba(160, 183, 138  )',
           'rgb(138, 183, 163 )',
           'rgb(171, 173, 214)',
           'rgba(214, 171, 211 )',


         ],
   ]);



  //CUARTA GRAFICA
  $productos = Producto::all();

       $chart3 = new Chart;
       $chart3->labels($productos->pluck('nombre'));
       $chart3->dataset('Stock Actual ', 'line', $productos->pluck('stock'))
       ->options([
           'backgroundColor' => [ 
               'rgba(247, 162, 173, 1)',
               'rgba(45, 8, 84, 1)',
               'rgb(233, 22, 50, 1)',
               'rgb(8, 84, 18, 1)',
               'rgba(9, 12, 70, 1)',
               'rgba(45, 158, 227, 1)',
               'rgba(50, 241, 131, 1)',
               'rgba(91, 105, 6, 1)',
               'rgba(105, 82, 6, 1)',
               'rgba(105, 33, 6, 1)',
               'rgba(107, 16, 10, 1)',
               'rgba(38, 160, 155, 1)',

           ],

           'borderColor' => [
               'rgb(247, 162, 173)',
               'rgba(45, 8, 84)',
               'rgb(233, 22, 50)',
               'rgb(8, 84, 18)',
               'rgba(9, 12,70)',
               'rgba(45, 158, 227)',
               'rgba(50, 241, 131)',
               'rgba(91, 105, 6)',
               'rgba(105, 82, 6)',
               'rgba(105, 33, 6)',
               'rgba(107,16, 10)',
               'rgba(38, 160, 155)',

             ],
       ]);


       //
    $pedidos = Pedido::select('status', DB::raw('count(*) as total'))
    ->groupBy('status')
    ->get();

    $chart5 = new Chart;
    $chart5->labels(['Registrado']);
        $chart5->dataset('Pedidos registrados ', 'bar', $pedidos->pluck('total'))
        ->options([
            'backgroundColor' => [ 
                'rgba(172, 245, 172 , 1)',     
           ],
    
            'borderColor' => [
                'rgb(172, 245, 172 )',

              ],
       ]);
    

       //
       $menus = Menu::all();

       $chart6 = new Chart;
       $chart6->labels($menus->pluck('nombre'));
       $chart6->dataset('Stock Actual ', 'line', $menus->pluck('stockDiario'))
       ->options([
           'backgroundColor' => [ 
               'rgba(238, 224, 106, 1)',
               'rgba(45, 8, 84, 1)',
               'rgb(233, 22, 50, 1)',
               'rgb(8, 84, 18, 1)',
               'rgba(9, 12, 70, 1)',
               'rgba(45, 158, 227, 1)',
               'rgba(50, 241, 131, 1)',
               'rgba(91, 105, 6, 1)',
               'rgba(105, 82, 6, 1)',
               'rgba(105, 33, 6, 1)',
               'rgba(107, 16, 10, 1)',
               'rgba(38, 160, 155, 1)',

           ],

           'borderColor' => [
               'rgb(238, 224, 106)',
               'rgba(45, 8, 84)',
               'rgb(233, 22, 50)',
               'rgb(8, 84, 18)',
               'rgba(9, 12,70)',
               'rgba(45, 158, 227)',
               'rgba(50, 241, 131)',
               'rgba(91, 105, 6)',
               'rgba(105, 82, 6)',
               'rgba(105, 33, 6)',
               'rgba(107,16, 10)',
               'rgba(38, 160, 155)',

             ],
       ]);

       $ingredientes = Ingrediente::all();

       $chart7 = new Chart;
       $chart7->labels($ingredientes->pluck('nombre'));
       $chart7->dataset('Stock', 'line', $ingredientes->pluck('cantidad'))
       ->options([
           'backgroundColor' => [ 
               'rgba(238, 192, 106 , 1)',
               'rgba(45, 8, 84, 1)',
               'rgb(233, 22, 50, 1)',
               'rgb(8, 84, 18, 1)',
               'rgba(9, 12, 70, 1)',
               'rgba(45, 158, 227, 1)',
               'rgba(50, 241, 131, 1)',
               'rgba(91, 105, 6, 1)',
               'rgba(105, 82, 6, 1)',
               'rgba(105, 33, 6, 1)',
               'rgba(107, 16, 10, 1)',
               'rgba(38, 160, 155, 1)',

           ],

           'borderColor' => [
               'rgb(238, 192, 106 )',
               'rgba(45, 8, 84)',
               'rgb(233, 22, 50)',
               'rgb(8, 84, 18)',
               'rgba(9, 12,70)',
               'rgba(45, 158, 227)',
               'rgba(50, 241, 131)',
               'rgba(91, 105, 6)',
               'rgba(105, 82, 6)',
               'rgba(105, 33, 6)',
               'rgba(107,16, 10)',
               'rgba(38, 160, 155)',

             ],
       ]);


      return view('estadisticas', $data, compact('chart7','chart6','chart5','chart4', 'chart', 'chart2', 'chart0', 'chart3'));
        //  return view('estadisticas', $data);
    }

    
}
