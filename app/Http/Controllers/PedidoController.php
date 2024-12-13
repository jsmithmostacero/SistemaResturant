<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Menu;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\SaleDetail;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {

         $this->middleware('can:pedido.index')->only('index');
         $this->middleware('can:pedido.create')->only('create, store');
         $this->middleware('can:pedido.edit')->only('edit', 'update');
         $this->middleware('can:pedido.destroy')->only('destroy');
     }

    public function index()
    {
        $pedidos = Pedido::all();
        $menus = Menu::all();

        return view('pedido.index',compact('pedidos', 'menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pedidos = Pedido::all();
        $menus = Menu::all();
        $productos = Producto::where('categoria', 'Bebidas refrezcantes')->get();
        return view('pedido.create',compact('pedidos', 'menus','productos'));
    }

    public function createPDF1(Pedido $pedido){
        // $pedido = Pedido::all();

        // $pdf=PDF::setPaper([0,0,220,800])->loadView('pedido.pdf_view', compact('pedido'));

        // return $pdf->stream('pedido_report.pdf');

        // $orientation = 'landscape';
        // $customPaper = array(0,0,950,950);
         $pdf = App::make('dompdf.wrapper');
         $pdf = PDF::loadview('pedido.pdf_view',compact('pedido'))->setPaper([0,0,220,800]);
        $nombreArchivo = "Comprobante-".str_repeat('0',5 - strlen(''.$pedido->id) ).$pedido->id.'_'.now()->format('d-m-Y').'.pdf';
         return $pdf->stream($nombreArchivo);

      }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'nombreCliente' => 'required|string|max:100',
            'apellidosCliente' => 'required|string|max:100',
            'correo' => 'required|string|max:100',
            'direccion' => 'required|string|max:100',
            'ticket_serie' => 'required|string|max:10',
            'ticket_number' => 'required|string|max:100',
            'ticket_type' => 'required|string|max:100'
         ]);


    try{
        $valid=true;

       DB::beginTransaction();
       // registramos una venta

       $pedidos                 =   new Pedido();
        $pedidos->nombreCliente=$request->nombreCliente;
        $pedidos->apellidosCliente=$request->apellidosCliente;
        $pedidos->correo=$request->correo;
        $pedidos->celular=$request->celular;
        $pedidos->direccion=$request->direccion;
        $pedidos->notas=$request->notas;
        $pedidos->delivery = ($request->delivery=="on")?true:false;

    //
       $pedidos->id_user        =   Auth::user()->id;  #id del usuario logeado que registro el ingreso
       $pedidos->ticket_type    =   $request->ticket_type;
       $pedidos->ticket_serie   =   $request->ticket_serie;
       $pedidos->ticket_number  =   $request->ticket_number;
       $pedidos->tax            =   $request->tax;
       $pedidos->total          =   $request->total;
       $pedidos->status         =   'Registrado';
       $pedidos->save();


        DB::commit();
        //  return ['id' => $sale->id];
      }


    catch(Exception $e){
       DB::rollBack();
    }

    return redirect()->route('pedido.index')->with('datos', '¡Pedido registrado correctamente!');


}


    // public function createPDF(Pedido $pedido){
    //     $orientation = 'landscape';
    //     $customPaper = array(0,0,950,950);
    //     $pdf = App::make('dompdf.wrapper');
    //     $pdf = PDF::loadview('pedido.pdf_view',compact('pedido'))->setPaper('letter', $orientation);
    //     $nombreArchivo = "Comprobante-".str_repeat('0',5 - strlen(''.$pedido->id) ).$pedido->id.'_'.now()->format('d-m-Y').'.pdf';
    //     return $pdf->download($nombreArchivo);
    // }

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
        $pedidos = Pedido::findOrFail($id);
        $menus = Menu::all();
        return view('pedido.edit',compact('pedidos', 'menus',));
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
        $pedidos = Pedido::find($id);


    // try{
    //     $valid=true;

    //    DB::beginTransaction();

       // registramos una venta

        $pedidos->nombreCliente=$request->nombreCliente;
        $pedidos->apellidosCliente=$request->apellidosCliente;
        $pedidos->correo=$request->correo;
        $pedidos->celular=$request->celular;
        $pedidos->direccion=$request->direccion;
        $pedidos->notas=$request->notas;
        $pedidos->delivery = ($request->delivery=="on")?true:false;

    //
       $pedidos->id_user        =   Auth::user()->id;  #id del usuario logeado que registro el ingreso
       $pedidos->ticket_type    =   $request->ticket_type;
       $pedidos->ticket_serie   =   $request->ticket_serie;
       $pedidos->ticket_number  =   $request->ticket_number;
       $pedidos->tax            =   $request->tax;
       $pedidos->total          =   $request->total;
       $pedidos->status         =   'Registrado';
       $pedidos->save();


    //     DB::commit();
    //   }


    // catch(Exception $e){
    //    DB::rollBack();
    // }

    return redirect()->route('pedido.index')->with('datos', '¡Pedido registrado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedidos = Pedido::findOrFail($id);

        $pedidos->delete();
        return redirect()->route('pedido.index')->with('eliminar', '¡Pedido eliminado correctamente!');


    }
}
