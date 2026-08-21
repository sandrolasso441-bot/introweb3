<?php

// Verificar si se enviaron los datos
$enviado = $_SERVER["REQUEST_METHOD"] === "POST";

// Obtener los datos
$placa = trim($_POST["placa"] ?? "");
$tipo = trim($_POST["tipo"] ?? "");
$hora = trim($_POST["hora"] ?? "");

// Validar los datos
$datosValidos =
    $enviado &&
    $placa !== "" &&
    $tipo !== "" &&
    $hora !== "";

?>



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


        .contenido {
            background: white;
            padding: 40px;
        }


        .icono-exito {

            width: 80px;
            height: 80px;

            margin: auto;
            margin-bottom: 20px;

            background: #d1e7dd;
            color: #198754;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 45px;
        }


        .dato {

            background: #f8f9fa;

            border-radius: 14px;

            padding: 17px;

            margin-bottom: 12px;
        }


        .btn-volver {

            border-radius: 12px;

            padding: 12px;

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

    <img
        src="img/banner.png"
        alt="Banner Control de Vehículos"
        class="banner">


    <main class="container contenedor">


        <div class="card tarjeta">


            <div class="contenido">


                <?php if (!$datosValidos): ?>


                    <!-- MENSAJE DE ERROR -->

                    <div
                        class="alert alert-danger d-flex align-items-center"
                        role="alert">

                        <i class="bi bi-exclamation-triangle-fill fs-4 me-3"></i>

                        <div>

                            <strong>
                                Error de registro
                            </strong>

                            <br>

                            Debes completar todos los campos obligatorios.

                        </div>

                    </div>


                <?php else: ?>


                    <!-- CONFIRMACIÓN -->

                    <div class="text-center">


                        <div class="icono-exito">

                            <i class="bi bi-check-lg"></i>

                        </div>


                        <h1 class="h3 fw-bold">

                            ¡Vehículo registrado!

                        </h1>


                        <p class="text-secondary mb-4">

                            Los datos fueron recibidos correctamente.

                        </p>


                    </div>



                    <!-- PLACA -->

                    <div class="dato">

                        <strong>

                            <i class="bi bi-credit-card-2-front me-2"></i>

                            Placa:

                        </strong>


                        <span class="float-end">

                            <?php

                            echo htmlspecialchars($placa);

                            ?>

                        </span>

                    </div>



                    <!-- TIPO -->

                    <div class="dato">

                        <strong>

                            <i class="bi bi-truck-front me-2"></i>

                            Tipo:

                        </strong>


                        <span class="float-end">

                            <?php

                            echo htmlspecialchars($tipo);

                            ?>

                        </span>

                    </div>



                    <!-- HORA -->

                    <div class="dato">

                        <strong>

                            <i class="bi bi-clock me-2"></i>

                            Hora de ingreso:

                        </strong>


                        <span class="float-end">

                            <?php

                            echo htmlspecialchars($hora);

                            ?>

                        </span>

                    </div>


                <?php endif; ?>



                <!-- BOTÓN REGRESAR -->

                <a
                    href="index.php"
                    class="btn btn-primary btn-volver w-100 mt-4">

                    <i class="bi bi-arrow-left-circle me-2"></i>

                    Regresar al inicio

                </a>


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