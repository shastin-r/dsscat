<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DependienteBanco extends Model
{
    protected $fillable = [
        'nombre', 'apellido', 'email', 'sucursal_id'
    ];

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class);
    }

    public function cuentas()
    {
        return $this->hasMany(Cuenta::class);
    }

    public function realizarTransaccion($dui, $monto, $tipo)
    {
        $cuentas = $this->obtenerCuentas($dui);

        if ($cuentas->isEmpty()) {
            return ['error' => 'No se encontraron cuentas asociadas al DUI proporcionado.'];
        }

        // Aquí va la lógica pa realizar la transacción

        return ['success' => 'Transacción realizada correctamente.'];
    }

    public function obtenerCuentas($dui)
    {
        return $this->cuentas()->whereHas('cliente', function ($query) use ($dui) {
            $query->where('dui', $dui);
        })->get();
    }
}
