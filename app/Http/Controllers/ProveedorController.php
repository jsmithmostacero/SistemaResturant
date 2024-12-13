<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('can:proveedores.index')->only('index');
        $this->middleware('can:proveedores.create')->only('create, store');
        $this->middleware('can:proveedores.edit')->only('edit', 'update');
        $this->middleware('can:proveedores.destroy')->only('destroy');
    }

   public function index()
   {
       $proveedores = Proveedor::all();
       return view('proveedores.index', compact('proveedores'));

   }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proveedores= new Proveedor();

        $proveedores->ruc=$request->ruc;
        $proveedores->nombre=$request->nombre;
        $proveedores->dni=$request->dni;
        $proveedores->email=$request->email;
        $proveedores->telefono=$request->telefono;
        $proveedores->direccion=$request->direccion;
        $proveedores->save();

        return redirect()->route('proveedores.index')->with('datos', '¡Proveedor registrado correctamente!');
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
        $proveedores = Proveedor::findOrFail($id);
        return view('proveedores.edit', compact('proveedores'));
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
        $proveedores = Proveedor::find($id);

        $proveedores->ruc=$request->ruc;
        $proveedores->nombre=$request->nombre;
        $proveedores->dni=$request->dni;
        $proveedores->email=$request->email;
        $proveedores->telefono=$request->telefono;
        $proveedores->direccion=$request->direccion;
        $proveedores->save();

        return redirect()->route('proveedores.index')->with('datos', '¡Proveedor actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proveedores = Proveedor::findOrFail($id);

        $proveedores->delete();
        return redirect()->route('proveedores.index')->with('eliminar', '¡Proveedor eliminado correctamente!');

    }
}
