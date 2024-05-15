<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sucursal;

class SucursalController extends Controller
{
    // Método para mostrar el formulario de creación de sucursal
    public function crear()
    {
        return view('crear_sucursal.blade.php');
    }

    // Método para almacenar una nueva sucursal en la base de datos
    public function almacenar(Request $request)
    {
        $sucursal = new Sucursal();
        $sucursal->nombre = $request->nombre;
        $sucursal->direccion = $request->direccion;
        $sucursal->save();

        return redirect()->route('home')->with('success', 'Sucursal creada correctamente.');
    }
}
