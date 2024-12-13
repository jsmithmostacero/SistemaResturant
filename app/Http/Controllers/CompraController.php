<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Producto;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('can:compras.index')->only('index');
         $this->middleware('can:compras.create')->only('create, store');
         $this->middleware('can:compras.destroy')->only('destroy');
         $this->middleware('can:compras.show')->only('show');

     }

    public function index()
    {
        $compras = Compra::all();
        $proveedores = Proveedor::all();
        $productos = Producto::all();
        return view('compras.index', compact('compras', 'proveedores', 'productos'));

    }

    // public function createPDF(Compra $compras){
    //     // return view('pedidos.pdf_view', compact('pedido'));

    //     $orientation = 'landscape';
    //     $customPaper = array(0,0,950,950);
    //     $pdf = App::make('dompdf.wrapper');
    //     $pdf = PDF::loadview('compras.pdf_view',compact('compra'))->setPaper('letter', $orientation);
    //     $nombreArchivo = "Comprobante-".str_repeat('0',5 - strlen(''.$compras->id) ).$compras->id.'_'.now()->format('d-m-Y').'.pdf';
    //     return $pdf->download($nombreArchivo);
    // }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $compras = Compra::all();
        $proveedores = Proveedor::all();
        $productos = Producto::all();
        return view('compras.create', compact('compras', 'proveedores', 'productos'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $compras= new Compra();

        $compras->documento=$request->documento;
        $compras->numero_compra=$request->numero_compra;
        $compras->id_proveedors=$request->id_proveedors;
        $compras->cantidad=$request->cantidad;
        $compras->id_productos=$request->id_productos;
        $compras->precio_compra=$request->precio_compra;
        $compras->impuesto=$request->impuesto;
        // $compras->total=$request->total;
        $compras->status         =   'Registrado';


        $compras->save();

        return redirect()->route('compras.index')->with('datos', '¡Compra registrada correctamente!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Compra $compras)
    {
        $compras = Compra::findOrFail($id);
        $proveedores = Proveedor::all();
        $productos = Producto::all();

        $orientation = 'landscape';
        $customPaper = array(0,0,950,950);
        $pdf = App::make('dompdf.wrapper');
        $pdf = PDF::loadview('compras.show',compact('compras', 'productos', 'proveedores'))->setPaper('letter', $orientation);
        $nombreArchivo = "Comprobante-".str_repeat('0',5 - strlen(''.$compras->id) ).$compras->id.'_'.now()->format('d-m-Y').'.pdf';
        return $pdf->download($nombreArchivo);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


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


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $compras = Compra::findOrFail($id);

        $compras->delete();
        return redirect()->route('compras.index')->with('eliminar', '¡Compra anulada correctamente!');

    }
}
