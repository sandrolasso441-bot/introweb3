<?php
session_start();

$nombre = $_POST ["email"];
$clave = $_POST ["password"];

if ($nombre == "admin@.com" && $clave == "1234"){
    $_SESSION ["usuario"] = "SANDRO LASSO";
    header("location:dashboard.php");
    exit();
}else{
    $error_message = "usuario o contraseña incorrecta.";
    $_SESSION["mensaje"] = $error_message;
    header("location: index.php" );
}
?>