<?php
session_start();

// Lógica para vaciar el carrito
if (isset($_POST['vaciar'])) {
    unset($_SESSION['carrito']);
    header("Location: carrito.php");
    exit();
}

$carrito = $_SESSION['carrito'] ?? [];
$total_pagar = 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>10compras - Tu Carrito de Compras</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

    <header>
        <div class="banner-container">
            <img src="img/banner.jpg" alt="Banner Tienda">
            <div class="banner-text">
                <h1>10compras</h1>
                <p>Resumen de tus Compras</p>
            </div>
        </div>
    </header>

    <div class="container">
        <h2>Carrito de Compras</h2>
        <br>

        <?php if (empty($carrito)): ?>
            <div class="empty-cart-msg">
                <h3>El carrito está vacío 🛒</h3>
                <p>Parece que aún no has agregado ningún producto.</p>
                <br>
                <a href="index.php" class="btn btn-primary" style="display: inline-block; width: auto; padding: 0.6rem 1.5rem;">Ir al Catálogo</a>
            </div>
        <?php else: ?>
            <div class="cart-table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio Unitario</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($carrito as $item): 
                            $subtotal = $item['precio'] * $item['cantidad'];
                            $total_pagar += $subtotal;
                        ?>
                            <tr>
                                <td>
                                    <div style="display: flex; align-items: center; gap: 10px;">
                                        <img src="<?php echo $item['imagen']; ?>" alt="" style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px;">
                                        <strong><?php echo htmlspecialchars($item['nombre']); ?></strong>
                                    </div>
                                </td>
                                <td>$<?php echo number_format($item['precio'], 2); ?></td>
                                <td><?php echo $item['cantidad']; ?></td>
                                <td><strong>$<?php echo number_format($subtotal, 2); ?></strong></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="cart-footer">
                <a href="index.php" class="btn btn-secondary" style="width: auto; padding: 0.75rem 1.5rem;">← Regresar al Catálogo</a>
                
                <form action="carrito.php" method="POST" style="margin: 0;">
                    <button type="submit" name="vaciar" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas vaciar el carrito?');">
                        🗑️ Vaciar Carrito
                    </button>
                </form>

                <div class="total-box">
                    Total a pagar: <span style="color: var(--primary-color);">$<?php echo number_format($total_pagar, 2); ?></span>
                </div>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>