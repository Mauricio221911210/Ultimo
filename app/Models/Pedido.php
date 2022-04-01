<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;


    protected function user()
    {
        return $this->belongsTo(User::class);
    }

    public function TemporaryPedidos()
    {
        return $this->hasMany(TemporatyPedido::class);
    }
}
