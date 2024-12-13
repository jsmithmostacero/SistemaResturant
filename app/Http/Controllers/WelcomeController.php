<?php

namespace App\Http\Controllers;
use App\Models\Menu;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
     public function index(Menu $menus)
     {
         $menus= Menu::all();
        // $menus =  Menu::findOrFail($id);

         return view('inicio', compact('menus'));
     }
}
