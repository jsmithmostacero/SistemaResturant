<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class DetallePedido extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pedido(){
        return $this->belongsTo(\App\Models\Pedido::class, 'id_pedido');
        // return $this->belongsTo(Pedido::class);

    }

    public function menu(){
          return $this->belongsTo(\App\Models\Menu::class, 'id_menu');
        // return $this->hasOne(Menu::class, 'id', 'id_menu');
    }
}
