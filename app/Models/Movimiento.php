<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    protected $fillable = ['cuenta_id', 'tipo', 'monto', 'descripcion'];

    public function cuenta()
    {
        return $this->belongsTo(Cuenta::class);
    }
}

