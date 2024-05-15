<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Cuenta;
use App\Models\Movimiento;
use Illuminate\Support\Facades\Mail;
use App\Mail\ValidarUsuario;

class ClienteController extends Controller
{
        // Método para mostrar el formulario de creación de sucursal
        public function crear()
        {
            return view('cliente.blade.php');
        }
    public function registrarCliente(Request $request)
    {
        $cliente = new Cliente();
        $cliente->nombre = $request->nombre;
        $cliente->email = $request->email;
        $cliente->dui = $request->dui;
        $cliente->save();

        // Enviar correo de validación
        Mail::to($cliente->email)->send(new ValidarUsuario($cliente));

        return redirect()->back()->with('success', 'Cliente registrado exitosamente. Por favor, valide su usuario vía correo electrónico.');
    }

    public function validarCliente(Request $request)
    {
        $cliente = Cliente::where('email', $request->email)->first();
        if (!$cliente) {
            return redirect()->back()->withErrors(['email' => 'Cliente no encontrado.'])->withInput();
        }

        $cliente->validado = true;
        $cliente->save();

        return redirect()->back()->with('success', 'Usuario validado exitosamente.');
    }

    public function crearCuenta(Request $request)
    {
        $cliente = Cliente::find($request->cliente_id);
        if (!$cliente) {
            return redirect()->back()->withErrors(['cliente_id' => 'Cliente no encontrado.'])->withInput();
        }

        if ($cliente->cuentas->count() >= 3) {
            return redirect()->back()->withErrors(['cliente_id' => 'El cliente ya tiene el máximo de cuentas permitido.'])->withInput();
        }

        $cuenta = new Cuenta();
        $cuenta->cliente_id = $request->cliente_id;
        $cuenta->numero = rand(10000000, 99999999); // Generar un número aleatorio de cuenta
        $cuenta->save();

        return redirect()->back()->with('success', 'Cuenta bancaria creada exitosamente.');
    }

    public function verMovimientos(Request $request)
    {
        $cliente = Cliente::find($request->cliente_id);
        if (!$cliente) {
            return redirect()->back()->withErrors(['cliente_id' => 'Cliente no encontrado.'])->withInput();
        }

        $movimientos = Movimiento::whereIn('cuenta_id', $cliente->cuentas->pluck('id'))->get();

        return view('movimientos', ['movimientos' => $movimientos]);
    }

    public function transferir(Request $request)
    {
        $cuentaOrigen = Cuenta::find($request->cuenta_origen);
        $cuentaDestino = Cuenta::find($request->cuenta_destino);

        if (!$cuentaOrigen || !$cuentaDestino) {
            return redirect()->back()->withErrors(['cuenta_origen' => 'Cuenta origen o destino no encontrada.'])->withInput();
        }

        if ($cuentaOrigen->saldo < $request->monto) {
            return redirect()->back()->withErrors(['monto' => 'Saldo insuficiente en la cuenta origen.'])->withInput();
        }

        // Realizar la transferencia
        $cuentaOrigen->saldo -= $request->monto;
        $cuentaDestino->saldo += $request->monto;

        $cuentaOrigen->save();
        $cuentaDestino->save();

        // Registrar movimiento de transferencia
        $movimientoOrigen = new Movimiento();
        $movimientoOrigen->cuenta_id = $cuentaOrigen->id;
        $movimientoOrigen->tipo = 'retiro';
        $movimientoOrigen->monto = $request->monto;
        $movimientoOrigen->save();

        $movimientoDestino = new Movimiento();
        $movimientoDestino->cuenta_id = $cuentaDestino->id;
        $movimientoDestino->tipo = 'deposito';
        $movimientoDestino->monto = $request->monto;
        $movimientoDestino->save();

        return redirect()->back()->with('success', 'Transferencia realizada exitosamente.');
    }
}

