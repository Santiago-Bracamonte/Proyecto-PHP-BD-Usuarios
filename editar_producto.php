<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 1) {
    header('Location: login.php');
    exit();
}

if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
    $conexion = conectar();
    $sql = "SELECT * FROM productos WHERE codigo='$codigo'";
    $resultado = mysqli_query($conexion, $sql);
    $producto = mysqli_fetch_assoc($resultado);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="editar_producto.css">
</head>
<body>
    <h1>Editar Producto</h1>
    <form method="get" action="confirmar_accion.php">
        <input type="hidden" name="codigo" value="<?php echo $producto['codigo']; ?>">
        <input type="hidden" name="accion" value="editar">
        <label>Descripción:</label>
        <input type="text" name="descripcion" value="<?php echo $producto['descripcion']; ?>" required>
        <br>
        <label>Precio:</label>
        <input type="text" name="precio" value="<?php echo $producto['precio']; ?>" required>
        <br>
        <label>Cantidad:</label>
        <input type="number" name="cantidad" value="<?php echo $producto['cantidad']; ?>" required>
        <br>
        <label>Peso (kg):</label>
        <input type="text" name="peso" value="<?php echo $producto['peso']; ?>" required>
        <br>
        <label>Fecha de Ingreso:</label>
        <input type="date" name="fecha_ingreso" value="<?php echo $producto['fecha_ingreso']; ?>" required>
        <br>
        <input type="submit" value="Actualizar">
    </form>
    <a href="lista_productos.php">Volver</a>
</body>
</html>