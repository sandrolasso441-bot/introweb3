<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Control de Vehículos</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet">

    <style>
        body {
            background: #eef3f8;
            font-family: Arial, sans-serif;
            min-height: 100vh;
        }

        .banner {
            width: 100%;
            height: 240px;
            object-fit: cover;
            display: block;
        }

        .contenedor {
            max-width: 850px;
            margin: -50px auto 50px;
            position: relative;
        }

        .tarjeta {
            border: none;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .encabezado {
            background: white;
            padding: 30px;
        }

        .icono {
            width: 60px;
            height: 60px;
            background: #0d6efd;
            color: white;
            border-radius: 16px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 30px;
        }

        .formulario {
            background: white;
            padding: 30px;
        }

        .form-control,
        .form-select {
            border-radius: 12px;
            padding: 12px;
        }

        .btn-registrar {
            border-radius: 12px;
            padding: 13px;
            font-weight: bold;
        }

        footer {
            text-align: center;
            color: #6c757d;
            padding-bottom: 20px;
        }
    </style>
</head>

<body>

    <!-- BANNER -->
    <img src="img/banner.png"
         alt="Banner Control de Vehículos"
         class="banner">


    <main class="container contenedor">

        <div class="card tarjeta">

            <!-- ENCABEZADO -->
            <div class="encabezado">

                <div class="d-flex align-items-center gap-3">

                    <div class="icono">
                        <i class="bi bi-car-front-fill"></i>
                    </div>

                    <div>
                        <h1 class="h3 fw-bold mb-1">
                            Control de Vehículos
                        </h1>

                        <p class="text-secondary mb-0">
                            Registro de ingreso vehicular
                        </p>
                    </div>

                </div>

            </div>


            <!-- FORMULARIO -->
            <div class="formulario">

                <form action="registro.php" method="POST">

                    <!-- PLACA -->
                    <div class="mb-4">

                        <label for="placa" class="form-label fw-bold">
                            <i class="bi bi-credit-card-2-front"></i>
                            Placa
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            id="placa"
                            name="placa"
                            placeholder="Ejemplo: ABC-1234"
                            required>

                    </div>


                    <!-- TIPO DE VEHÍCULO -->
                    <div class="mb-4">

                        <label for="tipo" class="form-label fw-bold">
                            <i class="bi bi-truck-front"></i>
                            Tipo de vehículo
                        </label>

                        <select
                            class="form-select"
                            id="tipo"
                            name="tipo"
                            required>

                            <option value="" selected disabled>
                                Seleccione un vehículo
                            </option>

                            <option value="Automóvil">
                                Automóvil
                            </option>

                            <option value="Motocicleta">
                                Motocicleta
                            </option>

                            <option value="Camioneta">
                                Camioneta
                            </option>

                            <option value="Camión">
                                Camión
                            </option>

                            <option value="Bus">
                                Bus
                            </option>

                        </select>

                    </div>


                    <!-- HORA -->
                    <div class="mb-4">

                        <label for="hora" class="form-label fw-bold">
                            <i class="bi bi-clock"></i>
                            Hora de ingreso
                        </label>

                        <input
                            type="time"
                            class="form-control"
                            id="hora"
                            name="hora"
                            required>

                    </div>


                    <!-- BOTÓN -->
                    <button
                        type="submit"
                        class="btn btn-primary btn-registrar w-100">

                        <i class="bi bi-check-circle-fill me-2"></i>

                        Registrar vehículo

                    </button>

                </form>

            </div>

        </div>

    </main>


    <footer>

        <small>
            Sistema de Control de Vehículos © 2026
        </small>

    </footer>

</body>

</html>