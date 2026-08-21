<?php
session_start();
$page_title = "Panel Principal";
include 'includes/header.php';
include 'includes/sidebar.php';
?>

<div class="main-content">
    <?php include 'includes/navbar.php'; ?>

    <!-- Contenido Principal -->
    <main class="content-wrapper">
        <!-- Header de la página (Breadcrumb) -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0 text-gray-800 fw-bold">Dashboard</h1>
                <small class="text-muted">Resumen general del sistema</small><br/>
                Dashboard - <?= $_SESSION['usuario'] ?>
            </div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
        </div>

        <!-- Tarjetas tipo AdminLTE (Small Boxes) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>150</h3>
                        <p>Nuevas Órdenes</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-bag-shopping"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>53<sup style="font-size: 20px">%</sup></h3>
                        <p>Tasa de Crecimiento</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning text-dark">
                    <div class="inner">
                        <h3 class="text-dark">44</h3>
                        <p class="text-dark">Usuarios Registrados</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-user-plus"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>65</h3>
                        <p>Visitantes Únicos</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-chart-pie"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fila de Contenido / Tablas / Gráficos -->
        <div class="row">
            <!-- Tabla Principal -->
            <div class="col-lg-8 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 fw-bold text-primary"><i class="fa-solid fa-list me-2"></i>Últimas Transacciones</h6>
                        <span class="badge bg-primary">Hoy</span>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Cliente</th>
                                        <th>Estado</th>
                                        <th>Monto</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#1092</td>
                                        <td>María García</td>
                                        <td><span class="badge bg-success">Completado</span></td>
                                        <td>$120.00</td>
                                        <td><button class="btn btn-sm btn-outline-secondary"><i class="fa-regular fa-eye"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td>#1091</td>
                                        <td>Carlos López</td>
                                        <td><span class="badge bg-warning text-dark">Pendiente</span></td>
                                        <td>$75.50</td>
                                        <td><button class="btn btn-sm btn-outline-secondary"><i class="fa-regular fa-eye"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td>#1090</td>
                                        <td>Ana Martínez</td>
                                        <td><span class="badge bg-danger">Cancelado</span></td>
                                        <td>$430.00</td>
                                        <td><button class="btn btn-sm btn-outline-secondary"><i class="fa-regular fa-eye"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Panel Lateral Secundario -->
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h6 class="m-0 fw-bold text-dark"><i class="fa-solid fa-clock-rotate-left me-2"></i>Actividad Reciente</h6>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0">
                            <li class="mb-3 d-flex align-items-start">
                                <div class="bg-light p-2 rounded me-3">
                                    <i class="fa-solid fa-user-plus text-primary"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Hace 10 min</small>
                                    <span class="small">Nuevo usuario registrado.</span>
                                </div>
                            </li>
                            <li class="mb-3 d-flex align-items-start">
                                <div class="bg-light p-2 rounded me-3">
                                    <i class="fa-solid fa-cart-shopping text-success"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Hace 1 hora</small>
                                    <span class="small">Nueva compra aprobada.</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php include 'includes/footer.php'; ?>