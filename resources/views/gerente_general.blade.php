<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco de Agricultura Salvadoreño SA de CV - Gerente General</title>
    <!-- Estilos CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Ingresar nuevos empleados</h1>
        <form action="{{ route('gerente.general.ingresarEmpleado') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="puesto">Puesto</label>
                <select class="form-control" id="puesto" name="puesto" required>
                    <option value="cajero">Cajero</option>
                    <option value="limpieza">Personal de limpieza</option>
                    <option value="secretaria">Secretaria</option>
                    <option value="mesa">Personal de mesa</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ingresar empleado</button>
        </form>

        <hr>

        <h2 class="mt-5">Casos de Préstamos</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Monto</th>
                    <th>Interés</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($casosPrestamo as $caso)
                <tr>
                    <td>{{ $caso->cliente->nombre }}</td>
                    <td>${{ $caso->monto }}</td>
                    <td>{{ $caso->interes }}%</td>
                    <td>{{ $caso->estado }}</td>
                    <td>
                        <a href="{{ route('gerente.general.aprobarPrestamo', ['id' => $caso->id]) }}" class="btn btn-success">Aprobar</a>
                        <a href="{{ route('gerente.general.rechazarPrestamo', ['id' => $caso->id]) }}" class="btn btn-danger">Rechazar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Scripts JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
