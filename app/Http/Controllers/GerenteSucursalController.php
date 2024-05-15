<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GerenteSucursal;
use App\Models\Cajero;
use App\Models\Prestamo;

class GerenteSucursalController extends Controller
{
        // Método para mostrar el formulario de creación de sucursal
        public function crear()
        {
            return view('gerente_sucursal.blade.php');
        }
    public function ingresarEmpleado(Request $request)
    {
        $gerenteSucursal = GerenteSucursal::findOrFail($request->user()->id);
        $gerenteSucursal->ingresarEmpleado($request->all());
        return redirect()->back()->with('success', 'Empleado ingresado correctamente');
    }

    public function darDeBajaEmpleado(Request $request, $empleadoId)
    {
        $gerenteSucursal = GerenteSucursal::findOrFail($request->user()->id);
        $gerenteSucursal->darDeBajaEmpleado($empleadoId);
        return redirect()->back()->with('success', 'Empleado dado de baja correctamente');
    }

    public function aprobarCredito(Request $request, $casoId)
    {
        $gerenteSucursal = GerenteSucursal::findOrFail($request->user()->id);
        $gerenteSucursal->aprobarCredito($casoId);
        return redirect()->back()->with('success', 'Crédito aprobado correctamente');
    }

    public function rechazarCredito(Request $request, $casoId)
    {
        $gerenteSucursal = GerenteSucursal::findOrFail($request->user()->id);
        $gerenteSucursal->rechazarCredito($casoId);
        return redirect()->back()->with('success', 'Crédito rechazado correctamente');
    }
}
