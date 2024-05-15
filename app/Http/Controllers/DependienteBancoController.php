<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Cuenta;
use App\Models\Movimiento;
use Illuminate\Http\Request;

class DependienteBancoController extends Controller
{
        // Método para mostrar el formulario de creación de sucursal
        public function crear()
        {
            return view('dependiente.blade.php');
        }
    public function index()
    {
        return view('dependientes.index');
    }

    public function consultarCuentas(Request $request)
    {
        $dui = $request->input('dui');
        $cliente = Cliente::where('dui', $dui)->first();

        if (!$cliente) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }

        $cuentas = Cuenta::where('cliente_id', $cliente->id)->get();

        return response()->json($cuentas);
    }

    public function abonarRetirar(Request $request)
    {
        $cuenta_id = $request->input('cuenta_id');
        $monto = $request->input('monto');
        $accion = $request->input('accion');

        $cuenta = Cuenta::find($cuenta_id);

        if (!$cuenta) {
            return response()->json(['message' => 'Cuenta no encontrada'], 404);
        }

        if ($accion == 'abonar') {
            $cuenta->saldo += $monto;
        } elseif ($accion == 'retirar') {
            if ($monto > $cuenta->saldo) {
                return response()->json(['message' => 'Saldo insuficiente'], 400);
            }
            $cuenta->saldo -= $monto;
        } else {
            return response()->json(['message' => 'Acción no válida'], 400);
        }

        $cuenta->save();

        // Registro del movimiento
        $movimiento = new Movimiento();
        $movimiento->cuenta_id = $cuenta_id;
        $movimiento->tipo = $accion;
        $movimiento->monto = $monto;
        $movimiento->save();

        return response()->json(['message' => 'Operación realizada con éxito']);
    }

    public function servicioWeb(Request $request)
    {
        // Lógica para el servicio web
        $dui = $request->input('dui');
        $cliente = Cliente::where('dui', $dui)->first();

        if (!$cliente) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }

        $cuentas = Cuenta::where('cliente_id', $cliente->id)->get();

        return response()->json($cuentas);
    }
}


