<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'productos',
        'total'
    ];

    protected $attributes = [
        'total' => 0
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
