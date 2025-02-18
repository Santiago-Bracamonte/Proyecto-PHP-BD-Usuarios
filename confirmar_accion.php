<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 1) {
    header('Location: login.php');
    exit();
}

if (!isset($_GET['codigo']) || !isset($_GET['accion'])) {
    header('Location: lista_productos.php');
    exit();
}

$codigo = $_GET['codigo'];
$accion = $_GET['accion'];

$conexion = conectar();
$sql = "SELECT descripcion FROM productos WHERE codigo='$codigo'";
$resultado = mysqli_query($conexion, $sql);
$producto = mysqli_fetch_assoc($resultado);
$descripcion = $producto['descripcion'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Acción</title>
    <link rel="stylesheet" href="confirmar_accion.css">
</head>
<body>
    <h1>Confirmar Acción</h1>
    <p>¿Estás seguro de que quieres <?php echo htmlspecialchars($accion); ?> el producto "<?php echo htmlspecialchars($descripcion); ?>"?</p>
    <form method="post" action="procesar_accion.php">
        <input type="hidden" name="codigo" value="<?php echo htmlspecialchars($codigo); ?>">
        <input type="hidden" name="accion" value="<?php echo htmlspecialchars($accion); ?>">
        
        <?php if ($accion == 'editar'): ?>
            <input type="hidden" name="descripcion" value="<?php echo htmlspecialchars($_GET['descripcion']); ?>">
            <input type="hidden" name="precio" value="<?php echo htmlspecialchars($_GET['precio']); ?>">
            <input type="hidden" name="cantidad" value="<?php echo htmlspecialchars($_GET['cantidad']); ?>">
            <input type="hidden" name="peso" value="<?php echo htmlspecialchars($_GET['peso']); ?>">
            <input type="hidden" name="fecha_ingreso" value="<?php echo htmlspecialchars($_GET['fecha_ingreso']); ?>">
        <?php endif; ?>
        
        <input type="submit" name="confirmar" value="Confirmar">
        <a href="lista_productos.php">Cancelar</a>
    </form>
</body>
</html>