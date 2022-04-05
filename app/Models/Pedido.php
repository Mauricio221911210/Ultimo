<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;


    protected $table="carrito";
    protected $fillable=[
        "nombre",
        "precio",
        "cantidad",
        "total",
        "user_id",

    ];

    public function Usuario(){
        return $this->belongsTo(User::class);
    }
}
