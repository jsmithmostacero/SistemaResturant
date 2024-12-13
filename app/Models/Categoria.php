<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'imagen', 'descripcion'];

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'menus');
    }

//     protected $table = 'categorias';
//    protected $guarded = [];
//     public $timestamps = false;
}
