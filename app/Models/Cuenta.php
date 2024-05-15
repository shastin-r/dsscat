<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    protected $fillable = ['cliente_id', 'tipo'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function dependienteBanco()
    {
        return $this->belongsTo(DependienteBanco::class);
    }

    public function movimientos()
    {
        return $this->hasMany(Movimiento::class);
    }
}

