<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table = 'sucursales';

    protected $fillable = [
        'nombre', 'direccion', 'telefono', 'gerente_id'
    ];

    public function gerente()
    {
        return $this->belongsTo('App\Models\Gerente');
    }

    public function movimientos()
    {
        return $this->hasMany('App\Models\Movimiento');
    }
}
