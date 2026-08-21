<nav class="navbar navbar-expand navbar-white navbar-light bg-white border-bottom px-3 sticky-top">
    <!-- Left navbar links -->
    <ul class="navbar-nav align-items-center">
        <li class="nav-item">
            <button class="btn btn-link link-dark p-0 me-3" id="sidebarToggle" type="button">
                <i class="fa-solid fa-bars fa-lg"></i>
            </button>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="dashboard.php" class="nav-link">Inicio</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ms-auto align-items-center">
        <!-- Notifications Dropdown -->
        <li class="nav-item dropdown me-3">
            <a class="nav-link position-relative" href="#" data-bs-toggle="dropdown">
                <i class="fa-regular fa-bell fa-lg"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.65rem;">
                    3
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0">
                <span class="dropdown-item dropdown-header bg-light fw-bold">3 Notificaciones</span>
                <div class="dropdown-divider m-0"></div>
                <a href="#" class="dropdown-item py-2">
                    <i class="fa-solid fa-envelope me-2 text-primary"></i> Nuevo mensaje
                </a>
                <div class="dropdown-divider m-0"></div>
                <a href="#" class="dropdown-item py-2 text-center text-muted small">Ver todas</a>
            </div>
        </li>

        <!-- User Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="d-none d-md-inline fw-semibold"><?php echo htmlspecialchars($_SESSION['user_name'] ?? 'Usuario'); ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="#"><i class="fa-regular fa-user me-2"></i>Mi Perfil</a></li>
                <li><a class="dropdown-item" href="#"><i class="fa-solid fa-gear me-2"></i>Ajustes</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="logout.php"><i class="fa-solid fa-power-off me-2"></i>Salir</a></li>
            </ul>
        </li>
    </ul>
</nav>