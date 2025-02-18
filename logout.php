<?php
session_start();

if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
    $fecha_hora = date('d-m-Y H:i:s');
    $archivo = fopen("accesos.txt", "a");
    fwrite($archivo, "$fecha_hora - Usuario: $usuario ha cerrado sesión\n");
    fclose($archivo);
    
    session_destroy();
}

header('Location: login.php');
exit();
?>