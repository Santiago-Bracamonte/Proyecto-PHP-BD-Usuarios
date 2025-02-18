<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 1) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $peso = $_POST['peso'];
    $fecha_ingreso = $_POST['fecha_ingreso'];

    $conexion = conectar();
    $sql = "INSERT INTO productos (descripcion, precio, cantidad, peso, fecha_ingreso) VALUES ('$descripcion', '$precio', '$cantidad', '$peso', '$fecha_ingreso')";
    if (mysqli_query($conexion, $sql)) {
        echo "Producto agregado exitosamente";
    } else {
        echo "Error";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="agregar_producto.css">
</head>
<body>
    <div class="contenedor">
        <h1>Agregar Producto</h1>
        <form method="post" class="contenedor-formulario">
            <label>Descripción:</label>
            <input type="text" name="descripcion" required>
            <br>
            <label>Precio:</label>
            <input type="text" name="precio" required>
            <br>
            <label>Cantidad:</label>
            <input type="number" name="cantidad" required>
            <br>
            <label>Peso (kg):</label>
            <input type="text" name="peso" required>
            <br>
            <label>Fecha de Ingreso:</label>
            <input type="date" name="fecha_ingreso" required>
            <br>
            <input type="submit" value="Agregar">
        </form>
        <a href="admin.php">Volver</a>
    </div>
</body>
</html>