<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action ="procesar.php" method="POST">
        <label>placa</label>
        <input type = "text" name = "placa" required>

        <label> tipo de vehiculo: </label>
        <select name = "tipo">
            <option value = "A01"> automovil </option>
            <option value = "A02"> motocicleta </option>
        </select>
        <button type = "submit"> Registrar Ingreso </button>
    </form>

</body>
</html>