<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use App\Models\Reservacion;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('can:reservaciones.index')->only('index');
         $this->middleware('can:reservaciones.create')->only('create, store');
         $this->middleware('can:reservaciones.edit')->only('edit', 'update');
         $this->middleware('can:reservaciones.destroy')->only('destroy');
         $this->middleware('can:reservaciones.show')->only('show');
     }

    public function index()
    {
        $reservaciones = Reservacion::all();
        $mesas = Mesa::all();
        return view('reservaciones.index', compact('reservaciones', 'mesas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reservaciones = Reservacion::all();
        $mesas = Mesa::all();
        return view('reservaciones.create', compact('reservaciones', 'mesas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reservaciones= new Reservacion();
        $mesas = Mesa::all();

        $reservaciones->nombre=$request->nombre;
        $reservaciones->apellido=$request->apellido;
        $reservaciones->correo=$request->correo;
        $reservaciones->numero=$request->numero;
        $reservaciones->fecha=$request->fecha;
        $reservaciones->id_mesa=$request->id_mesa;
        $reservaciones->cantidad=$request->cantidad;

        $reservaciones->save();

        return redirect()->route('reservaciones.index')->with('datos', '¡Reservación registrada correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservaciones= Reservacion::all();
        $mesas= Mesa::all();
        $reservaciones = Reservacion::findOrFail($id);
        return view('reservaciones.show', compact('reservaciones', 'mesas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservaciones =  Reservacion::findOrFail($id);
        $mesas = Mesa::all();
        return view('reservaciones.edit', compact('reservaciones','mesas'));
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
        $reservaciones = Reservacion::find($id);

        $reservaciones->nombre=$request->nombre;
        $reservaciones->apellido=$request->apellido;
        $reservaciones->correo=$request->correo;
        $reservaciones->numero=$request->numero;
        $reservaciones->fecha=$request->fecha;
        $reservaciones->id_mesa=$request->id_mesa;
        $reservaciones->cantidad=$request->cantidad;
        $reservaciones->save();

        return redirect()->route('reservaciones.index')->with('datos', '¡Reservación actualizada correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservaciones = Reservacion::findOrFail($id);

        $reservaciones->delete();
        return redirect()->route('reservaciones.index')->with('eliminar', '¡Reservación eliminada correctamente!');
    }
}
