<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Reservacion;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('can:consultas.index')->only('index');
         $this->middleware('can:consultas.create')->only('create, store');
         $this->middleware('can:consultas.edit')->only('edit', 'update');
         $this->middleware('can:consultas.destroy')->only('destroy');
     }

     
    public function index()
    {

        $consultas = Consulta::all();
        $reservaciones = Reservacion::all();
        return view('consultas.index', compact('consultas', 'reservaciones'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $consulta = Consulta::all();
        $reservaciones = Reservacion::all();
        return view('consultas.create', compact('consultas', 'reservaciones'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $consultas= new Consulta();
        $consultas->id_reservacions=$request->id_reservacions;
        $consultas->estatus=$request->estatus;


        $consultas->save();
        return redirect()->route('consultas.index')->with('datos', '¡Consulta registrada correctamente!');

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
        $consultas = Consulta::findOrFail($id);
        $reservaciones = Reservacion::all();
        return view('consultas.edit', compact('consultas', 'reservaciones'));

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
        $consultas = Consulta::find($id);
        
        $consultas->id_reservacions=$request->id_reservacions;
        $consultas->estatus=$request->estatus;


        $consultas->save();
        return redirect()->route('consultas.index')->with('datos', '¡Consulta actualizada correctamente!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $consultas = Consulta::findOrFail($id);

        $consultas->delete();
        return redirect()->route('consultas.index')->with('eliminar', '¡Consulta eliminada correctamente!');

    }
}
