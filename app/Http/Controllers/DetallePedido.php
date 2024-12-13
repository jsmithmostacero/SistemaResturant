<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetallePedido extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        try
        {
            foreach ($input['carrito'] as $key => $row) {
                $detalle = new DetallePedido();
                $detalle->precio = $row['precio'];
                $detalle->cantidad = $row['cantidad'];
                $detalle->products_id = $row['id'];
                $detalle->sales_id= $input['sale_id'];
                $detalle->save();
            }
            return "Ok";
        }
        catch(\Exception $e)
        {
            $this->eliminar_venta($input['sale_id']);

            return response()->json(["error" => "Ha ocurrido un error!, revise que las cantidades no revasen el stock permitido",
                'e' => $e->getMessage()]);
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
