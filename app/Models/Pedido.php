<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'ticket_type',
        'ticket_serie',
        'ticket_number',
        'date',
        'tax',
        'total',
        'status'
    ];
}
