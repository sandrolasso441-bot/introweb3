<?php
// Garantizar que la sesión esté iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Control de acceso básico (descomentar en producción)
/*
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title . ' - Panel de Control' : 'Panel de Control'; ?></title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Estilos personalizados estilo AdminLTE -->
    <style>
        :root {
            --sidebar-width: 250px;
            --sidebar-bg: #343a40;
            --sidebar-color: #c2c7d0;
            --sidebar-active-bg: #0d6efd;
            --topbar-height: 56px;
        }

        body {
            font-family: 'Source Sans Pro', sans-serif;
            background-color: #f4f6f9;
            overflow-x: hidden;
        }

        /* Layout AdminLTE */
        .app-wrapper {
            display: flex;
            min-height: 100vh;
        }

        .main-sidebar {
            width: var(--sidebar-width);
            background-color: var(--sidebar-bg);
            color: var(--sidebar-color);
            flex-shrink: 0;
            transition: margin-left 0.3s ease-in-out;
            z-index: 1040;
        }

        .main-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        .content-wrapper {
            padding: 1.5rem;
            flex-grow: 1;
        }

        /* Estilos Sidebar AdminLTE */
        .brand-link {
            display: flex;
            align-items: center;
            padding: 0.8125rem 1rem;
            font-size: 1.25rem;
            color: #fff !important;
            text-decoration: none;
            border-bottom: 1px solid #4b545c;
            background-color: rgba(0,0,0,0.1);
        }

        .sidebar-menu .nav-link {
            color: var(--sidebar-color);
            padding: 0.6rem 1rem;
            border-radius: 0.25rem;
            margin-bottom: 0.2rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .sidebar-menu .nav-link:hover {
            color: #fff;
            background-color: rgba(255,255,255,0.1);
        }

        .sidebar-menu .nav-link.active {
            color: #fff;
            background-color: var(--sidebar-active-bg);
        }

        .nav-header {
            font-size: 0.75rem;
            text-transform: uppercase;
            padding: 0.75rem 1rem 0.25rem;
            color: #6c757d;
            font-weight: 700;
        }

        /* Tarjetas de estadísticas (Small Box de AdminLTE) */
        .small-box {
            border-radius: 0.375rem;
            position: relative;
            display: block;
            margin-bottom: 20px;
            box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
            color: #fff;
            padding: 1.25rem;
            overflow: hidden;
        }

        .small-box .inner {
            z-index: 2;
            position: relative;
        }

        .small-box h3 {
            font-size: 2.2rem;
            font-weight: 700;
            margin: 0 0 10px 0;
            white-space: nowrap;
        }

        .small-box p {
            font-size: 1rem;
            margin-bottom: 0;
        }

        .small-box .icon {
            color: rgba(0,0,0,0.15);
            z-index: 1;
            position: absolute;
            right: 15px;
            top: 15px;
            font-size: 70px;
            transition: transform 0.3s linear;
        }

        .small-box:hover .icon {
            transform: scale(1.1);
        }

        /* Responsive sidebar toggle */
        @media (max-width: 768px) {
            .main-sidebar {
                margin-left: calc(-1 * var(--sidebar-width));
                position: fixed;
                height: 100vh;
            }
            .main-sidebar.show {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
<div class="app-wrapper">