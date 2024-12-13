<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'menus');
    }

    
    public function detallePedido(){
        return $this->hasMany(DetallePedido::class,'id_menu','id');
    }
}
