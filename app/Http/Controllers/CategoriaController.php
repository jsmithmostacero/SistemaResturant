<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaStoreRequest;
use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('can:categorias.index')->only('index');
         $this->middleware('can:categorias.create')->only('create, store');
         $this->middleware('can:categorias.edit')->only('edit', 'update');
         $this->middleware('can:categorias.destroy')->only('destroy');
         $this->middleware('can:categorias.show')->only('show');
     }

    public function index()
    {
        
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categorias= new Categoria();

        
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'nombrec' => 'required|string|max:100',
            'descripcion' => 'required|string|max:200',
         ]);

        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $destinationPath = 'images/categorias/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('imagen')->move($destinationPath, $filename);
            $categorias->imagen = $destinationPath . $filename;

        }
        
        $categorias->nombre=$request->nombre;
        $categorias->nombrec=$request->nombrec;
        $categorias->descripcion=$request->descripcion;
        $categorias->save();


        return redirect()->route('categorias.index')->with('datos', '¡Categoría registrada correctamente!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categorias= Categoria::all();
        $categorias = Categoria::findOrFail($id);
        return view('categorias.show', compact('categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $ingrediente = Ingrediente::findOrFail($id);
        $categorias = Categoria::findOrFail($id);
        return view('categorias.edit', compact('categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Categoria $categorias)
    {

        $request->validate([
        'nombre' => 'required|string|max:200',
        'descripcion' => 'required|string|max:800'
        ]);

        $categorias = Categoria::find($id);

        if($request->hasFile('imagen')){
           $file = $request->file('imagen');
           $destinationPath = 'images/categorias/';
           $filename = time() . '-' . $file->getClientOriginalName();
           $uploadSuccess = $request->file('imagen')->move($destinationPath, $filename);
           $categorias->imagen = $destinationPath . $filename;

        }

        $categorias->nombre=$request->nombre;
        $categorias->nombrec=$request->nombrec;
        $categorias->descripcion=$request->descripcion;

        $categorias->save();

        return redirect()->route('categorias.index')->with('datos', '¡Categoría actualizada correctamente!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
     {
         $categorias = Categoria::findOrFail($id);

         $categorias->delete();
        return redirect()->route('categorias.index')->with('eliminar', '¡Categoría eliminada correctamente!');

    }
}
