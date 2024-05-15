<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco de Agricultura Salvadoreño SA de CV</title>
    <!-- Estilos CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css"> <!-- Estilos personalizados -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
        }
        .navbar {
            background-color: #004a77;
        }
        .navbar-brand {
            color: #ffffff;
            font-weight: bold;
        }
        .navbar-nav .nav-link {
            color: #ffffff;
        }
        .jumbotron {
            background-color: #ffcc33;
            color: #004a77;
            text-align: center;
            padding: 2rem;
            margin-bottom: 0;
        }
        .jumbotron h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }
        .jumbotron p {
            font-size: 1.5rem;
            margin-bottom: 2rem;
        }
        .jumbotron a.btn-primary {
            background-color: #004a77;
            border-color: #004a77;
            color: #ffffff;
            padding: 0.75rem 2rem;
            font-size: 1.25rem;
        }
        .card {
            background-color: #ffffff;
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 0.25rem;
            transition: box-shadow 0.3s ease;
            margin-bottom: 1rem;
        }
        .card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-title {
            color: #004a77;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Banco de Agricultura Salvadoreño SA de CV</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Acerca de</a>
                    </li>
                    <!-- Agregar más enlaces según la necesidad -->
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <section class="jumbotron">
            <div class="container">
                <h1 class="display-4">Banco de Agricultura Salvadoreño SA de CV</h1>
                <p class="lead">Tu banco de confianza para todos tus servicios financieros</p>
                <a href="#" class="btn btn-primary btn-lg">Abrir cuenta</a>
            </div>
        </section>

        <section class="container">
            <h2 class="text-center my-5">Nuestros servicios</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas fa-credit-card fa-3x mb-3"></i>
                            <h5 class="card-title">Tarjetas de crédito</h5>
                            <p class="card-text">Obtén una tarjeta de crédito con beneficios exclusivos</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas fa-university fa-3x mb-3"></i>
                            <h5 class="card-title">Préstamos</h5>
                            <p class="card-text">Solicita un préstamo con tasas competitivas</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas fa-coins fa-3x mb-3"></i>
                            <h5 class="card-title">Cuentas de ahorro</h5>
                            <p class="card-text">Abre una cuenta de ahorro y haz crecer tu dinero</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container my-5">
            <div class="row">
                <div class="col-md-6">
                    <h2>¿Por qué escogernos?</h2>
                    <p>Nuestra forma de trabajar para nuestros usuarios es siempre en beneficio de ellos. Brindamos apoyo para aquellos que no tienen tiempo de trasladarse a su banco más cercano. Aseguramos que nuestros clientes puedan realizar sus procesos transaccionales de una manera más práctica, sencilla y totalmente segura.</p>
                </div>
                <div class="col-md-6 text-center">
                    <img src="/resources/img/logo.png" class="img-fluid" alt="Logo del Banco">
                </div>
            </div>
        </section>
    </main>

    <!-- Scripts JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
