@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Cajero</h2>
        <div class="row">
            <div class="col-md-6">
                <h3>Ingresar Nuevo Cliente</h3>
                <form action="{{ route('cajero.ingresarNuevoCliente') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="dui">DUI:</label>
                        <input type="text" class="form-control" id="dui" name="dui" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
            <div class="col-md-6">
                <h3>Agregar Dependiente del Banco</h3>
                <form action="{{ route('cajero.agregarDependiente') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="dui">DUI:</label>
                        <input type="text" class="form-control" id="dui" name="dui" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <h3>Ingresar o Retirar Dinero</h3>
                <form action="{{ route('cajero.ingresarRetirarDinero') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="dui">DUI:</label>
                        <input type="text" class="form-control" id="dui" name="dui" required>
                    </div>
                    <div class="form-group">
                        <label for="monto">Monto:</label>
                        <input type="number" class="form-control" id="monto" name="monto" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
            <div class="col-md-6">
                <h3>Abrir Préstamo</h3>
                <form action="{{ route('cajero.abrirPrestamo') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="cliente_id">Cliente:</label>
                        <select class="form-control" id="cliente_id" name="cliente_id" required>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="monto">Monto:</label>
                        <input type="number" class="form-control" id="monto" name="monto" required>
                    </div>
                    <div class="form-group">
                        <label for="interes">Interés:</label>
                        <input type="number" class="form-control" id="interes" name="interes" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
