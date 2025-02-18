<?php
function conectar(){
    $conexion = mysqli_connect('localhost', 'root', '', 'santiagoBracamonteFinal2', '3306');
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }
    return $conexion;
}
?>