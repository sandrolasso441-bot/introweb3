<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Datos Registrados </h1>
    <?php
    if (isset($_POST["placa"]) ){
        echo $_POST["placa"]."<br/>";
        echo $_POST ["tipo"];
    }else {
        echo "NO HAY DATOS.....";
        ?>
        <a href = "formulario.php"> Regrsar </a>
        <?php
    }
    echo $_POST["placa"]."<br/>";
    echo $_POST["tipo"];
    
    ?>
</body>
</html>