<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Menu;
use Illuminate\Http\Request;

use function PHPUnit\Framework\countOf;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('can:menus.index')->only('index');
         $this->middleware('can:menus.create')->only('create, store');
         $this->middleware('can:menus.edit')->only('edit', 'update');
         $this->middleware('can:menus.destroy')->only('destroy');
         $this->middleware('can:menus.show')->only('show');
     }
     
    public function index()
    {
         $menus = Menu::all();
        $categorias = Categoria::all();
        return view('menus.index', compact('menus', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();
        $categorias = Categoria::all();
        return view('menus.create', compact('menus', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menus= new menu();

        
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'categoria' => 'required|string|max:200',
            'descripcion' => 'required|string|max:300'
         ]);

        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $destinationPath = 'images/menus/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('imagen')->move($destinationPath, $filename);
            $menus->imagen = $destinationPath . $filename;

        }

        $arrId= $request->id;
        $arrStock = $request->stock;
        for ($i=0; $i < is_countable($request->id); $i++) { 
            $menus = Menu::find($arrId[$i]);
            $menus->stockDiario = ($arrStock[$i]>0)?$arrStock[$i]:0;            
        }

        $menus->nombre=$request->nombre;
        $menus->categoria=$request->categoria;
        $menus->id_categoria=$request->id_categoria;
        $menus->precio=$request->precio;
        $menus->descripcion=$request->descripcion;
        $menus->stockDiario=$request->stockDiario;

        $menus->save();

        return redirect()->route('menus.index')->with('datos', '¡Menú registrado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menus= Menu::all();
        $categorias= Categoria::all();
        $menus = Menu::findOrFail($id);
        return view('menus.show', compact('menus', 'categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menus =  Menu::findOrFail($id);
        $categorias = Categoria::all();
        return view('menus.edit', compact('menus','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Menu $menus)
    {
        $menus = Menu::find($id);

        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $destinationPath = 'images/menus/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('imagen')->move($destinationPath, $filename);
            $menus->imagen = $destinationPath . $filename;

        }

        $menus->nombre=$request->nombre;
        $menus->categoria=$request->categoria;
        $menus->id_categoria=$request->id_categoria;
        $menus->precio=$request->precio;
        $menus->descripcion=$request->descripcion;
        $menus->stockDiario=$request->stockDiario;

        // $menus->save();
        //  $menus->update();

        $arrId= $request->id;
        $arrStock = $request->stock;
        for ($i=0; $i < is_countable($request->id); $i++) { 
            $menus = Menu::find($arrId[$i]);
            $menus->stockDiario = ($arrStock[$i]>0)?$arrStock[$i]:0;            
        }

         $menus->save();
         return redirect()->route('menus.index')->with('datos', '¡Menú actualizado correctamente!');
 

        // return redirect()->route('menus.index')->with('datos', '¡Menú actualizado correctamente!');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Menu $menus)
    {
         $menus = Menu::findOrFail($id);
        $menus->delete();
        return redirect()->route('menus.index')->with('eliminar', '¡Menú eliminado correctamente!');

    }
}
