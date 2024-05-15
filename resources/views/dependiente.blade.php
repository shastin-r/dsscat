<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco de Agricultura Salvadoreño SA de CV - Dependiente</title>
    <!-- Estilos CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Agregar Dependiente</h1>
        <form action="{{ route('dependiente.agregar') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="dui">DUI</label>
                <input type="text" class="form-control" id="dui" name="dui" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>

        <hr>

        <h2 class="mt-5">Ingresar o Retirar Dinero</h2>
        <form action="{{ route('dependiente.ingresarRetirar') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="dui">DUI del Prestamista</label>
                <input type="text" class="form-control" id="dui" name="dui" required>
            </div>
            <!-- Resto de campos y lógica para ingresar o retirar dinero -->
            <button type="submit" class="btn btn-primary">Ingresar/Retirar</button>
        </form>
    </div>

    <!-- Scripts JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
