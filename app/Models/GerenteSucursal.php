<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GerenteSucursal extends Model
{
    protected $fillable = [
        'nombre', 'apellido', 'email', 'sucursal_id'
    ];

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class);
    }

    public function empleados()
    {
        return $this->hasMany(Cajero::class)
            ->orWhere('rol', 'personal_limpieza')
            ->orWhere('rol', 'secretaria')
            ->orWhere('rol', 'recepcionista')
            ->orWhere('rol', 'asesor_financiero');
    }

    public function casosPrestamo()
    {
        return $this->hasMany(Prestamo::class);
    }

    public function ingresarEmpleado($datos)
    {
        $empleado = new Cajero();
        $empleado->nombre = $datos['nombre'];
        $empleado->apellido = $datos['apellido'];
        $empleado->email = $datos['email'];
        $empleado->rol = $datos['rol'];
        $empleado->sucursal_id = $this->sucursal_id;
        $empleado->save();
    }

    public function darDeBajaEmpleado($empleadoId)
    {
        $empleado = Cajero::findOrFail($empleadoId);
        $empleado->estado = 'inactivo';
        $empleado->save();
    }

    public function listarCasosPrestamo()
    {
        return $this->casosPrestamo()->get();
    }

    public function aprobarCredito($casoId)
    {
        $casoPrestamo = Prestamo::findOrFail($casoId);
        $casoPrestamo->estado = 'aprobado';
        $casoPrestamo->save();
    }

    public function rechazarCredito($casoId)
    {
        $casoPrestamo = Prestamo::findOrFail($casoId);
        $casoPrestamo->estado = 'rechazado';
        $casoPrestamo->save();
    }
}
