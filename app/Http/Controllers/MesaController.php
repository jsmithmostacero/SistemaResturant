<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('can:mesas.index')->only('index');
         $this->middleware('can:mesas.create')->only('create, store');
         $this->middleware('can:mesas.edit')->only('edit', 'update');
         $this->middleware('can:mesas.destroy')->only('destroy');
         $this->middleware('can:mesas.show')->only('show');
     }

    public function index()
    {
        $mesas = Mesa::all();
        return view('mesas.index', compact('mesas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mesas = Mesa::all();
        return view('mesas.create', compact('mesas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mesas= new Mesa();

        $data = $request->validate([
            
            'nombre' => 'required|string|max:100',
            
        ]);
        
        $mesas->nombre=$request->nombre;
        $mesas->cantidad=$request->cantidad;
        $mesas->estado=$request->estado;
        $mesas->locacion=$request->locacion;


        $mesas->save();
        return redirect()->route('mesas.index')->with('datos', '¡Mesa registrada correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mesas= Mesa::all();
        $mesas = Mesa::findOrFail($id);
        return view('mesas.show', compact('mesas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {

        $mesas = Mesa::findOrFail($id);
        return view('mesas.edit', compact('mesas'));
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
        $mesas = Mesa::find($id);
        
        $mesas->nombre=$request->nombre;
        $mesas->cantidad=$request->cantidad;
        $mesas->estado=$request->estado;
        $mesas->locacion=$request->locacion;


        $mesas->save();
        return redirect()->route('mesas.index')->with('datos', '¡Mesa actualizada correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mesas = Mesa::findOrFail($id);

        $mesas->delete();
        return redirect()->route('mesas.index')->with('eliminar', '¡Mesa eliminada correctamente!');

    }
}
