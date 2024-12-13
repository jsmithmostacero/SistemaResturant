<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class Estadistica2Controller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
      return view('estadisticas2');
    }


}
