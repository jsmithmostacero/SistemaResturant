<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Pedido;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::all();
        $menus = Menu::all();
        return view('ventas.index',compact('pedidos', 'menus'));

    }

     public function createPDF(Pedido $pedido){
        // return view('pedidos.pdf_view', compact('pedido'));
        $orientation = 'landscape';
        $customPaper = array(0,0,950,950);
         $pdf = App::make('dompdf.wrapper');
         $pdf = PDF::loadview('ventas.pdf_view',compact('pedido'))->setPaper('letter', $orientation);
        $nombreArchivo = "Comprobante-".str_repeat('0',5 - strlen(''.$pedido->id) ).$pedido->id.'_'.now()->format('d-m-Y').'.pdf';
         return $pdf->download($nombreArchivo);
     }

        //   public function createPDF(){
        //    $pedido = Pedido::all();

        //    $pdf=PDF::setPaper([0,0,220,800])->loadView('ventas.pdf_view', compact('pedido'));

        //    return $pdf->stream('pedido_report.pdf');

        //  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
