<?php
session_start();

// Definición de productos en un arreglo asociativo PHP
$productos = [
    1 => [
        'nombre' => 'Teclado Mecánico RGB',
        'precio' => 45.00,
        'imagen' => 'img/taclado.jpg'
    ],
    2 => [
        'nombre' => 'Mouse Gaming Inalámbrico',
        'precio' => 25.50,
        'imagen' => 'img/mouse.jpg'
    ],
    3 => [
        'nombre' => 'Monitor Gamer 144Hz',
        'precio' => 199.99,
        'imagen' => 'img/monitor.jpg'
    ],
    4 => [
        'nombre' => 'Tarjeta Gráfica RTX',
        'precio' => 350.00,
        'imagen' => 'img/grafica.jpg'
    ]
];

// Lógica para agregar productos a la sesión (Desafío de Lógica)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_producto'])) {
    $id = (int)$_POST['id_producto'];

    if (isset($productos[$id])) {
        // Inicializar el carrito en la sesión si no existe
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

        // DESAFÍO: Si ya existe en el carrito, aumentar la cantidad en +1
        if (isset($_SESSION['carrito'][$id])) {
            $_SESSION['carrito'][$id]['cantidad'] += 1;
        } else {
            // Si es nuevo, agregarlo con cantidad 1
            $_SESSION['carrito'][$id] = [
                'nombre' => $productos[$id]['nombre'],
                'precio' => $productos[$id]['precio'],
                'imagen' => $productos[$id]['imagen'],
                'cantidad' => 1
            ];
        }

        // Redireccionar para evitar reenvió de formulario al recargar
        header("Location: index.php?status=success");
        exit();
    }
}

// Contar cantidad total de productos en el carrito para la insignia (badge)
$total_items = 0;
if (isset($_SESSION['carrito'])) {
    foreach ($_SESSION['carrito'] as $item) {
        $total_items += $item['cantidad'];
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>10compras - Catálogo de Productos</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

    <header>
        <div class="banner-container">
            <img src="img/banner.jpg" alt="Banner Tienda">
            <div class="banner-text">
                <h1>10compras</h1>
                <p>Tu tienda de componentes de tecnología</p>
            </div>
        </div>
    </header>

    <nav>
        <h2>Catálogo de Productos</h2>
        <a href="carrito.php" class="cart-icon-btn">
            🛒 Carrito (<?php echo $total_items; ?>)
        </a>
    </nav>

    <div class="container">
        <div class="products-grid">
            <?php foreach ($productos as $id => $producto): ?>
                <div class="product-card">
                    <img src="<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>" class="product-image">
                    <div class="product-info">
                        <div class="product-title"><?php echo $producto['nombre']; ?></div>
                        <div class="product-price">$<?php echo number_format($producto['precio'], 2); ?></div>
                        
                        <form action="index.php" method="POST">
                            <input type="hidden" name="id_producto" value="<?php echo $id; ?>">
                            <button type="submit" class="btn btn-primary">Agregar al Carrito</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>
</html>