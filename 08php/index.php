<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    HOLA A TODOS </br>
    
    <?php
    //mensaje en html
        echo "<b>Bienvenidos</b><br/>";


        $nombres = "Sandro Lasso";
        $edad = 21;
        $estatura = 1.70;
        $esEstudiante = true;

        echo "$nombres - ( $edad) años <br/>";

        //operadores
        $num1 = "250";
        $num2 = 60;

        $suma = $num1 + $num2;
        echo "resultado: $suma <br/>";

        //condicionales 
        $num1 = 12;
        $num2 = 9;
        if ($num1 > $num2) {
            echo "El número mayor es: " . $num1;
        } else {
        echo "El número mayor es: " . $num2;
        } 
        
    ?>
    <h2> Bucles </h2>
    <ul>
        <li>Ecuador</li>
        <li>Colombia</li>
        <li>Perú</li>
        <li>México</li>
        <?php
        for ($i = 1; $i <= 10; $i++){
            echo "<li>PAIS $i </li>";
        }
        ?>
    </ul>
    <h3>Tabla multiplicar</h3>
    <table border="1" cellpadding="8" cellspacing="0" style="text-align: center;">
    <?php
    $i = 1;
    $numero = 6;

    while ($i <= 10) {
        $resultado = $numero * $i;
        echo "<tr>";
        echo "<td>" . $numero . "</td>";
        echo "<td>x</td>";
        echo "<td>" . $i . "</td>";
        echo "<td>=</td>";
        echo "<td>" . $resultado . "</td>";
        echo "</tr>";
        $i++;
    }
    ?>
</table>
</body>
</html>