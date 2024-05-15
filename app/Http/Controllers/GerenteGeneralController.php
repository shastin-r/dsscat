<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sucursal;
use App\Models\GerenteSucursal;
use App\Models\Movimiento;


class GerenteGeneralController extends Controller
{
        // Método para mostrar el formulario de creación de sucursal
        public function crear()
        {
            return view('gerente_general.blade.php');
        }
    public function verMovimientosCuentas()
    {
        // Lógica para ver todos los movimientos de las cuentas creadas en las sucursales y las cuentas independientes de sucursal
        $movimientos = Movimiento::all(); // Por ejemplo, obtener todos los movimientos de todas las cuentas

        return view('ver_movimientos', compact('movimientos'));
    }

    public function crearSucursal(Request $request)
    {
        // Lógica para crear una nueva sucursal del banco
        $sucursal = new Sucursal();
        $sucursal->nombre = $request->nombre;
        $sucursal->direccion = $request->direccion;
        $sucursal->save();

        return redirect()->back()->with('success', 'Sucursal creada exitosamente.');
    }

    public function asignarGerenteSucursal(Request $request)
    {
        // Lógica para asignar un nuevo gerente a una sucursal
        $gerenteSucursal = new GerenteSucursal();
        $gerenteSucursal->nombre = $request->nombre;
        $gerenteSucursal->email = $request->email;
        $gerenteSucursal->dui = $request->dui;
        $gerenteSucursal->save();

        $sucursal = Sucursal::find($request->sucursal_id);
        $sucursal->gerente_id = $gerenteSucursal->id;
        $sucursal->save();

        return redirect()->back()->with('success', 'Gerente asignado exitosamente.');
    }
}
