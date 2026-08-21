<aside class="main-sidebar">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
        <i class="fa-solid fa-gauge-high me-2 text-primary"></i>
        <span class="fw-bold">AdminPanel</span>
    </a>

    <!-- Sidebar Menu -->
    <div class="p-3">
        <!-- User Profile Card -->
        <div class="d-flex align-items-center border-bottom pb-3 mb-3">
            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px; font-weight: bold;">
                <?php echo strtoupper(substr($_SESSION['user_name'] ?? 'U', 0, 1)); ?>
            </div>
            <div class="text-truncate">
                <div class="fw-bold text-white small"><?php echo htmlspecialchars($_SESSION['user_name'] ?? 'Usuario Demo'); ?></div>
                <small class="text-success" style="font-size: 0.75rem;"><i class="fa-solid fa-circle me-1"></i>En línea</small>
            </div>
        </div>

        <nav class="sidebar-menu">
            <div class="nav-header">PRINCIPAL</div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="dashboard.php" class="nav-link active">
                        <i class="fa-solid fa-tachograph-digital"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-users"></i>
                        <span>Usuarios</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-boxes-packing"></i>
                        <span>Productos</span>
                    </a>
                </li>
                
                <div class="nav-header">SISTEMA</div>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-sliders"></i>
                        <span>Configuración</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link text-danger">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Cerrar sesión</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>