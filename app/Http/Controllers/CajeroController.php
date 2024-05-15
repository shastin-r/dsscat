<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Prestamo;
use App\Models\DependienteBanco;
use App\Models\Cuenta;

class CajeroController extends Controller
{
        // Método para mostrar el formulario de creación de sucursal
        public function crear()
        {
            return view('cajero.blade.php');
        }
    public function ingresarNuevoCliente(Request $request)
    {
        // Lógica para ingresar un nuevo cliente al banco
        $cliente = new Cliente();
        $cliente->nombre = $request->nombre;
        $cliente->email = $request->email;
        $cliente->dui = $request->dui;
        $cliente->save();

        return redirect()->back()->with('success', 'Cliente creado exitosamente.');
    }

    public function agregarDependiente(Request $request)
    {
        // Lógica para agregar un dependiente del banco
        $dependiente = new DependienteBanco();
        $dependiente->nombre = $request->nombre;
        $dependiente->email = $request->email;
        $dependiente->dui = $request->dui;
        $dependiente->save();

        return redirect()->back()->with('success', 'Dependiente del banco agregado exitosamente.');
    }

    public function ingresarRetirarDinero(Request $request)
    {
        // Lógica para ingresar o retirar dinero a una cuenta de un prestamista
        $cuenta = Cuenta::where('dui', $request->dui)->first();

        if (!$cuenta) {
            return redirect()->back()->withErrors(['dui' => 'No se encontró una cuenta asociada a ese DUI.'])->withInput();
        }

        // Validar que la cuenta bancaria esté relacionada con el DUI
        if ($cuenta->cliente->dui !== $request->dui) {
            return redirect()->back()->withErrors(['dui' => 'El DUI no coincide con la cuenta bancaria.'])->withInput();
        }

        // Lógica para retirar dinero a la cuenta
        // a esta no le encuentro xD

        return redirect()->back()->with('success', 'Movimiento realizado exitosamente.');
    }

    public function abrirPrestamo(Request $request)
    {
        // Lógica para abrir un préstamo a un cliente
        $salario = $request->salario;
        $monto = $request->monto;
        $interes = $request->interes;

        // Validar que el monto del préstamo no exceda el límite permitido
        if ($salario < 365 && $monto > 10000) {
            return redirect()->back()->withErrors(['monto' => 'El monto excede el límite permitido.'])->withInput();
        } elseif ($salario < 600 && $monto > 25000) {
            return redirect()->back()->withErrors(['monto' => 'El monto excede el límite permitido.'])->withInput();
        } elseif ($salario < 900 && $monto > 35000) {
            return redirect()->back()->withErrors(['monto' => 'El monto excede el límite permitido.'])->withInput();
        } elseif ($salario >= 900 && $monto > 50000) {
            return redirect()->back()->withErrors(['monto' => 'El monto excede el límite permitido.'])->withInput();
        }

        // Validar que la cuota mensual no supere el 30% del salario del cliente
        $cuotaMensual = ($monto * $interes) / 100;
        if ($cuotaMensual > ($salario * 30) / 100) {
            return redirect()->back()->withErrors(['cuota' => 'La cuota mensual excede el 30% del salario del cliente.'])->withInput();
        }

        // Lógica para abrir el préstamo
        $prestamo = new Prestamo();
        $prestamo->cliente_id = $request->cliente_id;
        $prestamo->monto = $monto;
        $prestamo->interes = $interes;
        $prestamo->estado = 'en espera'; // Por defecto el préstamo se abre en estado "en espera"
        $prestamo->save();

        return redirect()->back()->with('success', 'Préstamo abierto exitosamente.');
    }
}

