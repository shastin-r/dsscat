<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CajeroController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DependienteBancoController;
use App\Http\Controllers\GerenteGeneralController;
use App\Http\Controllers\GerenteSucursalController;


Route::get('/', function () {
    return view('welcome');

    //Rutas Cajero
    Route::prefix('cajero')->group(function () {
        Route::post('/nuevo-cliente', [CajeroController::class, 'ingresarNuevoCliente'])->name('cajero.ingresarNuevoCliente');
        Route::post('/nuevo-dependiente', [CajeroController::class, 'agregarDependiente'])->name('cajero.agregarDependiente');
        Route::post('/ingresar-retirar-dinero', [CajeroController::class, 'ingresarRetirarDinero'])->name('cajero.ingresarRetirarDinero');
        Route::post('/abrir-prestamo', [CajeroController::class, 'abrirPrestamo'])->name('cajero.abrirPrestamo');
    });

    //Rutas cliente
    Route::prefix('cliente')->group(function () {
        Route::post('/registrar', [ClienteController::class, 'registrar'])->name('cliente.registrar');
        Route::get('/movimientos', [ClienteController::class, 'verMovimientos'])->name('cliente.verMovimientos');
});


    //Rutas Dependiente
    Route::prefix('dependiente')->group(function () {
        Route::post('/agregar', [DependienteBancoController::class, 'agregar'])->name('dependiente.agregar');
        Route::post('/ingresar-retirar', [DependienteBancoController::class, 'ingresarRetirar'])->name('dependiente.ingresarRetirar');
});

    //Rutas Gerente General
    Route::prefix('gerente-general')->group(function () {
        Route::post('/ingresar-empleado', [GerenteGeneralController::class, 'ingresarEmpleado'])->name('gerente.general.ingresarEmpleado');
        Route::get('/aprobar-prestamo/{id}', [GerenteGeneralController::class, 'aprobarPrestamo'])->name('gerente.general.aprobarPrestamo');
        Route::get('/rechazar-prestamo/{id}', [GerenteGeneralController::class, 'rechazarPrestamo'])->name('gerente.general.rechazarPrestamo');
    });
    

    //Rutas Gerente de Sucursal
    Route::prefix('gerente-sucursal')->group(function () {
        Route::post('/ingresar-empleado', [GerenteSucursalController::class, 'ingresarEmpleado'])->name('gerente.sucursal.ingresarEmpleado');
        Route::get('/aprobar-prestamo/{id}', [GerenteSucursalController::class, 'aprobarPrestamo'])->name('gerente.sucursal.aprobarPrestamo');
        Route::get('/rechazar-prestamo/{id}', [GerenteSucursalController::class, 'rechazarPrestamo'])->name('gerente.sucursal.rechazarPrestamo');
});

    //Rutas Sucursal     
        Route::get('/sucursal/crear', 'SucursalController@crear')->name('sucursal.crear');
        Route::post('/sucursal/almacenar', 'SucursalController@almacenar')->name('sucursal.almacenar');

});

