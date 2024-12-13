<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Mesa;
use App\Models\User;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Pedido;
use App\Models\Proveedor;
use App\Models\Reservacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
     
        $users=User::count();
        $categorias=Categoria::count();
        $reservaciones=Reservacion::count();
        $menus=Menu::count();
        $mesas=Mesa::count();
        $proveedores=Proveedor::count();
        $productos=Producto::count();
        $pedidos=Pedido::count();
        $data=[
            'pedidos'=> $pedidos, 'users' => $users, 'categorias' => $categorias, 'reservaciones' => $reservaciones, 'menus' => $menus, 'mesas' => $mesas, 'proveedores' => $proveedores, 'productos' => $productos
        ];
        return view('home', $data, compact( 'users', 'categorias', 'reservaciones', 'menus', 'mesas', 'proveedores', 'productos'));
        // return view('home');
    }

  
   


}
