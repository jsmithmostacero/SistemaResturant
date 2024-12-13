<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('can:productos.index')->only('index');
        $this->middleware('can:productos.create')->only('create, store');
        $this->middleware('can:productos.edit')->only('edit', 'update');
        $this->middleware('can:productos.destroy')->only('destroy');
    }

    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productos= new Producto();

        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $destinationPath = 'images/productos/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('imagen')->move($destinationPath, $filename);
            $productos->imagen = $destinationPath . $filename;

        }

        $productos->fecha_caducidad=$request->fecha_caducidad;
        $productos->categoria=$request->categoria;
        $productos->estado=$request->estado;
        $productos->nombre=$request->nombre;
        $productos->precio=$request->precio;
        $productos->stock=$request->stock;
        $productos->save();



        return redirect()->route('productos.index')->with('datos', '¡Producto registrado correctamente!');
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
        $productos = Producto::findOrFail($id);
        return view('productos.edit', compact('productos'));
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
        $productos = Producto::find($id);

        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $destinationPath = 'images/productos/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('imagen')->move($destinationPath, $filename);
            $productos->imagen = $destinationPath . $filename;

        }
       
        $productos->fecha_caducidad=$request->fecha_caducidad;
        $productos->categoria=$request->categoria;
        $productos->estado=$request->estado;
        $productos->nombre=$request->nombre;
        $productos->precio=$request->precio;
        $productos->stock=$request->stock;
        $productos->save();

        return redirect()->route('productos.index')->with('datos', '¡Producto actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productos = Producto::findOrFail($id);

        $productos->delete();
        return redirect()->route('productos.index')->with('eliminar', '¡Producto eliminado correctamente!');
    }
}
