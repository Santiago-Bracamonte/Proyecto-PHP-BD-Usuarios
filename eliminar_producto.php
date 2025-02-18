<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 1) {
    header('Location: login.php');
    exit();
}

if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Producto</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <form method="get" action="confirmar_accion.php">
        <input type="hidden" name="codigo" value="<?php echo $codigo; ?>">
        <input type="hidden" name="accion" value="eliminar">
        <p>¿Estás seguro de que quieres eliminar el producto con código <?php echo $codigo; ?>?</p>
        <input type="submit" value="Confirmar">
        <a href="lista_productos.php">Cancelar</a>
    </form>
</body>
</html>