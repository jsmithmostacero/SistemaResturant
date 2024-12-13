<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Producto;
use Darryldecode\Cart\Cart;

class CartController extends Controller
{
    public function add(Request $request)
    {

        // $producto = Producto::find($request->id_producto);

        $menu = Menu::find($request->id);

          if (empty($menu)) 
            return redirect('inicio');

          Cart::add(
              $menu->id, 
              $menu->nombre, 
              $menu->precio, 
              1,
              ["imagen"=>$menu->imagen]
        //     // array("urlfoto"=>$producto->imagen)

         );

        // Cart::add(array(
        //     'id' => $request->id,
        //     'nombre' => $request->nombre,
        //     'precio' => $request->precio,
        //     'attributes' => array(
        //         'image' => $request->imagen,
        //         'categoria' => $request->categoria
        //     )
        // ));
        // return redirect()->route('cart.index')->with('success_msg', 'Item Agregado a sú Carrito!');

        //  return back()->with('datos',"$producto->nombre ¡se ha agregado con éxito al carrito!");

        return redirect()->route('inicio')->with('datos', '¡Menú actualizado correctamente!');
    }

    public function cart()
    {

        return view('checkout');
    }

    // public function removeitem(Request $request) {
    //     //$producto = Producto::where('id', $request->id)->firstOrFail();
    //     Cart::remove([
    //     'id' => $request->id,
    //     ]);
    //     return back()->with('success',"Producto eliminado con éxito de su carrito.");
    // }

    // public function clear(){
    //     Cart::clear();
    //     return back()->with('success',"The shopping cart has successfully beed added to the shopping cart!");
    // }
}
