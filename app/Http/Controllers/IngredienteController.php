<?php

namespace App\Http\Controllers;

use App\Models\Ingrediente;
use Illuminate\Http\Request;

class IngredienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('can:ingredientes.index')->only('index');
         $this->middleware('can:ingredientes.create')->only('create, store');
         $this->middleware('can:ingredientes.edit')->only('edit', 'update');
         $this->middleware('can:ingredientes.destroy')->only('destroy');
     }

    public function index()
    {
        $ingredientes = Ingrediente::all();
        return view('ingredientes.index', compact('ingredientes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ingredientes.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ingredientes= new Ingrediente();

        $data = $request->validate([
            'nombre' => 'required|string|max:200',
            'descripcion' => 'required|string|max:200',
            'medida' => 'required|string|max:40',
            'cantidad' => 'required|string|max:100',
            'precio' => 'required|numeric|min:0',
         ]);

         if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $destinationPath = 'images/ingredientes/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('imagen')->move($destinationPath, $filename);
            $ingredientes->imagen = $destinationPath . $filename;

        }

         $ingredientes->nombre=$request->nombre;
         $ingredientes->descripcion=$request->descripcion;
         $ingredientes->medida=$request->medida;
         $ingredientes->cantidad=$request->cantidad;
         $ingredientes->precio=$request->precio;
 
         $ingredientes->save();
         return redirect()->route('ingredientes.index')->with('datos', '¡Ingrediente registrado correctamente!');
 
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
        $ingredientes = Ingrediente::findOrFail($id);
        return view('ingredientes.edit', compact('ingredientes'));


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
        $ingredientes = Ingrediente::find($id);

        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $destinationPath = 'images/ingredientes/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('imagen')->move($destinationPath, $filename);
            $ingredientes->imagen = $destinationPath . $filename;

        }

        $ingredientes->nombre=$request->nombre;
        $ingredientes->descripcion=$request->descripcion;
        $ingredientes->medida=$request->medida;
        $ingredientes->cantidad=$request->cantidad;
        $ingredientes->precio=$request->precio;

       $ingredientes->save();

       return redirect()->route('ingredientes.index')->with('datos', '¡Ingrediente actualizado correctamente!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ingredientes = Ingrediente::findOrFail($id);

        $ingredientes->delete();
        return redirect()->route('ingredientes.index')->with('eliminar', '¡Ingrediente eliminado correctamente!');

    }
}
