<?php
    $arreglo = ["ECUADOR", "BOLIVIA", "PERU"];
    echo $arreglo[1]."<br/>";

    foreach ($arreglo as $pais){
        echo "$pais <br/>";
    }
    $registro = [
        "placa" => "PBA-1234",
        "tipo" => "auto",
        "propietario" => "carlos ruiz"
    ];
    echo $registro ["placa"];
    foreach($registro as $clave => $valor){
        echo "- $clave: $valor <br/>";  
    }


?>